<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\Saves;
use App\Models\User;
use Illuminate\Http\Request;

class SavesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user){
        $saves = DB::select('select * from saves where user_id = ?', [$user->id]);

        return (empty($saves))? redirect()->back()->with('error', 'No posts saved!'): view('profiles.saves', compact('user', 'saves'));
    }

    public function store(Post $post){
        $use = auth()->user()->id;

        $check = DB::select('select * from saves where post_id = ? and user_id = ?', [$post->id, $use]);

        if(!empty($check)){
            DB::delete('delete from saves where post_id = ? and user_id = ?', [$post->id, $use]);

            session()->flash('success', 'Removed from saved posts!');
            $msg = 'Removed from saved posts!';

        }else{

            Saves::create([
                'user_id' => $use,
                'post_id' => $post->id,
                'image' => $post->image,
            ]);

            session()->flash('success', 'Added to saves!');
            $msg = 'Added to saves!';
        }

        return redirect()->back()->with('success', $msg);

    }

}
