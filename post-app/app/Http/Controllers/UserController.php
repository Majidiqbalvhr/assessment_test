<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        $user_posts = Post::paginate(5);
        return view('index',compact('posts','user_posts'));
    }
}
