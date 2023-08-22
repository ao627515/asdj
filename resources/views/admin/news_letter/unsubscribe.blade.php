@extends('layout.html_layout')

@section('title', 'News-Letter Unsubscribe')

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
                        <div class="d-flex align-item-center justify-content-center">
                            <div class="m-auto">
                                <img src="{{ asset('dist/img/asdj/asdj_logo_500_500.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="">
                                <div class="w-100">
                                    <h3 class="mb- text-center">Association pour la Solidarité et le Dévéloppemt des Jeunes
                                    </h3>
                                    <h5 class="text-center">ASDJ</h5>
                                </div>
                            </div>
                            <p class="lead font-weight-normal">

                                Nous avons bien reçu votre demande de désinscription de notre newsletter. Nous respectons votre choix et avons procédé à la désinscription de votre adresse e-mail.

                                Nous aimerions vous remercier pour le temps que vous avez passé avec nous et espérons que vous avez apprécié nos informations. Si vous changez d'avis à l'avenir, n'hésitez pas à vous réinscrire.

                                Si vous avez des questions ou des commentaires, n'hésitez pas à nous contacter. <br>

                                Cordialement, <br>

                                ASDJ
                            </p>
                            <a href="{{ route('home.index') }}" class="btn btn-primary">
                                Page d'accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
