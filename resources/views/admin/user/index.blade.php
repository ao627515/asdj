@extends('layout.admin_layout')

@section('page', 'Administrateurs')

@section('sub_page', 'Liste des Administrateurs')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

    <div class="container">
        <x-alert />
        <div class="card">
            <div class="card-header">
                <h3 class="card-title w-100 text-center">Liste des Adminisateurs</h3>
            </div>
            <div class="card-header d-flex justify-content-end bg-white">
                <a href="{{ route('user.create') }}">
                    <button class="btn btn-primary">Ajouter</button>
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>{{ $user->last_name . ' ' . $user->first_name }}</th>
                                <th>{{ $user->phone }}</th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->role }}</th>
                                <th>
                                    <div class="row">
                                        @can('view', $user)
                                            <div class="col">
                                                <a href="{{ route('user.show', $user) }}" class="btn btn-info w-100">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('update', $user)
                                            <div class="col">
                                                <a href="{{ route('user.edit', $user) }}"class="btn btn-primary w-100">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('delete')
                                        <div class="col">
                                            <form action="{{ route('user.destroy', $user) }}" method="post"
                                                class="form-action">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-danger w-100 action-btn"
                                                    data-toggle="modal" data-target="#modal-danger">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @endcan
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
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
                        <p>Voullez vous supprimé les données de cet Administrateur ?</p>
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
