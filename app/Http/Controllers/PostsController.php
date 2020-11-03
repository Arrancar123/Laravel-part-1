<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->simplePaginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => '',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(310, 260);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        // \App\Models\Post::create($data);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        $yes = $post->user;
        $check = Auth::check();
        $follows = (auth()->user()) ? auth()->user()->following->contains($yes->id) : false;
        $likes = (auth()->user()) ? auth()->user()->likes->contains($post->id) : false;

        $postCount = Cache::remember('count.posts.' . $yes->id,
            now()->addSeconds(30),
            function () use ($yes) {
                return $yes->posts->count();
            });

        $followersCount = Cache::remember('count.followers.' . $yes->id,
            now()->addSeconds(30),
            function () use ($yes) {
                return $yes->profile->followers->count();
            });

        $followingCount = Cache::remember('count.following.' . $yes->id,
            now()->addSeconds(30),
            function () use ($yes) {
                return $yes->following->count();
            });

        $likesCount = Cache::remember('count.likes.' . $post->id,
            now()->addSeconds(30),
            function () use ($post) {
                return $post->likes->count();
            });

        return view('posts.show', compact('post', 'follows', 'postCount', 'followersCount', 'followingCount', 'check', 'likes', 'likesCount'));
    }
}
