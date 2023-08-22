<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $recentPosts = Post::recentPosts()->get();

        return view('public.home.index', compact('recentPosts'));
    }

    public function about() {
        return view('public.home.about');
    }

    public function programmes() {
        return view('public.home.programmes');
    }
}
