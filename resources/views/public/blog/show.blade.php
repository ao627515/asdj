@extends('layout.public-layout')

@section('title', $post->slug)

@section('css')
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <!-- Custom styles for this template -->
    <link href="{{ asset('dist/css/blog/blog.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row g-5 mt-3 mb-3">
            <div class="col-md-8">
                <div class="row row-cols-1 g-3">
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

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-body-tertiary rounded">
                        <p class="mb-0">
                            Bienvenue sur le blog de l'ASDJ ! Ici, vous trouverez toutes les informations et les
                            actualités concernant notre association. N'hésitez pas à explorer nos articles pour
                            rester informé sur nos dernières activités et initiatives passionnantes.
                        </p>
                    </div>

                    <div>
                        <h4 class="fst-italic">Recent posts</h4>
                        <ul class="list-unstyled">
                            @foreach ($recentPosts as $post)
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                        href="{{ route('blog.show', $post->slug) }}">
                                        <img src="{{ $post->imageUrl() }}" alt="" height="100" width="100">
                                        <div class="col-lg-8">
                                            <h6 class="mb-0">{{ $post->title }}</h6>
                                            <small class="text-body-secondary">{{ $post->dateFormatFr() }}</small>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="p-4">
                            <h4 class="fst-italic">Archives</h4>
                            <ol class="list-unstyled mb-0">
                                <li><a href="{{ route('blog.index') }}">Tout les articles</a></li>
                                @foreach ($months as $key => $month)
                                    <li>
                                        <a href="{{ route('blog.postsMonth', $key) }}">{{ $month . ' ' . $year }}</a>
                                    </li>
                                @endforeach
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
