@extends('layout.public-layout')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <div class="row g-5 mt-3 mb-3">
            <div class="col-md-8">
                <div class="row row-cols-1 g-3">
                    {{-- @forelse ($posts as $post)
                        <div class="col">
                            <div class="card">
                                <img src="{{ $post->imageUrl() }}" class="card-img-top" alt="{{ $post->title }}">
                                <div class="card-body">
                                    <h3 class="fs-6">{{ $post->title }}</h3>
                                    <h6 class="fs-6">{{ $post->created_at }}</h6>
                                    <p class="card-text">{{ $post->description }}</p>
                                    <a href="{{ route('blog.show', $post) }}" class="card-link">Lire plus</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center align-item-center">
                            <p class="lead">
                                Aucun article publié
                            </p>
                        </div>
                    @endforelse --}}
                    @for ($i = 0; $i < 4; $i++)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('dist/img/asdj/asdj_logo_500_500.png') }}" class="card-img-top" alt=""">
                            <div class="card-body">
                                <h3 class="fs-6"></h3>
                                <h6 class="fs-6">Date</h6>
                                <p class="card-text">Desciption</p>
                                <a href="" class="card-link">Lire plus</a>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                {{-- {{ $posts->links() }} --}}
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
                            @for ($i = 0; $i < 4; $i++)
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                        href="">
                                        <img src="" alt="" height="100" width="100">
                                        <div class="col-lg-8">
                                            <h6 class="mb-0">titre</h6>
                                            <small class="text-body-secondary">dates</small>
                                        </div>
                                    </a>
                                </li>
                            @endfor
                        </ul>
                        <div class="p-4">
                            <h4 class="fst-italic">Archives</h4>
                            <ol class="list-unstyled mb-0">
                                <li><a href="{{ route('blog.index') }}">Tout les articles</a></li>
                                {{-- @foreach ($months as $key => $month)
                                    <li>
                                        <a href="{{ route('blog.postsMonth', $key) }}">{{ $month . ' ' . $year }}</a>
                                    </li>
                                @endforeach --}}
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
