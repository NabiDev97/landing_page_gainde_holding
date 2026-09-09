<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>GAÏNDE-HOLDING - Modèle de site web gratuit pour entreprise de construction</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Modèles HTML gratuits" name="keywords">
    <meta content="Modèles HTML gratuits" name="description">

    <!-- Favicon -->
    <link href="{{ secure_asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ secure_asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ secure_asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5">
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Notre Bureau</h6>
                        <span>Colobane, Dakar, Sénégal</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Envoyez-nous un email</h6>
                        <span>info@gaindeholding.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Appelez-nous</h6>
                        <span>+221 77 781 95 95</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-5 pe-lg-0">
        <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="m-0 display-4 text-uppercase text-white"><img src="{{ secure_asset('img/logo.png') }}" alt="GAÏNDE-HOLDING" style="height: 70px; margin-right: 15px;">GAÏNDE-HOLDING</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}#home" class="nav-item nav-link">Accueil</a>
                    <a href="{{ route('home') }}#about" class="nav-item nav-link">À propos</a>
                    <a href="{{ route('home') }}#services" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('home') }}#projects" class="dropdown-item">Nos Projets</a>
                            <a href="{{ route('home') }}#team" class="dropdown-item">L'équipe</a>
                            <a href="{{ route('home') }}#testimonials" class="dropdown-item">Témoignages</a>
                            <a href="{{ route('blog.index') }}" class="dropdown-item">Blog</a>
                            <a href="{{ route('detail') }}" class="dropdown-item">Détail du blog</a>
                        </div>
                    </div>
                    <a href="{{ route('home') }}#contact" class="nav-item nav-link">Contact</a>
                    <a href="{{ route('home') }}#quote" class="nav-item nav-link bg-primary text-white px-5 ms-3 d-none d-lg-block">Obtenir un devis <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0" id="home">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ secure_asset('img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <i class="fa fa-home fa-4x text-primary mb-4 d-none d-sm-block"></i>
                            <h1 class="display-2 text-uppercase text-white mb-md-4">Bâtir avec rigueur, livrer avec passion.</h1>
                            <a href="{{ route('quote') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Obtenir un devis</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ secure_asset('img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <i class="fa fa-tools fa-4x text-primary mb-4 d-none d-sm-block"></i>
                            <h1 class="display-2 text-uppercase text-white mb-md-4">Vos projets entre de bonnes mains </h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Contactez-nous</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-6 px-5" id="about">
        <div class="row g-5">
            <div class="col-lg-7">
                @if(!empty($pageSections['about']))
                    {!! $pageSections['about'] !!}
                @else
                <h1 class="display-5 text-uppercase mb-4">Nous sommes <span class="text-primary">les Leaders</span> dans l'Industrie de la Construction</h1>
                <h4 class="text-uppercase mb-3 text-body">Avec une expertise reconnue et une passion pour l'excellence, nous bâtissons l'avenir de vos projets.</h4>
                <p>Chez GAÏNDE-HOLDING, nous nous engageons à offrir des services de construction de haute qualité, en respectant les délais et les budgets. Notre équipe d'experts travaille avec intégrité et dévouement pour réaliser vos rêves architecturaux, en utilisant les meilleures pratiques et matériaux durables.</p>
                <div class="row gx-5 py-2">
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Planification parfaite</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Ouvriers professionnels</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Processus de travail de première classe</p>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Respect des délais</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Matériaux de qualité</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Garantie de satisfaction</p>
                    </div>
                </div>
                <p class="mb-4">Faites confiance à GAÏNDE-HOLDING pour transformer votre vision en une réalité exceptionnelle. Contactez-nous dès aujourd'hui pour discuter de votre prochain projet.</p>
                <img src="img/signature.jpg" alt="">
                @endif
            </div>
            <div class="col-lg-5 pb-5" style="min-height: 400px;">
                <div class="position-relative bg-dark-radial h-100 ms-5">
                    <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="{{ secure_asset('img/about.jpg') }}" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    

    <!-- Services Start -->
    <div class="container-fluid bg-light py-6 px-5" id="services">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            @if(!empty($pageSections['services']))
                {!! $pageSections['services'] !!}
            @else
                <h1 class="display-5 text-uppercase mb-4">Nous Fournissons <span class="text-primary">Les Meilleurs</span> Services de Construction</h1>
            @endif
        </div>
        <div class="row g-5">
                @if($services->count())
                    @foreach($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-white d-flex flex-column align-items-center text-center">
                            @php
                                $imgSrc = null;
                            @endphp
                            @if(!empty($service->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($service->image))
                                @php $imgSrc = secure_asset('storage/'.$service->image); @endphp
                            @elseif(!empty($service->image) && file_exists(public_path('img/'.$service->image)))
                                @php $imgSrc = secure_asset('img/'.$service->image); @endphp
                            @else
                                @php $imgSrc = secure_asset('img/service-1.jpg'); @endphp
                            @endif
                            <img class="img-fluid" src="{{ $imgSrc }}" alt="">
                            <div class="service-icon bg-white">
                                <i class="fa fa-3x fa-building text-primary"></i>
                            </div>
                            <div class="px-4 pb-4">
                                <h4 class="text-uppercase mb-3">{{ $service->title ?? $service->name }}</h4>
                                    <p>{{ $service->description }}</p>
                                <a class="btn text-primary" href="">En savoir plus <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- fall back to static blocks -->
                @endif
        </div>
    </div>
    <!-- Services End -->


    <!-- Appointment Start -->
    <div class="container-fluid py-6 px-5" id="quote">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                @if(!empty($pageSections['quote']))
                    {!! $pageSections['quote'] !!}
                @else
                <div class="mb-4">
                    <h1 class="display-5 text-uppercase mb-4">Demander un <span class="text-primary">Rappel</span></h1>
                </div>
                <p class="mb-5">Vous avez un projet en tête ? Laissez-nous vous contacter pour discuter de vos besoins et vous offrir une consultation gratuite. Notre équipe est prête à vous accompagner dans la réalisation de vos rêves de construction.</p>
                <a class="btn btn-primary py-3 px-5" href="">Obtenir un devis</a>
                @endif
            </div>
            <div class="col-lg-8">
                <div class="bg-light text-center p-5">
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Votre nom" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Votre email" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text"
                                        class="form-control border-0 datetimepicker-input"
                                        placeholder="Date de rappel" data-target="#date" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text"
                                        class="form-control border-0 datetimepicker-input"
                                        placeholder="Heure de rappel" data-target="#time" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Soumettre la demande</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Portfolio Start -->
    <div class="container-fluid bg-light py-6 px-5" id="projects">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            @if(!empty($pageSections['projects']))
                {!! $pageSections['projects'] !!}
            @else
                <h1 class="display-5 text-uppercase mb-4">Quelques-uns de nos <span class="text-primary">Projets de Rêve</span> Populaires</h1>
            @endif
        </div>
        <div class="row gx-5">
            <div class="col-12 text-center">
                <div class="d-inline-block bg-dark-radial text-center pt-4 px-5 mb-5">
                    <ul class="list-inline mb-0" id="portfolio-flters">
                        <li class="btn btn-outline-primary bg-white p-2 active mx-2 mb-4" data-filter="*">
                            <img src="img/portfolio-1.jpg" style="width: 150px; height: 100px;">
                            <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                                <h6 class="text-white text-uppercase m-0">Tous</h6>
                            </div>
                        </li>
                        <li class="btn btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".first">
                            <img src="img/portfolio-2.jpg" style="width: 150px; height: 100px;">
                            <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                                <h6 class="text-white text-uppercase m-0">Construction</h6>
                            </div>
                        </li>
                        <li class="btn btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".second">
                            <img src="img/portfolio-3.jpg" style="width: 150px; height: 100px;">
                            <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                                <h6 class="text-white text-uppercase m-0">Rénovation</h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row g-5 portfolio-container">
            @if($projects->count())
                @foreach($projects as $project)
                <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item">
                    <div class="position-relative portfolio-box">
                        @php
                            $pImg = null;
                        @endphp
                        @if(!empty($project->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($project->image))
                            @php $pImg = secure_asset('storage/'.$project->image); @endphp
                        @elseif(!empty($project->image) && file_exists(public_path('img/'.$project->image)))
                            @php $pImg = secure_asset('img/'.$project->image); @endphp
                        @else
                            @php $pImg = secure_asset('img/portfolio-1.jpg'); @endphp
                        @endif
                        <img class="img-fluid w-100" src="{{ $pImg }}" alt="">
                        <a class="portfolio-title shadow-sm" href="{{ route('projects.show', $project) }}">
                            <p class="h4 text-uppercase">{{ $project->title }}</p>
                            <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $project->location ?? 'Lieu, Ville, Pays' }}</span>
                        </a>
                        <a class="portfolio-btn" href="{{ $pImg }}" data-lightbox="portfolio">
                            <i class="bi bi-plus text-white"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <!-- fallback static items -->
            @endif
        </div>
    </div>
    <!-- Portfolio End -->


    <!-- Team Start -->
    <div class="container-fluid py-6 px-5" id="team">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            @if(!empty($pageSections['team']))
                {!! $pageSections['team'] !!}
            @else
                <h1 class="display-5 text-uppercase mb-4">Nous sommes des <span class="text-primary">Ouvriers Professionnels et Experts</span></h1>
            @endif
        </div>
        <div class="row g-5">
            @if($members->count())
                @foreach($members as $member)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-10" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                    @php
                                        $mImg = null;
                                    @endphp
                                    @if(!empty($member->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($member->image))
                                        @php $mImg = secure_asset('storage/'.$member->image); @endphp
                                    @elseif(!empty($member->image) && file_exists(public_path('img/'.$member->image)))
                                        @php $mImg = secure_asset('img/'.$member->image); @endphp
                                    @elseif(!empty($member->photo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($member->photo))
                                        @php $mImg = secure_asset('storage/'.$member->photo); @endphp
                                    @elseif(!empty($member->photo) && file_exists(public_path('img/'.$member->photo)))
                                        @php $mImg = secure_asset('img/'.$member->photo); @endphp
                                    @else
                                        @php $mImg = secure_asset('img/team-1.jpg'); @endphp
                                    @endif
                                    <img class="position-absolute w-100 h-100" src="{{ $mImg }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="h-100 d-flex flex-column align-items-center justify-content-between bg-light">
                                <a class="btn" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn" href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light p-4">
                                <h4 class="text-uppercase">{{ $member->name }}</h4>
                                <span>{{ $member->title ?? $member->role }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- fallback static team member -->
            @endif
        </div>
    </div>
    <!-- Team End -->
    
    <!-- Testimonials Start -->
    <div class="container-fluid py-6 px-5" id="testimonials">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Témoignages</h1>
        </div>
        <div class="row g-4">
            @if($testimonials->count())
                @foreach($testimonials as $t)
                <div class="col-md-4">
                    <div class="testimonial-item bg-white p-4">
                        <div class="d-flex align-items-center mb-3">
                            @php
                                $tmImg = null;
                            @endphp
                            @if(!empty($t->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($t->image))
                                @php $tmImg = secure_asset('storage/'.$t->image); @endphp
                            @elseif(!empty($t->image) && file_exists(public_path('img/'.$t->image)))
                                @php $tmImg = secure_asset('img/'.$t->image); @endphp
                            @elseif(!empty($t->photo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($t->photo))
                                @php $tmImg = secure_asset('storage/'.$t->photo); @endphp
                            @elseif(!empty($t->photo) && file_exists(public_path('img/'.$t->photo)))
                                @php $tmImg = secure_asset('img/'.$t->photo); @endphp
                            @else
                                @php $tmImg = secure_asset('img/testimonial.jpg'); @endphp
                            @endif
                            <img src="{{ $tmImg }}" class="rounded-circle me-3" width="60" height="60" alt="">
                            <div>
                                <h5 class="mb-0">{{ $t->name }}</h5>
                                <small class="text-muted">{{ $t->role }}</small>
                            </div>
                        </div>
                        <p>{{ $t->content ?? $t->message }}</p>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- Testimonials End -->
    

    <!-- Footer Start -->
    <div class="footer container-fluid position-relative bg-dark bg-light-radial text-white-50 py-6 px-5">
        <div class="row g-5">
            <div class="col-lg-6 pe-lg-5">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <h1 class="m-0 display-4 text-uppercase text-white"><img src="img/logo.png" alt="GAÏNDE-HOLDING" style="height: 70px; margin-right: 15px;">GAÏNDE-HOLDING</h1>
                </a>
                <p>Nous accompagnons les entreprises et les projets à forte ambition dans la création de solutions durables, performantes et pensées pour un avenir plus responsable.</p>
                <p><i class="fa fa-map-marker-alt me-2"></i>Colobane, Dakar, Sénégal</p>
                <p><i class="fa fa-phone-alt me-2"></i>+221 77 781 95 95</p>
                <p><i class="fa fa-envelope me-2"></i>contact@gaindeholding.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="https://x.com/gaindeholding" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="https://www.facebook.com/gaindeholding" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="https://www.linkedin.com/in/ga%C3%AFnd%C3%A9-holding-4a633b322/" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-0" href="https://www.youtube.com/@gaindeholding" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="row g-5">
                    <div class="col-sm-6">
                        <h4 class="text-white text-uppercase mb-4">Liens rapides</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Accueil</a>
                            <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>À propos de nous</a>
                            <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Nos services</a>
                            <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Rencontrez l'équipe</a>
                            <a class="text-white-50" href="#"><i class="fa fa-angle-right me-2"></i>Contactez-nous</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="text-white text-uppercase mb-4">Liens populaires</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Accueil</a>
                            <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>À propos de nous</a>
                            <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Nos services</a>
                            <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Rencontrez l'équipe</a>
                            <a class="text-white-50" href="#"><i class="fa fa-angle-right me-2"></i>Contactez-nous</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h4 class="text-white text-uppercase mb-4">Newsletter</h4>
                        <div class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control border-light" style="padding: 20px 30px;" placeholder="Votre adresse email"><button class="btn btn-primary px-4">S'inscrire</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark bg-light-radial text-white border-top border-primary px-0">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="py-4 px-5 text-center text-md-start">
                <p class="mb-0">&copy; <a class="text-primary" href="{{ route('home') }}">GAÏNDE-HOLDING</a>. Tous droits réservés.</p>
            </div>
            <div class="py-4 px-5 bg-primary footer-shape position-relative text-center text-md-end">
                <p class="mb-0">Designed by <a class="text-dark" href="{{ route('home') }}">NabiDev 221</a></p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
