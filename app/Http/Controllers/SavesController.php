<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(){
        return "Inside";
    }
}
