@extends('layout.html_layout')

@section('title', 'Contact Form Mail')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container py-3">
        <p>
            De <strong>{{ $data['name'] }}, {{ $data['email'] }}</strong>, <br>

            {{ $data['message'] }}
        </p>
    </div>
@endsection
