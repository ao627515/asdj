<?php

namespace App\Http\Controllers\Admin;

use App\Models\Choice;
use App\Models\PrbsCandidate;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrbsCandidate\StorePrbsCandidateRequest;
use App\Jobs\Email\SendPrbsCandidateMail;
use App\Mail\PrbsCandidate\PrbsCandidateMail;
use Illuminate\Support\Facades\Mail;

class PrbsCandidateController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(PrbsCandidate::class, 'prbs_candidate');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.prbs_candidate.index', [
            'candidates' => PrbsCandidate::with('choices')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('public.prbs_candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrbsCandidateRequest $request)
    {
        // dd($request->validated());
        $dataValidated = $request->validated();

        // Création du candidat
        $candidate = PrbsCandidate::create(array_merge(
            $dataValidated,
            [
                'inscription_date' => now()
            ]
        ));

        // Vérification de la création du candidat
        if (!$candidate) {
            return back()->with('error', "Echec de l'inscription, veuillez recommencer");
        }

        // Préparation des choix
        $choices = [
            [
                'university' => $request->input('university_1'),
                'major' => $request->input('major_1'),
                'tuition' => $request->input('tuition_1'),
                'study_level' => $request->input('study_level_1'),
                'course_mode' => $request->input('course_mode_1'),
            ],
            [
                'university' => $request->input('university_2'),
                'major' => $request->input('major_2'),
                'tuition' => $request->input('tuition_2'),
                'study_level' => $request->input('study_level_2'),
                'course_mode' => $request->input('course_mode_2'),
            ],
            [
                'university' => $request->input('university_3'),
                'major' => $request->input('major_3'),
                'tuition' => $request->input('tuition_3'),
                'study_level' => $request->input('study_level_3'),
                'course_mode' => $request->input('course_mode_3'),
            ]
        ];

        // Création des choix avec vérification
        foreach ($choices as $choiceData) {
            $choice = new Choice($choiceData);
            $choice->prbs_candidate_id = $candidate->id;
            if (!$choice->save()) {
                $candidate->delete(); // Suppression du candidat en cas d'échec
                return back()->with('error', "Echec de l'inscription, veuillez recommencer");
            }
        }

        SendPrbsCandidateMail::dispatch($candidate)->onQueue('emails');

        return back()->with('success', 'Inscription réussie');
    }


    /**
     * Display the specified resource.
     */
    public function show(PrbsCandidate $prbs_candidate)
    {
        return view('admin.prbs_candidate.show', [
            'candidate' => $prbs_candidate
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrbsCandidate $prbs_candidate)
    {
        $prbs_candidate->delete();

        return to_route('prbs_candidate.index')->with('success', 'Candidat supprimer');
    }

    public function print(PrbsCandidate $prbs_candidate)
    {
        SendPrbsCandidateMail::dispatch($prbs_candidate)->onQueue('emails');

        return view('admin.prbs_candidate.print', [
            'candidate' => $prbs_candidate
        ]);
    }
}
