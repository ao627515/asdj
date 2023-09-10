@extends('layout.public-layout')

@section('title', 'Inscription au PRBS')

@section('meta')
    <meta name="description"
        content="Inscrivez-vous au Programme de Recherche de Bourses et de Stages (PRBS) de l'ASDJ Burkina Faso. Découvrez les opportunités de bourses et de stages pour les jeunes.">
    <meta name="keywords" content="inscription PRBS, bourses jeunes, stages jeunes, ASDJ Burkina Faso,  Programme de Recherche de Bourses et de Stages, asdj, ASDJ">
@endsection


@section('content')
    <x-alert></x-alert>
    <div class="container">
        <div class="px-md-5">
            <div class="px-md-5">
                <h1 class="text-center mt-5">Formulaire de
                    réservation de la Fiche de demande de bourse PRBS 2023-2024</h1>
                <p class=" lead fw-medium mt-5 ">
                    Ce formulaire est dédié aux anciens et nouveaux bacheliers vulnérables qui désirent une bourse d'étude
                    annuelle
                    totale ou partielle d'une UNIVERSITÉ PRIVÉE du BURKINA-FASO. <br>
                    Après remplissage de ce formulaire, veuillez nous faire parvenir le dossier de candidature physique à
                    nos
                    différents sites de réception.
                </p>
                <p class="lead fw-medium mt-5 ">
                    NB : Cliquez ici pour télécharger la liste des documents requis <a
                        href="{{ asset('dist/pdf/prbs/Dossier_PRBS.pdf') }}">Ici</a>
                </p>
                <form action="{{ route('prbs_candidate.store') }}" method="post" class="mt-5">
                    @csrf
                    <fieldset class="bg-light p-4 rounded mb-3">
                        <legend>Avez-vous des difficultés à financer vos études supérieures ?
                        </legend>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="funding_difficulties"
                                        id="funding_difficulties1" value="Oui" checked>
                                    <label class="form-check-label" for="funding_difficulties1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="funding_difficulties"
                                        id="funding_difficulties2" value="Non">
                                    <label class="form-check-label" for="funding_difficulties2">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-light p-4 rounded mb-3">
                        <legend>Informations Personnelles</legend>
                        <div class="row  row-cols-1 row-cols-md-2 ">
                            <div class="col row row-cols-1">
                                <div class="col">
                                    <div class="mb-3">
                                        <x-form.label for="last_name">Nom</x-form.label>
                                        <x-form.input name="last_name" type="text" placeholder="Nom" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <x-form.label for="first_names">Prénom(s)</x-form.label>
                                        <x-form.input name="first_names" type="text" placeholder="Prénom(s)" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <x-form.label for="gender">Genre</x-form.label>
                                        <select class="form-select" name="gender" id="gender">
                                            <option @selected(old('gender') == '') disabled>Genre</option>
                                            <option value="Masculin" @selected(old('gender') == 'Masculin')>Masculin</option>
                                            <option value="Féminin" @selected(old('gender') == 'Féminin')>Féminin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <x-form.label for="birth_date">Date de naissance</x-form.label>
                                        <x-form.input name="birth_date" type="date" placeholder="Date de naissance"
                                            required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <x-form.label for="birthplace">Lieu de naissance</x-form.label>
                                        <x-form.input name="birthplace" type="text" placeholder="Lieu de naissance"
                                            required />
                                    </div>
                                </div>
                            </div>
                            <div class="col row row-cols-1">
                                <div class="col">
                                    <div class="mb-3">
                                        <x-form.label for="nationality">Nationalité</x-form.label>
                                        <x-form.input name="nationality" type="text" placeholder="Nationalité"
                                            required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <x-form.label for="id_document_number">
                                            Numéro de la pièce d'identification (CNI ou Passeport)
                                        </x-form.label>
                                        <x-form.input name="id_document_number" type="text"
                                            placeholder="Numéro de la pièce d'identification (CNI ou Passeport)" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <x-form.label for="id_document_date">
                                            Date de la pièce d'identification (CNI ou Passeport)
                                        </x-form.label>
                                        <x-form.input name="id_document_date" type="date"
                                            placeholder="Date de la pièce d'identification (CNI ou Passeport)" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <x-form.label for="status">Statut</x-form.label>
                                        <select class="form-select" name="status" id="status">
                                            <option @selected(old('status') == '') disabled>Statut</option>
                                            <option value="Nouveau(elle) bachelier(e)" @selected(old('status') == 'Nouveau(elle) bachelier(e)')>
                                                Nouveau(elle) bachelier(e)</option>
                                            <option value="Ancien(ne) bachelier(e)" @selected(old('status') == 'Ancien(ne) bachelier(e)')>Ancien(ne)
                                                bachelier(e)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-light p-4 rounded mb-3">
                        <legend>Adresse et Contact</legend>
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                                <div class="mb-3">

                                    <x-form.label for="residence_city">Ville de résidence</x-form.label>
                                    <x-form.input name="residence_city" type="text" placeholder="Ville de résidence"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="residence_district">Quartier de résidence</x-form.label>
                                    <x-form.input name="residence_district" type="text"
                                        placeholder="Quartier de résidence" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="email">Email</x-form.label>
                                    <x-form.input name="email" type="email" placeholder="exemple@gmail.com"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">

                                    <x-form.label for="phone">Numéro de téléphone et/ou WhatsApp</x-form.label>
                                    <x-form.input name="phone" type="text" placeholder="Numéro" required />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-light p-4 rounded mb-3">
                        <legend>1er Choix d'Université </legend>
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="university_1">Nom de l'université</x-form.label>
                                    <x-form.input name="university_1" type="text" placeholder="Nom de l'université"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="major_1">Filière</x-form.label>
                                    <x-form.input name="major_1" type="text" placeholder="Filière" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="study_level_1">Niveau d'étude</x-form.label>
                                    <x-form.input name="study_level_1" type="text" placeholder="Niveau d'étude"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="tuition_1">Coût de la formation</x-form.label>
                                    <x-form.input name="tuition_1" type="number" placeholder="Coût de la formation"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <x-form.label for="course_mode_1">Type de cours</x-form.label>
                                <select class="form-select" name="course_mode_1" id="course_mode_1">
                                    <option @selected(old('course_mode_1') == '') disabled>Type de cours</option>
                                    <option value="Ligne" @selected(old('course_mode_1') == 'Ligne')>Ligne</option>
                                    <option value="Présentiel" @selected(old('course_mode_1') == 'Présentiel')>Présentiel</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-light p-4 rounded mb-3">
                        <legend>2ème Choix d'Université</legend>
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="university_2">Nom de l'université</x-form.label>
                                    <x-form.input name="university_2" type="text" placeholder="Nom de l'université"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="major_2">Filière</x-form.label>
                                    <x-form.input name="major_2" type="text" placeholder="Filière" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="study_level_2">Niveau d'étude</x-form.label>
                                    <x-form.input name="study_level_2" type="text" placeholder="Niveau d'étude"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="tuition_2">Coût de la formation</x-form.label>
                                    <x-form.input name="tuition_2" type="number" placeholder="Coût de la formation"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <x-form.label for="course_mode_2">Type de cours</x-form.label>
                                <select class="form-select" name="course_mode_2" id="course_mode_2">
                                    <option @selected(old('course_mode_2') == '') disabled>Type de cours</option>
                                    <option value="Ligne" @selected(old('course_mode_2') == 'Ligne')>Ligne</option>
                                    <option value="Présentiel" @selected(old('course_mode_2') == 'Présentiel')>Présentiel</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="bg-light p-4 rounded mb-3">
                        <legend>3ème Choix d'Université</legend>
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="university_3">Nom de l'université</x-form.label>
                                    <x-form.input name="university_3" type="text" placeholder="Nom de l'université"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="major_3">Filière</x-form.label>
                                    <x-form.input name="major_3" type="text" placeholder="Filière" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="study_level_3">Niveau d'étude</x-form.label>
                                    <x-form.input name="study_level_3" type="text" placeholder="Niveau d'étude"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <x-form.label for="tuition_3">Coût de la formation</x-form.label>
                                    <x-form.input name="tuition_3" type="number" placeholder="Coût de la formation"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <x-form.label for="course_mode_3">Type de cours</x-form.label>
                                <select class="form-select" name="course_mode_3" id="course_mode_3">
                                    <option @selected(old('course_mode_3') == '') disabled>Type de cours</option>
                                    <option value="Ligne" @selected(old('course_mode_3') == 'Ligne')>Ligne</option>
                                    <option value="Présentiel" @selected(old('course_mode_3') == 'Présentiel')>Présentiel</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <div>
                        <p>
                            Une copie de vos réponses sera envoyée par e-mail.
                        </p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-primary" type="submit">
                            Envoyer
                        </button>
                        <button class="btn" type="reset">
                            Effacer le formulaire
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
