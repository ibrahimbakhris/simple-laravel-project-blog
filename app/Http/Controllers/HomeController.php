<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Get the latest 6 posts for the home page
        $posts = Post::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('welcome', compact('posts'));
    }
}
