@extends('layout.admin_layout')

@section('page', 'Administrateurs')

@section('sub_page', 'Nouvel Administrateur')

@section('content')
    <div class="container py-3">
        <h3 class="text-center mt-5">Nouvel Administrateur</h3>
        <form action="{{ route('user.store') }}" method="post" class="vstack gap-3">
            @csrf
            <div class="px-5">
                <div class="mb-3">
                    <x-form.label for='last_name'>Nom</x-form.label>
                    <x-form.input name="last_name" type="text" required />
                </div>

                <div class="mb-3">
                    <x-form.label for='first_name'>Prénom(s)</x-form.label>
                    <x-form.input name="first_name" type="text" required />
                </div>

                <div class="mb-3">
                    <x-form.label for='phone'>Téléphone</x-form.label>
                    <x-form.input name="phone" type="number" />
                </div>

                <div class="mb-3">
                    <x-form.label for='email'>Email</x-form.label>
                    <x-form.input name="email" type="email" required />
                </div>

                @if (auth()->user()->role === 'Super Administrateur')
                    <div class="mb-3">
                        <label for="role">Rôle</label>
                        <select name="role" id="role" class="form-select  @error('role') is-invalid @enderror"
                            required>
                            <option disabled selected>Rôle</option>
                            <option value="Super Administrateur">Super Administrateur</option>
                            <option value="Administrateur">Administrateur</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif


                <button class="btn btn-primary w-100">
                    Creer
                </button>
            </div>
        </form>
    </div>
@endsection
