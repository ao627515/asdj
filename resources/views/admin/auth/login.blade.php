@extends('layout.html_layout')

@section('title', 'ASDJ | Admin Connexion')

@section('css')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dist/css/login/style.css') }}">
@endsection

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url({{ asset('dist/img/asdj/ASDJ_logo.png') }});">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="">
                                <div class="w-100">
                                    <h3 class="mb- text-center">Page Administrateur</h3>
                                </div>
                            </div>
                            <form action="{{ route('login') }}" class="signin-form" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <x-form.label class="font-weight-normal" for="phone">Téléphone</x-form.label>
                                    <x-form.input name="phone" type="number" placeholder="Téléphone" required />
                                </div>
                                <div class="form-group mb-3">
                                    <x-form.label class="font-weight-normal" for="password">Mot de Passe</x-form.label>
                                    <x-form.input name="password" type="password" placeholder="Mot de Passe" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                        Connexion
                                    </button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <a href="{{ route('home.index') }}" class="btn btn-primary btn-outline-primary">
                                            Page d'accueil
                                        </a>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="{{ route('password.request') }}"
                                            class="btn btn-primary btn-outline-primary">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
