@extends('layout.admin_layout')

@section('page', 'Administrateurs')

@section('sub_page', 'Profiles')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <x-alert />
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->nom . ' ' . $user->prenom }}</h5>
                            <p class="text-muted mb-1">{{ Str::ucfirst($user->role) }}</p>
                            <p class="text-muted mb-4">{{ $user->email }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn">
                                        <i class="fa fa-power-off fa-4x" style="color: #dc3545;" aria-hidden="true"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nom</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->last_name . ' ' . $user->first_name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Téléphone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Rôle</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->role }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-sm-5">
                        <form action="{{ route('password.email.inner', $user) }}" method="post" id="password_reset_form">
                            @csrf
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#modal-default">
                                Changer le mot de passe
                            </button>
                        </form>
                    </div>


                </div>
            </div>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirmation</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Voulez-vous changer votre mot de passe ?</p>
                            <p>Un mail sera envoyé à cette adresse {{ $user->email }}</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermé</button>
                            <button type="submit" class="btn btn-primary" id="confirmBtn">Oui</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Gérer l'événement de clic sur le bouton de validation
            $('#confirmBtn').on('click', function() {
                // Soumettre le formulaire
                $('#password_reset_form').submit();
            });
        });
    </script>
@endsection
