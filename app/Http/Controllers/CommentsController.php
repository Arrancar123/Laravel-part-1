<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $check = Auth::check();
        $yes = $post->user;
        $name = auth()->user()->username;
        $user = auth()->user()->id;
        $postId = $post->id;
        $follows = (auth()->user()) ? auth()->user()->following->contains($yes->id) : false;

        $data = request()->validate([
            'comment' => 'required',
        ]);

        $comment = Comments::create([
            'comments' => $data['comment'],
            'user_id' => $user,
            'post_id' => $postId,
            'name' => $name,
        ]);

        //return redirect('/p/' . $postId)->with(compact('comment', 'name'));
        return view('posts.show', compact('post', 'comment', 'name', 'check', 'follows'));
    }
}
