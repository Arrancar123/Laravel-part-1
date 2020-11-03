<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function search()
    {
        //$users = User::all()->pluck('username');
        $data = request()->validate([
            'search' => '',
        ]);

        $search_keyword = $data['search'];

        $profiles = User::where("username", "LIKE", "%" . $search_keyword . "%")->get();

        return view('search.index', compact('profiles'));
    }
}
