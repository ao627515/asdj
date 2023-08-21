@extends('layout.html_layout')

@section('title', 'PRBS Candidate Mail')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <img src="{{ asset('dist/img/asdj/asdj_logo_250_250.png') }}" alt="">
    </div>
    <p class="lead fs-6 fw-normal">
        Cher(e) {{ $candidate->last_name . ' ' . $candidate->first_names }}, <br>

        Nous sommes heureux de vous informer que votre inscription a été reçue et enregistrée avec succès. Chaque
        candidat contribue à faire de ce programme une opportunité unique pour les jeunes passionnés qui cherchent à
        poursuivre leurs études et à développer leurs compétences. <br>

        Dans les prochaines étapes du programme, nous vous tiendrons informé(e) des détails importants et des dates
        clés. Si vous avez des questions, des préoccupations ou si vous souhaitez en savoir plus sur le programme,
        n'hésitez pas à nous contacter à ongasdj@gmail.com ou (+226) 71 84 01 01. <br>

        Avec reconnaissance, <br>

        L'Équipe de l'ASDJ
    </p>
    <h2 class="text-center mb-5 h4 text-decoration-underline">Réponses au formulaire</h2>
    <div class="row row-cols-1  mb-3">
        <h4 class="text-center mb-3">Informations personnelles</h4>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Nom : </strong> {{ $candidate->last_name . ' ' . $candidate->first_names }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Genre : </strong> {{ $candidate->gender }}
            </p>
        </div>

        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Date de naissance : </strong> {{ $candidate->dateFormatFr($candidate->birth_date) }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Lieu de naissance : </strong> {{ $candidate->birthplace }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Nationalité : </strong> {{ $candidate->nationality }}
            </p>
        </div>

        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Numéro de la pièce d'identification (CNI ou Passeport) : </strong>
                {{ $candidate->id_document_number }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Date de la pièce d'identification (CNI ou Passeport) : </strong>
                {{ $candidate->dateFormatFr($candidate->id_document_date) }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Difficulté de financement : </strong> {{ $candidate->funding_difficulties }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Statut : </strong> {{ $candidate->status }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Inscrit le : </strong> {{ $candidate->dateFormatFr($candidate->inscription_date) }}
            </p>
        </div>
    </div>
    <div class="row row-cols-1 mb-3 ">
        <h4 class="text-center mb-3">
            Adresse et Contact
        </h4>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Ville de résidence : </strong> {{ $candidate->residence_city }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Quartier de résidence : </strong> {{ $candidate->residence_district }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Email : </strong> {{ $candidate->email }}
            </p>
        </div>
        <div class="col">
            <p class="fs-6 border-bottom ">
                <strong>Téléphone : </strong> {{ $candidate->phone }}
            </p>
        </div>
    </div>
    <div class="row row-cols-1">
        <div class="col mb-3 ">
            <h4 class="text-center mb-3">1er Choix</h4>
            <div class="row row-cols-1 row-cols-sm-5">
                <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Université</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[0]->university }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Filière</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[0]->major }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Niveau d'étude</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[0]->study_level }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Type de cour</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[0]->course_mode }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Frais de formation</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[0]->tuition }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col  mb-3 ">
            <h4 class="text-center mb-3">2ème Choix</h4>
            <div class="row row-cols-1 row-cols-sm-5">
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Université</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[1]->university }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Filière</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[1]->major }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Niveau d'étude</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[1]->study_level }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Type de cour</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[1]->course_mode }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Frais de formation</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[1]->tuition }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col  mb-3 ">
            <h4 class="text-center mb-3">3ème choix</h4>
            <div class="row row-cols-1 row-cols-sm-5">
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Université</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[2]->university }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Filière</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[2]->major }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Niveau d'étude</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[2]->study_level }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Type de cour</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[2]->course_mode }}
                        </p>
                    </div>
                </div>
                <div class="col row row-cols-2 row-cols-sm-1 mb-2 border-bottom">
                    <div class="col">
                        <p>
                            <strong>Frais de formation</strong>
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            {{ $candidate->choices[2]->tuition }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
