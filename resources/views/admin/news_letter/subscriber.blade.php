@extends('layout.admin_layout')

@section('page', 'Abonnés à la newsletter')

@section('sub_page', 'Liste des abonnés à la newsletter')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
                                <i class="far fa-envelope"></i> Sent
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="{{ route('news_letter_sent.create') }}" class="nav-link">
                                <i class="bi bi-envelope-plus"></i> Nouveau mail
                            </a>
                        </li>
                        <li class="nav-item active">
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title w-100 text-center">Liste des emails abonnés à la newsletter</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th class="no-export">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Email</th>
                                <th class="no-export">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($subscribers as $subscribe)
                                <tr>
                                    <td>{{ $subscribe->email }}</td>
                                    <td>
                                        <form action="{{ route('news_letter.destroy', $subscribe ) }}" method="post" class="form-action">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger w-100 action-btn" data-toggle="modal"
                                                data-target="#modal-danger">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->

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
                        <p>Voullez vous supprimé les données de cet abonné ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Non</button>
                        <button type="button" class="btn btn-outline-light" id="confirmBtnDanger">Oui</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

@endsection

@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            var table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "pageLength": 25,
                "autoWidth": false,
                'ordering': false,
                "buttons": [{
                        "extend": "copy",
                        "exportOptions": {
                            "columns": ":not(.no-export)" // Exclut les colonnes avec la classe "no-export"
                        }
                    },
                    {
                        "extend": "csv",
                        "exportOptions": {
                            "columns": ":not(.no-export)" // Exclut les colonnes avec la classe "no-export"
                        }
                    },
                    {
                        "extend": "excel",
                        "exportOptions": {
                            "columns": ":not(.no-export)" // Exclut les colonnes avec la classe "no-export"
                        }
                    },
                    {
                        "extend": "pdf",
                        "exportOptions": {
                            "columns": ":not(.no-export)" // Exclut les colonnes avec la classe "no-export"
                        }
                    },
                    {
                        "extend": "print",
                        "exportOptions": {
                            "columns": ":not(.no-export)" // Exclut les colonnes avec la classe "no-export"
                        }
                    },

                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


            $('.action-btn').on('click', function() {
                var form = $(this).closest('.form-action');

                $('#confirmBtnDanger').on('click', function() {
                    // Soumettre le formulaire
                    form.submit();
                });

            });
        });
    </script>
@endsection
