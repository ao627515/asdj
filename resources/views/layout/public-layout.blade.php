<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    @yield('css')
    <title>ASDJ | @yield('title')</title>
</head>

<body>
    <header class="d-none d-sm-flex flex-wrap justify-content-center py-3 px-5">
        <a href="{{ route('home.index') }}"
            class="d-flex align-items-center mb-3 ms-5 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="{{ asset('dist/img/asdj/asdj_logo_250_250.png') }}" alt="" height="50" width="50">
            <span class="fs-4 ms-3 fw-bold">ASDJ</span>
        </a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ route('home.index') }}" class="nav-link @if(Request::routeIs('home.index')) active @endif">Accueil</a></li>
            <li class="nav-item"><a href="{{ route('blog.index') }}"
                    class="nav-link @if (Request::routeIs('blog.index') or Request::routeIs('blog.show')) active @endif">Blog</a></li>
            <li class="nav-item"><a href="{{ route('home.index') . '#actualités' }}" class="nav-link">Actualités</a>
            </li>
            <li class="nav-item"><a href="{{ route('home.index') . '#partenaires' }}" class="nav-link">Partenaires</a>
            </li>
            <li class="nav-item"><a href="{{ route('home.programmes') }}"
                    class="nav-link @if (Request::routeIs('home.programmes') or Request::routeIs('prbs_candidate.create')) active @endif">Programmes</a>
            </li>
            <li class="nav-item"><a href="{{ route('home.index') . '#contact' }}" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="{{ route('home.about') }}"
                    class="nav-link @if (Request::routeIs('home.about')) active @endif">A Propos</a></li>
            @auth
                <li class="nav-item"><a href="{{ route('prbs_candidate.index') }}" class="nav-link active">Admin</a></li>
            @endauth
        </ul>
    </header>

    <header class="d-block d-sm-none d-flex justify-content-around align-item-center">
        <div class="d-flex align-items-center">
            <i class="fa fa-align-justify fa-3x" aria-hidden="true" id="sidebarBtn"></i>
        </div>
        <a href="{{ route('home.index') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('dist/img/asdj/asdj_logo_250_250.png') }}" alt="" height="75" width="75">
            <span class="fs-4 ms-3 fw-bold" style="color: #4F0904">ASDJ</span>
        </a>
    </header>

    <div class="d-none d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary z-2" id="mySidebar">
        <h2 class="fs-4 text-center">Menu</h2>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('home.index') }}" class="nav-link link-body-emphasis @if (Request::routeIs('home.index')) active @endif"
                    aria-current="page">
                    Accueil
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link link-body-emphasis @if (Request::routeIs('blog.index') or Request::routeIs('blog.show')) active @endif">
                    Blog
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home.index') . '#actualités' }}" class="nav-link link-body-emphasis">
                    Actualités
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home.index') . '#partenaires' }}" class="nav-link link-body-emphasis">
                    Partenaires
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home.programmes') }}" class="nav-link @if (Request::routeIs('home.programmes') or Request::routeIs('prbs_candidate.create')) active @endif link-body-emphasis">
                    Programmes
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home.index') . '#contact' }}" class="nav-link link-body-emphasis">
                    Contact
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home.about') }}"
                    class="nav-link link-body-emphasis @if (Request::routeIs('home.about')) active @endif">
                    A Propos
                </a>
            </li>
            @auth
                <li class="nav-item">
                    <a href="" class="nav-link active">
                        Admin
                    </a>
                </li>
            @endauth
        </ul>
    </div>

    <main class="z-1 mb-5">
        @yield('content')
    </main>

    <footer class="border border-top py-4">
        <div class="container">
            <div class="row x">
                <div class="col-6 col-md-2 mb-3 ">
                    <h5>ASDJ</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ route('home.index') }}" class="nav-link p-0 text-body-secondary">Accueil</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('blog.index') }}" class="nav-link p-0 text-body-secondary">Blog</a>
                        </li>

                        <li class="nav-item mb-2"><a href="{{ route('home.index'). '#actualités' }}"
                                class="nav-link p-0 text-body-secondary">Actualité</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('home.index'). '#partenaires' }}"
                                class="nav-link p-0 text-body-secondary">Partenairess</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('home.programmes') }}"
                                class="nav-link p-0 text-body-secondary">Programmes</a>
                        </li>

                        <li class="nav-item mb-2"><a href="{{ route('home.index'). '#contact' }}"
                                class="nav-link p-0 text-body-secondary">Contact</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('home.about') }}" class="nav-link p-0 text-body-secondary">A
                                Propos</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Liens utiles</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Termes
                                et conditions</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#"
                                class="nav-link p-0 text-body-secondary">Politique
                                de confidentialité</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Nous
                                contacter</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form action="" method="">
                        @csrf
                        <h5>Souscrivez à notre newsletter</h5>
                        <p>Restez informé sur nos dernières actualités et évènements</p>

                        <div class="row g-3">
                            <div class="col-sm-10">
                                <x-form.input name="email" placeholder="Email" type="text" required />
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center">
                                <button type="submit" id="subscribe-button" class="btn btn-primary">
                                    Souscrire
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© 2023 Association pour la Solidarité et le Developpement des Jeunes. ASDJ . All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3">
                        <a class="link-body-emphasis" href="#">
                            <i class="bi bi-twitter" style="font-size: 2rem;"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-body-emphasis" href="#">
                            <i class="bi bi-instagram" style="font-size: 2rem;""></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-body-emphasis" href="#">
                            <i class="bi bi-facebook" style="font-size: 2rem;"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarBtn').addEventListener('click', function() {
            document.getElementById('mySidebar').classList.toggle('active');
            document.getElementById('mySidebar').classList.remove('d-none');
            document.body.style.overflow = 'hidden'; // Empêche le défilement
        });

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('mySidebar');

            if (!event.target.matches('#sidebarBtn') && !event.target.closest('#mySidebar')) {
                sidebar.classList.remove('active');
                sidebar.classList.add('d-none'); // Masquer la sidebar
                document.body.style.overflow = 'auto';
            }

            if (event.target.closest('.nav-link')) {
                sidebar.classList.remove('active');
                sidebar.classList.add('d-none'); // Masquer la sidebar
                document.body.style.overflow = 'auto';
            }
        });
    </script>
    @yield('script')
</body>

</html>
