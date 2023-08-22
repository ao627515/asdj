@extends('layout.admin_layout')

@section('page', 'Candidats au PRBS')

@section('sub_page', 'Candidat N° ' . $candidate->candidate_id)

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Candidat N° {{ $candidate->candidate_id }}</h2>
        <div class="row row-cols-1 bg-white mb-3">
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
        <div class="row row-cols-1 mb-3 bg-white">
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
            <div class="col mb-3 bg-white">
                <h4 class="text-center mb-3">1er Choix</h4>
                <div class="row row-cols-1 row-cols-sm-5">
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom ">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
            <div class="col  mb-3 bg-white">
                <h4 class="text-center mb-3">2ème Choix</h4>
                <div class="row row-cols-1 row-cols-sm-5">
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
            <div class="col  mb-3 bg-white">
                <h4 class="text-center mb-3">3ème choix</h4>
                <div class="row row-cols-1 row-cols-sm-5">
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
                    <div class="col row row-cols-2 row-cols-sm-1 mb-3 border-bottom">
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
        <div class="row row-cols-2 align-item-center py-5">
            @can('delete', $candidate)
                <div class="col">
                    <form action="{{ route('prbs_candidate.destroy', $candidate) }}" method="post"
                        class="col bg-danger rounded-2" id="formDestroy">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#modal-danger">
                            <i class="bi bi-trash3"></i>
                            Supprimer
                        </button>
                    </form>
                </div>
            @endcan
            <div class="col">
                <a href="{{ route('prbs_candidate.print', $candidate) }}" class="btn btn-secondary w-100">
                    <i class="bi bi-printer-fill"></i>
                    Imprimer
                </a>
            </div>
        </div>
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
                    <p>Voullez vous supprimé les données de ce candidat ?</p>
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#confirmBtnDanger').on('click', function() {
                // Soumettre le formulaire
                $('#formDestroy').submit();
            });
        });
    </script>
@endsection
