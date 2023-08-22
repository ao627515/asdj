@php
    $disableCSS = true;
@endphp

@extends('layout.admin_layout')

@section('page', 'Articles')

@section('sub_page', 'Créer')

@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
    <div class="container py-3">
        <x-alert />
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row row-cols-1">
                <div class="col mb-3">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" required value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                            name="image" required>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="form-group">
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content"
                        name="content" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-100">
                Creer
            </button>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/lang/summernote-fr-FR.min.js') }}"></script>
    <script>
        $('#content').summernote({
            placeholder: 'contentu...',
            tabsize: 2,
            height: 300,
            lang: 'fr-FR',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript',
                    'subscript', 'clear'
                ]],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
