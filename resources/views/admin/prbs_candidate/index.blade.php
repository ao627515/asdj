@extends('layout.admin_layout')

@section('page', 'Candidats au PRBS')

@section('sub_page', 'Liste des Candidats')

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
                <h3 class="card-title w-100 text-center">Liste des candidats au PRBS</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Date de naissance</th>
                            <th>Ville de résidence</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Inscrit le</th>
                            <th class="text-center no-export">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Date de naissance</th>
                            <th>Ville de résidence</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Inscrit le</th>
                            <th class="text-center no-export">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($candidates as $candidate)
                            <tr>
                                <td>{{ $candidate->last_name . ' ' . $candidate->first_names }}</td>
                                <td>{{ $candidate->dateFormatFr($candidate->birth_date) }}</td>
                                <td>{{ $candidate->residence_city }}</td>
                                <td>{{ $candidate->phone }}</td>
                                <td>{{ $candidate->email }}</td>
                                <td>{{ $candidate->status }}</td>
                                <td>{{ $candidate->dateFormatFr($candidate->inscription_date) }}</td>

                                <td>
                                    <div class="row row-cols-2">
                                        <div class="col">
                                            <a href="{{ route('prbs_candidate.show', $candidate) }}" class="btn btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        @can('delete', $candidate)
                                            <div class="col">
                                                <form action="{{ route('prbs_candidate.destroy', $candidate) }}" method="post"
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
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
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
                        <p>Voullez vous supprimé les données de ce candida ?</p>
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
