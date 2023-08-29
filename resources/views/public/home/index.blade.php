@extends('layout.public-layout')

@section('title', 'Accueil')

@section('content')
@section('content')
    <x-alert />
    <section id="heros">
        <div id="carouseHero" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @for ($i = 1; $i < 8; $i++)
                    <div class="carousel-item @if ($i == 1) active @endif ">
                        <img src="{{ asset('dist/img/carrousel') . '/' . $i . '.jpg' }}" class="w-100" alt="..."
                            height="500px">
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section id="prbs">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-center justify-content-center g-5 p-3">
                <div class="col-12 col-sm-8 col-lg-6">
                    <img src="{{ asset('dist/img/programmes/prbs_500_500.png') }}" class="d-block mx-lg-auto img-fluid"
                        alt="ASDJ logo" width="100%" height="100%" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Programme de Recherche de Bourses et
                        de
                        Stages</h1>
                    <p class="lead fw-normal">
                        Le PRBS est un programme de l'ASDJ et de ses partenaires lancé depuis 2010. L'objectif de ce
                        programme est d'accompagner les étudiants dans leur quête de formation à travers des bourses
                        d'études et des stages.

                        Depuis 2010 à ce jour, plus de 18000 étudiants ont bénéficié de l'accompagnement soit à
                        travers des bourses, soit des stages.

                        Pour cette édition encore, l'ASDJ disponibilise encore plus de bourses d'études.

                        Peuvent prendre part à ce programme les étudiants salariés ou non, de la licence 1 jusqu'au master 2 des
                        universités
                        et instituts privés.
                    </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">

                        <a href="{{ route('prbs_candidate.create') }}">
                            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">
                                Démarrer mon inscription
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="salutation">
        <div class="container">
            <div class="row featurette p-3">
                <div class="col-md-5">
                    <img src="{{ asset('dist/img/asdj/1er_responsable_de_ASDJ_400x500.png') }}" alt="Responsable ASDJ"
                        class="profile-picture img-fluid mb-3" style="height: 500px; width:500px;">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1 text-center fw-bold">Mot de M. Ernest LANKOANDÉ</h2>
                    <h2 class="featurette-heading fw-normal lh-1 text-center">1er Responsable de l'ASDJ</h2>
                    <p class="lead fw-normal">
                        <strong> Cher internautes,</strong> <br>
                        Le Conseil d’administration de l'ASDJ vous souhaite la bienvenue sur votre site web.
                        Il a été conçu afin de permettre à tout internaute de s’informer sur les actions de l'ASDJ
                        et
                        l’ensemble de ses membres en faveur de la Solidarité et du développement des jeunes sur le
                        plan
                        national, régional et international : activités, formations, actualités, … Tout est fait
                        pour
                        garantir votre satisfaction.

                        Bien structuré, le site offre une navigation simplifiée. Il est désormais possible
                        d’interagir
                        avec l'ASDJ à travers les réseaux sociaux qui y sont bien configurés. En plus, notre portail
                        est
                        accessible depuis les moteurs de recherche.

                        Nous espérons que vous apprécierez la navigation sur votre site web et que vous le visiterez
                        régulièrement pour vous tenir informé des actions de l'ASDJ en faveur de la Solidarité et du
                        développement des jeunes.

                        Bonne navigation !
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="programmes">
        <div class="container">
            <div class="py-3">
                <h2 class="text-center h1 mb-4">Nos Programmes</h2>
                <div class="row row-cols-1 row-cols-sm-4 g-4 ">
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('dist/img/programmes/prbs_250_250.jpg') }}" class="card-img-top"
                                alt="...">
                            <div class="card-body d-flex flex-column justify-content-between"">
                                <h5 class="card-title">PRBS</h5>
                                <p class="card-text">
                                    Programme de Recherche de Stages et de Bourses
                                </p>
                                <a href="{{ route('home.programmes') . '#prbs' }}" class="btn btn-primary">savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('dist/img/programmes/paiasp_250_250.jpg') }}" class="card-img-top"
                                alt="...">
                            <div class="card-body d-flex flex-column justify-content-between"">
                                <h5 class="card-title">PAI-ASP</h5>
                                <p class="card-text">
                                    Programme d'Appui aux Initiatives Agro-Sylvo Pastorales
                                </p>
                                <a href="{{ route('home.programmes') . '#pai-sp' }}" class="btn btn-primary">savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('dist/img/programmes/pcc_500_500.jpg') }}" class="card-img-top"
                                alt="...">
                            <div class="card-body d-flex flex-column justify-content-between"">
                                <div class="mb-3">
                                    <h5 class="card-title">PCC</h5>
                                    <p class="card-text">
                                        Citoyen dans la Cité
                                    </p>
                                </div>
                                <a href="{{ route('home.programmes') . '#pcc' }}" class="btn btn-primary">savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('dist/img/programmes/pst_250_250.jpg') }}" class="card-img-top"
                                alt="...">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title">PST</h5>
                                    <p class="card-text">
                                        Santé pour Tous
                                    </p>
                                </div>
                                <a href="{{ route('home.programmes') . '#pst' }}"
                                    class="btn btn-primary float-bottom">savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="actualités" class=" py-3" style="background-color: #4F0904">
        <div class="container">
            <h2 class="text-center text-light  h1 fw-bold mb-3">Actualités</h2>
            <div class="row row-cols-1 row-cols-sm-3 g-4 mb-3">
                @forelse ($recentPosts as $post)
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $post->imageUrl() }}" class="card-img-top" alt="{{ $post->title }}"
                                height="200">
                            <div class="card-body">
                                <p class="card-text">
                                    @if (strlen($post->description) > 100)
                                        {{-- Si la description est plus longue que 100 caractères --}}
                                        {{ substr($post->description, 0, 100) }}... {{-- Affiche les 100 premiers caractères et ajoute ... --}}
                                    @else
                                        {{ $post->description }} {{-- Sinon, affiche la description complète --}}
                                    @endif
                                </p>
                                <a href="{{ route('blog.show', $post) }}" class="card-link">Voir plus</a>
                            </div>
                        </div>
                    </div>
                @empty
                {{-- <div class="col"></div> --}}
                    <div class="col offset-sm-4">
                        <p class="lead text-light text-center">
                            Aucun article publié
                        </p>
                    </div>

                @endforelse
            </div>
            <div class="d-flex justify-content-center align-item-center">
                <a href="" class="h4 text-light">Voir plus</a>
            </div>
        </div>
    </section>

    <section id="apropos" class="py-3">
        <div class="container">
            <div class="px-sm-5 px-2">
                <h2 class="text-center h1 fw-bold mb-3">Qui sommes nous ?</h2>
                <div class="row featurette p-3">
                    <div class="col-md-5">
                        <img src="{{ asset('dist/img/asdj/asdj_logo_500_500.png') }}" alt="Responsable ASDJ"
                            class="profile-picture img-fluid">
                    </div>
                    <div class="col-md-7">
                        <p class="lead fw-normal">
                            L'Association pour la Solidarité et le Développement des Jeunes (ASDJ) a été créée en 2000 à
                            Ouagadougou, Burkina-Faso, en tant qu'organisation panafricaine. Elle a réalisé des projets
                            impactants pour l'épanouissement et le développement des jeunes, et elle est active dans
                            diverses
                            régions et pays, avec une mission visant à promouvoir les droits humains, la diversité
                            culturelle et
                            la participation des jeunes aux questions politiques et sociales. L'ASDJ compte plus de 1000
                            jeunes
                            militants et des volontaires qui œuvrent pour une société civile jeune et participative. Son
                            crédit
                            en tant qu'acteur efficace dans la sensibilisation à la citoyenneté et au développement du
                            Burkina-Faso, combiné à sa présence territoriale, offre un terrain favorable pour de
                            nouveaux
                            partenariats et projets innovants. Un exemple est l'émission radiophonique "Championnat
                            national de
                            lecture et d'oralité". <a href="">En savoir plus</a> sur l'ASDJ
                            et son engagement pour la jeunesse.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="merites" class="py-3">
        <div class="container">
            <div class="row row-cols-3 text-center">
                <div class="col">
                    <i class="fas fa-handshake fa-3x"></i>
                    <h4>+ <span>300</span> Partenaires</h4>
                </div>
                <div class="col">
                    <i class="fas fa-graduation-cap fa-3x"></i>
                    <h4>+ <span>18000</span> boursiers</h4>
                </div>
                <div class="col">
                    <i class="fas fa-university fa-3x"></i>
                    <h4>+ <span>23</span> ans d'existence</h4>
                </div>
            </div>
        </div>
    </section>

    <section id="partenaires" class="py-4" style="background-color: #fff">
        <div class="container">
            <h2 class="text-center h1 mb-3">Nos Partenaires</h2>
            <div id="iconCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php $partners = [
                        [
                            'image' => 'dist/img/partenaires/6.jpg',
                            'name' => 'Ecole en Direct'
                        ],
                        [
                            'image' => 'dist/img/partenaires/5.jpg',
                            'name' => 'Building Capacity Institute'
                        ],
                        [
                            'image' => 'dist/img/partenaires/4.jpg',
                            'name' => 'FAS-InTECH'
                        ],
                        [
                            'image' => 'dist/img/partenaires/3.jpg',
                            'name' => 'Association des Municipalités du Burkina Faso - AMBF'
                        ],
                        [
                            'image' => 'dist/img/partenaires/2.jpg',
                            'name' => 'Ministère de la jeunesse'
                        ],
                        [
                            'image' => 'dist/img/partenaires/1.jpg',
                            'name' => 'Secrétariat Permanent des Organisations non gouvernementales'
                        ],
                    ]; @endphp


                    @foreach(array_chunk($partners, 3) as $partnerGroup)
                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                            <div class="row">
                                @foreach($partnerGroup as $partner)
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column align-items-center mb-3">
                                            <img src="{{ asset($partner['image']) }}" alt="" height="200" width="200">
                                            <h4 class="mt-3 text-center">{{ $partner['name'] }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#iconCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#iconCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>


    <section id="temoignage" class="py-3" style="background-color: #4F0904">
        <div class="container">
            <h2 class="text-center text-light mb-3 fw-bold h1">Témoignages</h2>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active bg-danger" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2" class="bg-danger"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3" class="bg-danger"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row featurette p-3 bg-light">
                            <div class="col-md-5">
                                <img src="dist/img/temoignages/temoignage_1.jpg" alt="Responsable ASDJ"
                                    class="profile-picture img-fluid" style="width:500px; max-height: 400px">
                            </div>
                            <div class="col-md-7 py-5">
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-3 d-flex justify-content-center">
                                        <img src="{{ asset('dist/svg/mortarboard.svg') }}" class="me-4 mortarboard" alt="asdj témoignage">
                                    </div>
                                    <div class="col-12 col-sm-9 d-flex">
                                        <h3 class="mortarboard-title m-auto d-block">
                                            Nos boursiers témoignent
                                        </h3>
                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-center h-75">
                                    <p class="lead fw-medium">
                                        Le PRBS m’a permis de poursuivre mes études … Ça m'a beaucoup aidé et ça a aidé
                                        aussi
                                        mes parents car je suis dans une famille nombreuse. Il m’ont aidé aussi pour les
                                        orientations et j'ai pu faire le bon choix sur ma filière et je m’en sort dans mes
                                        études.
                                    </p>
                                    <h2 class="featurette-heading fw-normal lh-1 fw-bold">
                                        DERA Kadidia
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row featurette p-3 bg-light">
                            <div class="col-md-5">
                                <img src="dist/img/temoignages/avatar_gray_400x500.jpg" alt="Responsable ASDJ"
                                    class="profile-picture img-fluid" style="width:500px; max-height: 400px">
                            </div>
                            <div class="col-md-7 py-5">
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-3 d-flex justify-content-center">
                                        <img src="{{ asset('dist/svg/mortarboard.svg') }}" class="me-4 mortarboard" alt="asdj témoignage">
                                    </div>
                                    <div class="col-12 col-sm-9 d-flex">
                                        <h3 class="mortarboard-title m-auto d-block">
                                            Nos boursiers témoignent
                                        </h3>
                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-center h-75">
                                    <p class="lead fw-medium">
                                        J’ai pu aller à l’école supérieure de commerce grâce à l’ASDJ. Ils m’ont permis
                                        d’avoir
                                        une bourse de 50% pendant 3 années.
                                        Et jusqu’à présent, l'association continue de m’aider dans mes différentes
                                        activités.
                                        Il m’ont égal permis de débuter mon master avec une bourse d'études de 50 %.
                                        J’ai connu l’association par l’intermédiaire d’une amie du nom de Ouedraogo Samira
                                        qui
                                        est elle aussi boursière de l’ASDJ
                                    </p>
                                    <h2 class="featurette-heading fw-normal lh-1 fw-bold">
                                        M. Ibrahim
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row featurette p-3 bg-light">
                            <div class="col-md-5">
                                <img src="dist/img/temoignages/temoignage_3.jpg" alt="Responsable ASDJ"
                                    class="profile-picture img-fluid" style="width:500px; max-height: 400px">
                            </div>
                            <div class="col-md-7 py-5">
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-3 d-flex justify-content-center">
                                        <img src="{{ asset('dist/svg/mortarboard.svg') }}" class="me-4 mortarboard" alt="asdj témoignage">
                                    </div>
                                    <div class="col-12 col-sm-9 d-flex">
                                        <h3 class="mortarboard-title m-auto d-block">
                                            Nos boursiers témoignent
                                        </h3>
                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-center h-75">
                                    <p class="lead fw-medium">
                                        Je voudrais par cette voix dire merci à l'association parce qu'elle a apporté
                                        beaucoup dans ma vie. J'avais besoin de faire le master et l'ASDJ m'a accordé cette
                                        grâce de pouvoir faire le master et finaliser mes études. Au delà de ça, nous avons
                                        développé au sein de l'ASDJ un esprit de famille et un système de réseautage entre
                                        boursiers de l'ASDJ. Aujourd'hui, je recommande beaucoup l'ASDJ à nos nouveaux
                                        bacheliers et ceux qui n'ont pas assez de moyens financiers pour leurs études.
                                    </p>
                                    <h2 class="featurette-heading fw-normal lh-1 fw-bold">
                                        Mme Arlette OUEDRAOGO
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </section>

    <section id="contact" class="py-3">
        <div class="container">
            <div class="px-5">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div>
                            <h2 class="text-center">Contact</h2>
                            <p class="lead">
                                Nous sommes ravis de vous entendre et nous vous répondrons dans les plus brefs délais. Merci
                                de votre intérêt pour l'ASDJ !</p>
                            </p>
                            <ul class="clearfix list-unstyled ms-5">
                                <li>
                                    <p><i class="fa fa-envelope-o"></i> Email: <a
                                            href="mailto:ongasdj@gmail.com">ongasdj@gmail.com</a></p>
                                </li>
                                <li>
                                    <p><i class="bi bi-mailbox"></i> Adresse Postal: 06 BP 10657 Ouagadougou 06</p>
                                </li>
                                <li>
                                    <p><i class="fa fa-phone"></i> Phone: <a href="tel:+22602949434">
                                            (+226) 02 94 94 34
                                        </a>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-phone"></i> Phone: <a href="tel:+22664103734">
                                            (+226) 64 10 37 34
                                        </a>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-fax"></i> Fax: <a href="tel:+22625659122">(+226) 25 65 91 22 </a>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-fax"></i> Fix: <a href="tel:++22625412208">(+226) 25 41 22 08 </a>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="bi bi-whatsapp"></i> Whatsapp: <a href="https://wa.me/22671840101s"
                                            target="_blank">(+226) 71 84 01 01</a>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-map-marker"></i> Address: <a
                                            href="https://maps.app.goo.gl/sJs5umZHNvewnsx8A" target="_blank">Lien google
                                            map</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <h3 class="text-center mb-3">Formulaire de contact</h3>
                        <form method="post" action="{{ route('contact_form.send') }}" class="h-100">
                            @csrf
                            <div class="row gap-4">
                                <div class="col-12">
                                    <x-form.input name="name" placeholder="Name" type="text" required />
                                </div>
                                <div class="col-12">
                                    <x-form.input name="email" placeholder="Email" type="email" required />
                                </div>
                                <div class="col-12">
                                    <x-form.input name="subject" placeholder="Sujet" type="text" required />
                                </div>
                                <div class="col-12">
                                    <x-form.textarea name="message" placeholder="Message" type="text" rows="5"
                                        required />
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="submit" name="submit"
                                        class="btn btn-primary form-control">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news_letter" class="py-3" style="background-color: #4F0904">
        <div class="container">
            <div class="py-5">
                <h2 class="h1 text-center text-light mb-3">News letter</h2>
                <p class="text-center text-light lead">
                    Restez informé sur nos dernières actualités et évènements
                </p>
                <form id="subscribe" action="{{ route('news_letter.subscribe') }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-10">
                            <x-form.input name="subscriber_email" placeholder="Email" type="text" required />
                        </div>
                        <div class="col-sm-2 d-flex justify-content-center">
                            <button type="submit" id="subscribe-button" class="btn btn-primary"
                                style="border: 1px #f8f9fa solid">
                                <i class="fa fa-rss" style="color: #f8f9fa"></i> Souscrire
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
