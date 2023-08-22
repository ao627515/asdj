<?php

namespace App\Http\Controllers\Public;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(25);

        $recentPosts = Post::recentPosts()->get();


        $currentYear = Carbon::now()->year;

        $months = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ];


        return view('public.blog.index', [
            'posts' => $posts,
            'recentPosts' => $recentPosts,
            'year' => $currentYear,
            'months' => $months
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $recentPosts = Post::recentPosts()->get();


        $currentYear = Carbon::now()->year;

        $months = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ];


        return view('public.blog.show', [
            'post' => $post,
            'recentPosts' => $recentPosts,
            'year' => $currentYear,
            'months' => $months
        ]);
    }

    public function postsMonth(int $monthNumber)
    {
        // Obtenir les articles créés dans le mois spécifié
        $posts = Post::whereMonth('created_at', $monthNumber + 1)->orderBy('created_at', 'desc')->paginate(25);

        $recentPosts = Post::recentPosts()->get();

        $currentYear = Carbon::now()->year;

        $months = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ];

        return view('public.blog.index', [
            'posts' => $posts,
            'recentPosts' => $recentPosts,
            'year' => $currentYear,
            'months' => $months
        ]);
    }
}
