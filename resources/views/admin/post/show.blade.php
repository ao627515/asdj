@extends('layout.admin_layout')

@section('page', 'Articles')

@section('sub_page', 'Article')

@section('content')
    <div class="container">
        <div class="py-3">
            <div class="btn-group position-fixed bottom-0 end-0 p-5">
                <button type="button" class="btn btn-info text-light fw-bold">Action</button>
                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                    data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
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
            <article class="article">
                <h1 class="article-title text-center fw-bold ">{{ $post->title }}</h1>

                <p class="article-date text-center">publié le {{ $post->dateFormatFr($post->published_at) }}</p>

                <div class="article-image mb-3">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="img-fluid">
                </div>

                <div class="article-content">
                    {!! $post->content !!} <!-- Affiche le contenu Summernote sans échappement -->
                </div>
            </article>

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
<script>
    $(function() {

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
