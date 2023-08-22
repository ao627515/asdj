@extends('layout.admin_layout')

@section('page', 'Articles')

@section('sub_page', 'Article')

@section('content')
    <div class="container">
        <div class="py-3">
            <article class="article">
                <h1 class="article-title text-center fw-bold ">{{ $post->title }}</h1>

                <p class="article-date text-center">publié le {{ $post->dateFormatFr($post->published_at) }}</p>

                <div class="article-image mb-3">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="img-fluid">
                </div>

                <div class="article-content">
                    {!! $post->content !!} <!-- Affiche le contenu Summernote sans échappement -->
                </div>
            </article>
        </div>
    </div>
@endsection
