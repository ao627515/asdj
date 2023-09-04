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
                        <li class="nav-item">
                            <a href="{{ route('news_letter.index') }}" class="nav-link">
                                <i class="bi bi-person-fill-check"></i> Liste des abonnés à la newsletter
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
                        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
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
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-default"><i class="far fa-envelope"></i>
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voullez vous envoyé cet email ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Non</button>
                    <button type="button" class="btn btn-outline-primary" id="confirmBtndefault">Oui</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/lang/summernote-fr-FR.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#confirmBtndefault').on('click', function() {
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
