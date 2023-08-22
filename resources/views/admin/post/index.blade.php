@extends('layout.admin_layout')

@section('page', 'Articles')

@section('sub_page', 'Liste des articles')

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
                <h3 class="card-title w-100 text-center">Liste des Articles</h3>
            </div>
            <div class="card-header d-flex justify-content-end bg-white">
                <a href="{{ route('post.create') }}">
                    <button class="btn btn-primary">Ajouter</button>
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Publié le</th>
                            <th class="text-center no-export">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Publié le</th>
                            <th class="text-center no-export">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>
                                    @if ($post->has_publish)
                                        {{ $post->published_at }}
                                    @else
                                    <p class="text-danger">
                                        Non publié
                                    </p>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Action</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="{{ route('post.show', $post->slug) }}">
                                                <button class="btn btn-info w-100">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <form action="{{ route('post.destroy', $post) }}" method="post"
                                                class="form-action dropdown-item">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-danger action-btn w-100"
                                                    data-toggle="modal" data-target="#modal-danger">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                            @if ($post->has_publish)
                                                <form action="{{ route('post.unpublish', $post) }}" method="post"
                                                    class="form-action dropdown-item">
                                                    @csrf
                                                    <button type="button" class="btn btn-warning action-btn w-100"
                                                        data-toggle="modal" data-target="#modal-warning">
                                                        Caché
                                                    </button>
                                                </form>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('post.edit', $post) }}">
                                                <button class="btn btn-primary w-100"><i class="bi bi-pencil"></i></button>
                                            </a>
                                            @if (!$post->has_publish)
                                                <form action="{{ route('post.publish', $post) }}" method="post"
                                                    class="form-action dropdown-item">
                                                    @csrf
                                                    <button type="button" class="btn btn-success action-btn w-100"
                                                        data-toggle="modal" data-target="#modal-success">
                                                        Publié
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
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
                        <p>Voullez vous supprimé cet article ?</p>
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

        <div class="modal fade" id="modal-success">
            <div class="modal-dialog">
                <div class="modal-content bg-success">
                    <div class="modal-header">
                        <h4 class="modal-title">Success Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Voullez vous publié cet article ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Non</button>
                        <button type="button" class="btn btn-outline-light" id="confirmBtnSuccess">Oui</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-warning">
            <div class="modal-dialog">
                <div class="modal-content bg-warning">
                    <div class="modal-header">
                        <h4 class="modal-title">Success Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Voullez vous masqué cet article ?. <br>Elle ne sera visible que depuis la pasge administrteur</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Non</button>
                        <button type="button" class="btn btn-outline-light" id="confirmBtnWarning">Oui</button>
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



            // $('#confirmBtnWarning').on('click', function() {
            //     $('#formWarning').submit();
            // });

            $('.action-btn').on('click', function() {
                var form = $(this).closest('.form-action');

                $('#confirmBtnWarning').on('click', function() {
                    form.submit();
                });
                $('#confirmBtnDanger').on('click', function() {
                    // Soumettre le formulaire
                    form.submit();
                });

                $('#confirmBtnSuccess').on('click', function() {
                    // Soumettre le formulaire
                    form.submit();
                });
            });

        });
    </script>
@endsection
