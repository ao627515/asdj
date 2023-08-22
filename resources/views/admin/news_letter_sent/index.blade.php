@extends('layout.admin_layout')

@section('page', 'Boite Mail')

@section('sub_page', 'Mail envoyé')

@section('css')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
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
                        <li class="nav-item active">
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
                <div class="card-header">
                    <h3 class="card-title">Inbox</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <x-form.input name="search" type="text" placeholder="Search Mail" />
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-danger">
                                <i class="far fa-trash-alt"></i> Delete
                            </button>
                        </div>
                        <!-- /.btn-group -->
                        <a href="{{ route('news_letter_sent.index') }}">
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </a>
                        <div class="float-right">
                            {{ $mails->links() }}
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.float-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <form action="" method="post" id="checboxDestry">
                                    @csrf
                                    @foreach ($mails as $mail)
                                        <tr>
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="{{ $mail->id }}" id="check1"
                                                        name="choices[]">
                                                    <label for="check1"></label>
                                                </div>
                                            </td>
                                            </td>
                                            <td class="mailbox-name"><a
                                                    href="{{ route('news_letter_sent.show', $mail) }}">{{ $mail->user->last_name.' '.$mail->user->first_name }}</a>
                                            </td>
                                            <td class="mailbox-subject">{{ $mail->subject }}</td>
                                            <td class="mailbox-date" data-message-time="{{ $mail->created_at }}"></td>
                                        </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer p-0">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                            <i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-danger">
                                <i class="far fa-trash-alt"></i> Delete
                            </button>
                        </div>
                        <!-- /.btn-group -->
                        <a href="{{ route('news_letter_sent.index') }}">
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </a>
                        <div class="float-right">
                            {{ $mails->links() }}
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.float-right -->
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

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
                    <p>Voullez vous supprimer ce(s) mail(s) ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Non</button>
                    <button type="button" class="btn btn-outline-light" id="confirmBtnDanger">Oui</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
        <!-- /.modal-dialog -->
    @endsection

    @section('script')
        <script>
            $(function() {
                //Enable check and uncheck all functionality
                $('.checkbox-toggle').click(function() {
                    var clicks = $(this).data('clicks')
                    if (clicks) {
                        //Uncheck all checkboxes
                        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass(
                            'fa-square')
                    } else {
                        //Check all checkboxes
                        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass(
                            'fa-check-square')
                    }
                    $(this).data('clicks', !clicks)
                })
            })
        </script>
        <script>
            $(document).ready(function() {
                function formatTimeDifference(timeDifference) {
                    if (timeDifference < 60) {
                        return timeDifference + ' mins ago';
                    } else if (timeDifference < 60 * 24) {
                        return Math.floor(timeDifference / 60) + ' hours ago';
                    } else if (timeDifference < 60 * 24 * 30) {
                        return Math.floor(timeDifference / (60 * 24)) + ' days ago';
                    } else if (timeDifference < 60 * 24 * 30 * 12) {
                        return Math.floor(timeDifference / (60 * 24 * 30)) + ' months ago';
                    } else {
                        return Math.floor(timeDifference / (60 * 24 * 30 * 12)) + ' years ago';
                    }
                }

                $('.mailbox-date').each(function() {
                    var messageTime = $(this).data('message-time');
                    var messageDateObj = new Date(messageTime);
                    var timeDifference = Math.floor((new Date() - messageDateObj) / 1000 / 60);

                    var formattedTime = formatTimeDifference(timeDifference);

                    $(this).text(formattedTime);
                });

                $('#confirmBtnDanger').on('click', function() {
                    // Soumettre le formulaire
                    $('#checboxDestry').submit();
                });
            });
        </script>
    @endsection
