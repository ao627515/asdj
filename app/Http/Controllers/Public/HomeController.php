<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('public.home.index');
    }

    public function about() {
        return view('public.home.about');
    }

    public function programmes() {
        return view('public.home.programmes');
    }
}
