@php
    $disableCSS = true;
@endphp

@extends('layout.admin_layout')

@section('page', 'Boite Mail')

@section('sub_page', 'Nouveau Mail')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
    <x-alert></x-alert>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Folders</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="{{ route('news_letter_sent.index') }}" class="nav-link">
                                <i class="far fa-envelope"></i> Envoyé
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="{{ route('news_letter_sent.create') }}" class="nav-link">
                                <i class="bi bi-envelope-plus"></i> Nouveau mail
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('news_letter_sent.store') }}" method="post" id="composeForm">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="99f1c98e-ecbf-418a-85b6-f58632864c60">
                        <div class="form-group">
                            <input class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject"
                                placeholder="Subject:" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror"
                                style="height: 300px">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary" id="btnSubmit"><i class="far fa-envelope"></i>
                            Envoyer</button>
                    </div>
                    <button type="reset" class="btn btn-default"><i class="fas fa-times" id="btnReset"></i>
                        Annuler</button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/lang/summernote-fr-FR.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#btnSubmit').on('click', function() {
                // Soumettre le formulaire
                $('#composeForm').submit();
            });

            $('#btnReset').on('click', function() {
                // Soumettre le formulaire
                document.getElementById('composeForm').reset();
            });

            $('#message').summernote({
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
        });
    </script>
@endsection
