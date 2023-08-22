@extends('layout.html_layout')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container">
        {!! $mail->message !!}  <br>

        NB : Vous pouvez vous désinscrire à tout moment en cliquant sur ce lien : <a href="{{ route('news_letter.unsubscribe', $email) }}">Se désinscrire</a>

    </div>
@endsection
