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
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" id="formCreate">
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
            <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#modal-default">
                Créer
            </button>
        </form>


        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Success Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Voullez vous créer cette article ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-outline-primary" id="confirmBtn">Enregistré</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
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

        $(document).ready(function() {
            $('#confirmBtn').on('click', function() {
                // Soumettre le formulaire
                $('#formCreate').submit();
            });
        });
    </script>
@endsection
