@extends('layout.admin_layout')

@section('page', 'Administrateurs')

@section('sub_page', 'Modifications')

@section('content')
    <div class="container">

        <form action="{{ route('user.update', $user) }}" method="post" class="vstack gap-3">
            @csrf
            @method('put')
            <div class="px-5">
                <div class="mb-3">
                    <x-form.label for='last_name'>Nom</x-form.label>
                    <x-form.input name="last_name" type="text" value="{{ $user->last_name }}" required/>
                </div>

                <div class="mb-3">
                    <x-form.label for='first_name'>Prénom(s)</x-form.label>
                    <x-form.input name="first_name" type="text" value="{{ $user->first_name }}" required/>
                </div>

                <div class="mb-3">
                    <x-form.label for='phone'>Téléphone</x-form.label>
                    <x-form.input name="phone" type="number" value="{{ $user->phone }}" required/>
                </div>

                <div class="mb-3">
                    <x-form.label for='email'>Email</x-form.label>
                    <x-form.input name="email" type="email" value="{{ $user->email }}" required/>
                </div>

                @if (false)
                    <div class="mb-3">
                        <label for="role">Rôle</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="Super Administrateur" @selected($user->role == 'Super Administrateur')>Super Administrateur</option>
                            <option value="Administrateur" @selected($user->role == 'Administrateur')>Administrateur</option>
                        </select>
                    </div>
                @endif

                <button type="button" class="btn btn-primary w-100 mt-3" data-toggle="modal" data-target="#modal-default">
                    Modifier
                </button>
            </div>
        </form>
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
                        <p>Voulez-vous modifé vos données ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermé</button>
                        <button type="submit" class="btn btn-primary" id="confirmBtn">Enregistrer</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Gérer l'événement de clic sur le bouton de validation
            $('#confirmBtn').on('click', function() {
                // Soumettre le formulaire
                $('form').submit();
            });
        });
    </script>
@endsection
