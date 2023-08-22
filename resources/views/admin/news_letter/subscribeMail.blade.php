@extends('layout.html_layout')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container">
        <p>
            Cher(e) ami(e) de l'ASDJ, <br>

            Nous sommes ravis de vous accueillir parmi les abonnés de notre newsletter. Vous recevrez désormais nos
            dernières mises à jour, nouvelles et événements. <br>

            Merci pour votre soutien continu ! <br>

            NB : Vous pouvez vous désinscrire à tout moment en cliquant sur ce lien : <a href="{{ route('news_letter.unsubscribe', $email) }}">Se désinscrire</a>
            <br>
            Cordialement, <br>
            L'équipe de l'ASDJ <br>
        </p>
    </div>
@endsection
