@extends('layout.admin_layout')

@section('page', 'Articles')

@section('sub_page', 'Liste des articles')


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
                        <li class="nav-item active">
                            <a href="{{ route('news_letter_sent.index') }}" class="nav-link">
                                <i class="far fa-envelope"></i> Sent
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
                <div class="card-body p-0">
                    <div class="mailbox-read-info">
                        <h5>
                            Sujet : {{ $mail->subject }}
                            <span class="mailbox-read-time float-right">{{ $mail->formatted_date }}</span>
                        </h5>

                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                            @if ($previous)
                                <a href="{{ route('news_letter_sent.show', $previous) }}">
                                    <button type="button" class="btn btn-default btn-sm" data-container="body"
                                        title="Précédent">
                                        Précédent
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                </a>
                            @endif
                            <a href="{{ route('news_letter_sent.destroy', $mail) }}">
                                <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </a>
                            <a href="" class="text-decoration-none">
                                <button type="button" class="btn btn-default btn-sm" title="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                            </a>
                            @if ($next)
                                <a href="{{ route('news_letter_sent.show', $next) }}">
                                    <button type="button" class="btn btn-default btn-sm" data-container="body"
                                        title="Suivant">
                                        <i class="fas fa-chevron-right"></i>
                                        Suivant
                                    </button>
                                </a>
                            @endif
                        </div>
                        <!-- /.btn-group -->
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">{!! $mail->message !!}</div>

                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <a href="{{ route('news_letter_sent.index') }}" class="text-decoration-none">
                            <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Retour</button>
                        </a>
                    </div>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-danger">
                        <i class="far fa-trash-alt"></i> Delete
                    </button>

                    <a href="{{ route('news_letter_sent.print', $mail) }}" class="text-decoration-none">
                        <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                    </a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

    <form action="{{ route('news_letter_sent.destroy', $mail) }}" method="post" id="formDestroy" class="d-none">
        @csrf
        @method('delete')
    </form>

    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Danger Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voullez vous supprimer ce mail ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Non</button>
                    <button type="button" class="btn btn-outline-light" id="confirmBtnDanger">Oui</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                $('#confirmBtnDanger').on('click', function() {
                    // Soumettre le formulaire
                    $('#formDestroy').submit();
                });
            });
        </script>
    @endsection
