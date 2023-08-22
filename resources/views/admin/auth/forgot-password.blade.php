@extends('layout.html_layout')

@section('title', 'ASDJ | Mot de Passe Oublié')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
@endsection

@section('content')
    <div style="height: 100vh;" class="d-flex justify-content-center align-item-center">
        <div class="my-auto px-sm-0 px-2">
            <div class="card text-center" style="max-width: 500px;">
                <div class="card-header h5 text-white text-center d-flex flex-column" style="background-color: #4F0904">
                    <i class="fa fa-lock fa-4x" style="color: #f8f9fa"></i>
                    Réinitialisation de mot de passe
                </div>
                <div class="card-body px-5">
                    <p class="card-text py-2">
                        Entrez votre adresse e-mail, et nous vous enverrons un e-mail avec les instructions pour
                        réinitialiser votre mot de passe.
                    </p>
                    <div class="form-outline my-3">
                        <x-form.input name="email" type="email" placeholder="E-mail" />
                    </div>
                    <a href="#" class="btn btn-primary w-100">Réinitialiser le mot de passe</a>
                    <div class="d-flex justify-content-center mt-4">
                        <a class="" href="{{ route('login') }}">Connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
