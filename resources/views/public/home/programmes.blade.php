@extends('layout.public-layout')

@section('title', 'Programmes')

@section('content')
<div class="container">
    <div class="py-5">
        <h2 class="text-center display-1 fw-normal mb-4">Nos Programmes</h2>
        <div class="row row-cols-1 row-cols-sm-4 g-4 ">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('dist/img/programmes/prbs_250_250.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column justify-content-between"">
                        <h5 class="card-title">PRBS</h5>
                        <p class="card-text mb-3">
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
                        <p class="card-text mb-3">
                            Programme d'Appui aux Initiatives Agro-Sylvo Pastorales
                        </p>
                        <a href="{{ route('home.programmes') . '#pai-sp' }}" class="btn btn-primary">savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('dist/img/programmes/pcc_250_250.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column justify-content-between"">
                        <div>
                            <h5 class="card-title">PCC</h5>
                            <p class="card-text mb-3">
                                Citoyen dans la Cité
                            </p>
                        </div>
                        <a href="{{ route('home.programmes') . '#pcc' }}" class="btn btn-primary">savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('dist/img/programmes/pst_250_250.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">PST</h5>
                            <p class="card-text mb-3">
                                Santé pour Tous
                            </p>
                        </div>
                        <a href="{{ route('home.programmes') . '#pst' }}" class="btn btn-primary float-bottom">savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="card mb-3" id="prbs">
            <div class="card-img-top d-flex justify-content-center">
                <img src="{{ asset('dist/img/programmes/prbs_500_500.jpg') }}" class="img-fluid" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">PRBS</h5>
                <p class="card-text lead fw-normal">
                    Le PRBS (Programme de Recherche de Stages et de Bourses) vise à aider les étudiants à trouver des
                    opportunités de stages et de bourses pour poursuivre leurs études. Ce programme inclut une base de
                    données en ligne contenant des offres de stages et de bourses, ainsi que des informations détaillées
                    sur chaque opportunité, telles que les critères d'éligibilité, les dates limites, les avantages
                    offerts, etc. <br>
                    En outre, le programme offre des ressources pour préparer des entretiens, des formations en
                    rédaction de lettres de motivation et de CV professionnels. <br>
                    L'objectif principal d'un tel programme est de faciliter la recherche et l'application aux
                    opportunités de stages et de bourses, aidant ainsi les étudiants à maximiser leurs chances de
                    réussite dans leur parcours éducatif et professionnel.
                </p>
            </div>
        </div>

        <div class="card mb-3" id="pai-sp">
            <div class="card-img-top d-flex justify-content-center">
                <img src="{{ asset('dist/img/programmes/paiasp_500_500.jpg') }}" class="img-fluid" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">PAI-SP</h5>
                <p class="card-text lead fw-normal">
                    Le PAI-ASP ( Programme d'Appui aux Initiatives Agro-Sylvo Pastorales) est une initiative visant à
                    soutenir et promouvoir les activités agricoles, forestières et pastorales durables dans les régions.
                    Ce programme vise à renforcer les pratiques agricoles, forestières et pastorales en intégrant des
                    méthodes innovantes et respectueuses de l'environnement. <br> <br>

                    Ce programme inclut divers éléments tels que : <br> <br>

                    1. Formation et Sensibilisation : Offrir des formations aux agriculteurs, éleveurs et forestiers sur
                    les meilleures pratiques agricoles, d'élevage et de gestion forestière durables. Sensibiliser les
                    communautés locales à l'importance de la préservation des ressources naturelles. <br> <br>

                    2. Développement de Ressources : La mise à disposition des ressources telles que des semences
                    améliorées, des méthodes de conservation des sols, des techniques d'irrigation efficaces, et des
                    informations sur la gestion durable des pâturages et des forêts. <br> <br>

                    3. Accès aux Marchés : La facilitation à l'accès des agriculteurs et éleveurs aux marchés locaux et
                    régionaux pour la vente de leurs produits, en encourageant la transformation et la valorisation des
                    produits agricoles. <br> <br>

                    4. Infrastructures : La mise en place des infrastructures telles que des systèmes d'irrigation, des
                    silos de stockage, des points d'eau pour le bétail, etc., pour améliorer la productivité et la
                    résilience des systèmes agro-sylvo pastoraux. <br> <br>

                    5. Gestion de l'Environnement :
                    L'encouragement de la mise en œuvre de pratiques agricoles et pastorales qui préservent la
                    biodiversité, préviennent la dégradation des sols, et contribuent à la lutte contre les changements
                    climatiques. <br> <br>

                    6. Accompagnement Technique : L'accompagnement technique continu aux bénéficiaires du programme, en
                    les conseillant sur les défis rencontrés et en ajustant les approches en fonction des besoins
                    spécifiques de chaque communauté. <br> <br>

                    7. Participation Communautaire : L'implication active des communautés locales dans la planification,
                    la mise en œuvre et l'évaluation du programme, en tenant compte de leurs besoins et de leurs
                    connaissances traditionnelles. <br> <br>

                    L'objectif global du PAI-ASP est de renforcer la sécurité alimentaire, d'améliorer les moyens de
                    subsistance des populations rurales, de protéger les écosystèmes et de promouvoir la durabilité des
                    activités agro-sylvo pastorales dans la région ciblée.
                </p>
            </div>
        </div>

        <div class="card mb-3" id="pcc">
            <div class="card-img-top d-flex justify-content-center">
                <img src="{{ asset('dist/img/programmes/pcc_500_500.jpg') }}" class="img-fluid" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">PCC</h5>
                <p class="card-text lead fw-normal">
                    "Citoyen dans la cité" est une initiative locale impliquant les résidents pour améliorer leur
                    communauté. Cela inclut des activités telles que le nettoyage des espaces publics, des
                    sensibilisations sur la sécurité routière, la création de jardins communautaires, des ateliers
                    éducatifs, des programmes de mentorat, ou même la mise en place de systèmes de recyclage. L'objectif
                    serait de renforcer le lien social, de promouvoir la durabilité et d'améliorer la qualité de vie
                    pour tous les habitants de la cité.
                </p>
            </div>
        </div>

        <div class="card mb-3" id="pst">
            <div class="card-img-top d-flex justify-content-center">
                <img src="{{ asset('dist/img/programmes/pst_500_500.jpg') }}" class="img-fluid" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">PST</h5>
                <p class="card-text lead fw-normal">
                    "Santé pour tous" vise à améliorer l'accès aux soins médicaux et à promouvoir la santé des
                    populations, en particulier celles défavorisées ou marginalisées. Il peut inclure des initiatives
                    telles que des campagnes de sensibilisation, des cliniques mobiles, des programmes de vaccination,
                    des formations pour les professionnels de la santé, la mise en place de centres de santé
                    communautaires, et la fourniture de médicaments essentiels à des coûts abordables. L'objectif ultime
                    est de réduire les disparités en matière de santé et d'assurer que tout le monde puisse bénéficier
                    d'un niveau de santé optimal.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection
