<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sistema de reserva de citas medicas</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

    <!-- =======================================================
    * Template Name: Medilab
    * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    * Updated: Aug 07 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="index-page">

<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contacto@sismedical.com">contacto@sismedical.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+591 2 2345678</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">SIS MEDICAL</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Inicio<br></a></li>
                    <li><a href="#about">Nosotros</a></li>
                    <li><a href="#services">Servicios</a></li>
                    <li><a href="#departments">Especialidades</a></li>
                    <li><a href="#doctors">Médicos</a></li>
                    <li><a href="#contact">Contacto</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="cta-btn d-none d-sm-block" href="{{url('login')}}">Ingresar</a>

        </div>

    </div>

</header>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

        <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

        <div class="container position-relative">

            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                <h2>Bienvenido</h2>
                <p>Al centro de atención medica a tu alcance</p>
            </div><!-- End Welcome -->

            <div class="content row gy-4">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                        <h3>Reserva tu cita medica</h3>
                        <div class="text-center">
                            <a href="{{url('/admin')}}" class="more-btn"><span>Reservar ahora</span> <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Why Box -->

                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="row gy-4">

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                    <i class="bi bi-clipboard-data"></i>
                                    <h4>Atención Médica Personalizada</h4>
                                    <p>Brindamos atención integral adaptada a las necesidades de cada paciente, con profesionales altamente capacitados.</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                                    <i class="bi bi-gem"></i>
                                    <h4>Tecnología de Vanguardia</h4>
                                    <p>Contamos con equipos médicos de última generación para diagnósticos precisos y tratamientos efectivos.</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                                    <i class="bi bi-inboxes"></i>
                                    <h4>Horarios Flexibles</h4>
                                    <p>Ofrecemos turnos en horario extendido para que puedas acceder a tu cita médica cuando más lo necesites.</p>
                                </div>
                            </div><!-- End Icon Box -->

                        </div>
                    </div>
                </div>
            </div><!-- End  Content-->

        </div>

    </section><!-- /Hero Section -->

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <dv class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de atención de doctores</h3>
                            </div>
                            <div class="col-md-4">
                                <div style="float: right">
                                    <label for="">Consultorios</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="consultorio_id" id="consultorio_select" class="form-control">
                                    <option value="">Seleccionar consultorio</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </dv>
                    <div class="card-body">
                        <script>
                            $('#consultorio_select').on('change',function () {
                                var consultorio_id = $('#consultorio_select').val();
                                //alert(consultorio_id);
                                var url = "{{route('cargar_datos_consultorios',':id')}}";
                                url = url.replace(':id',consultorio_id);

                                if (consultorio_id) {
                                    $.ajax({
                                        url: url,
                                        type: 'GET',
                                        success: function (data) {
                                            $('#consultorio_info').html(data);
                                        },
                                        error: function () {
                                            alert('Error al obtener los datos del consultorio');
                                        }
                                    });
                                }else{
                                    $('#consultorio_info').html('');
                                }
                            });
                        </script>
                        <hr>
                        <div id="consultorio_info">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4 gx-5">

                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                    <img src="assets/img/about.jpg" class="img-fluid" alt="Equipo médico de SIS Medical">
                </div>

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <h3>Quiénes Somos</h3>
                    <p>
                        SIS Medical es un centro de salud comprometido con el bienestar de nuestros pacientes. Desde nuestra fundación, hemos trabajado para ofrecer servicios médicos de calidad, con un equipo humano dedicado y tecnología de primer nivel.
                    </p>
                    <ul>
                        <li>
                            <i class="fa-solid fa-vial-circle-check"></i>
                            <div>
                                <h5>Equipo médico certificado y con experiencia</h5>
                                <p>Todos nuestros profesionales cuentan con certificaciones vigentes y formación continua en sus especialidades.</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-pump-medical"></i>
                            <div>
                                <h5>Infraestructura moderna y equipada</h5>
                                <p>Nuestras instalaciones están diseñadas para brindar comodidad, higiene y seguridad en cada visita.</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-heart-circle-xmark"></i>
                            <div>
                                <h5>Compromiso con la salud preventiva</h5>
                                <p>Promovemos la medicina preventiva como pilar fundamental para una vida saludable y plena.</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fa-solid fa-user-doctor"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Médicos Especialistas</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fa-regular fa-hospital"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Especialidades</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fas fa-flask"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Laboratorios</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fas fa-award"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="5000" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Pacientes Atendidos</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Servicios</h2>
            <p>Ofrecemos una amplia gama de servicios médicos para cuidar tu salud en cada etapa de la vida.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Medicina General</h3>
                        </a>
                        <p>Consultas médicas integrales para el diagnóstico y tratamiento de enfermedades comunes, con seguimiento personalizado de cada paciente.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-pills"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Farmacología Clínica</h3>
                        </a>
                        <p>Asesoramiento especializado en el uso correcto de medicamentos, control de tratamientos y prevención de interacciones farmacológicas.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-hospital-user"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Atención Hospitalaria</h3>
                        </a>
                        <p>Servicio de hospitalización con monitoreo continuo, atención de enfermería las 24 horas y acompañamiento médico permanente.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-dna"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Genética y Diagnóstico</h3>
                        </a>
                        <p>Estudios genéticos y análisis clínicos avanzados para la detección temprana de enfermedades hereditarias y crónicas.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-wheelchair"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Rehabilitación Física</h3>
                        </a>
                        <p>Programas de fisioterapia y rehabilitación diseñados para recuperar la movilidad y mejorar la calidad de vida del paciente.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-notes-medical"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Historial Clínico Digital</h3>
                        </a>
                        <p>Gestión segura y eficiente del historial médico de cada paciente, accesible para los profesionales autorizados en todo momento.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Departments Section -->
    <section id="departments" class="departments section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Nuestras Especialidades</h2>
            <p>Contamos con especialidades médicas de alto nivel para atender todas tus necesidades de salud.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1">Cardiología</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Neurología</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">Gastroenterología</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Pediatría</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-5">Oftalmología</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="departments-tab-1">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Cardiología</h3>
                                    <p class="fst-italic">Cuidamos la salud de tu corazón con diagnósticos precisos y tratamientos modernos.</p>
                                    <p>Nuestra unidad de cardiología ofrece electrocardiogramas, ecocardiogramas y seguimiento de enfermedades cardiovasculares. Contamos con cardiólogos certificados y equipos de última generación para garantizar el mejor diagnóstico y tratamiento.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="departments-tab-2">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Neurología</h3>
                                    <p class="fst-italic">Especialistas en el diagnóstico y tratamiento de enfermedades del sistema nervioso.</p>
                                    <p>Atendemos patologías como migraña, epilepsia, Parkinson y esclerosis múltiple. Nuestro equipo neurológico trabaja con tecnología avanzada de imagen y electrodiagnóstico para ofrecer tratamientos efectivos y personalizados.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="departments-tab-3">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Gastroenterología</h3>
                                    <p class="fst-italic">Diagnóstico y tratamiento integral de enfermedades del sistema digestivo.</p>
                                    <p>Realizamos endoscopías, colonoscopías y tratamientos para enfermedades del hígado, estómago e intestino. Nuestros especialistas brindan atención oportuna para mejorar tu calidad de vida digestiva.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="departments-tab-4">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Pediatría</h3>
                                    <p class="fst-italic">Atención médica especializada para el cuidado integral de niños y adolescentes.</p>
                                    <p>Ofrecemos controles de crecimiento, vacunación, diagnóstico y tratamiento de enfermedades infantiles. Nuestros pediatras están comprometidos con el desarrollo saludable de cada niño desde su nacimiento hasta la adolescencia.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="departments-tab-5">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Oftalmología</h3>
                                    <p class="fst-italic">Cuidamos tu visión con tecnología de punta y profesionales altamente especializados.</p>
                                    <p>Realizamos exámenes visuales completos, tratamiento de glaucoma, cataratas y cirugías refractivas. Nuestro servicio de oftalmología garantiza diagnósticos precisos para preservar y mejorar tu salud visual.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Departments Section -->

    <!-- Doctors Section -->
    <section id="doctors" class="doctors section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Nuestro Equipo Médico</h2>
            <p>Profesionales comprometidos con tu salud y bienestar, con años de experiencia y formación especializada.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Dr. Carlos Mendoza</h4>
                            <span>Director Médico - Medicina Interna</span>
                            <p>Especialista en medicina interna con más de 15 años de experiencia clínica.</p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""> <i class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Dra. Ana Rodríguez</h4>
                            <span>Cardióloga Intervencionista</span>
                            <p>Experta en diagnóstico y tratamiento de enfermedades cardiovasculares complejas.</p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""> <i class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="assets/img/doctors/doctors-3.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Dr. Roberto Vargas</h4>
                            <span>Neurólogo Clínico</span>
                            <p>Especializado en el tratamiento de enfermedades neurológicas y trastornos del movimiento.</p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""> <i class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="assets/img/doctors/doctors-4.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Dra. Laura Jiménez</h4>
                            <span>Pediatra y Neonatóloga</span>
                            <p>Dedicada al cuidado integral de recién nacidos y niños en todas sus etapas de desarrollo.</p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""> <i class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

            </div>

        </div>

    </section><!-- /Doctors Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Preguntas Frecuentes</h2>
            <p>Resolvemos tus dudas más comunes sobre nuestros servicios y atención médica.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>¿Cómo puedo reservar una cita médica?</h3>
                            <div class="faq-content">
                                <p>Puedes reservar tu cita directamente desde nuestra plataforma en línea haciendo clic en "Ingresar". Una vez registrado, selecciona el consultorio, el médico de tu preferencia y el horario disponible.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>¿Qué documentos necesito para mi primera consulta?</h3>
                            <div class="faq-content">
                                <p>Para tu primera consulta debes presentar tu documento de identidad, número de seguro médico si corresponde, y cualquier estudio o análisis previo relacionado con tu motivo de consulta.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>¿Cuáles son los horarios de atención?</h3>
                            <div class="faq-content">
                                <p>Atendemos de lunes a viernes de 08:00 a 20:00 horas y sábados de 08:00 a 13:00 horas. Algunos especialistas tienen disponibilidad en horarios extendidos según la demanda.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>¿Puedo cancelar o reprogramar mi cita?</h3>
                            <div class="faq-content">
                                <p>Sí, puedes cancelar o reprogramar tu cita con al menos 24 horas de anticipación desde la plataforma o comunicándote con nuestra secretaría. Te pedimos puntualidad para respetar los turnos de los demás pacientes.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>¿Aceptan seguros médicos?</h3>
                            <div class="faq-content">
                                <p>Trabajamos con los principales seguros médicos del país. Te recomendamos consultar con tu aseguradora la cobertura disponible antes de tu cita. También ofrecemos planes de pago para pacientes particulares.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>¿Cómo accedo a mi historial médico?</h3>
                            <div class="faq-content">
                                <p>Tu historial médico está disponible de forma segura en nuestra plataforma. El médico tratante puede consultarlo en cada visita para brindarte una atención continua y personalizada.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

    </section><!-- /Faq Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                    <h3>Lo que dicen nuestros pacientes</h3>
                    <p>
                        La satisfacción de nuestros pacientes es nuestro mayor reconocimiento. Conoce las experiencias de quienes ya confían en SIS Medical para cuidar su salud.
                    </p>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                            {
                              "loop": true,
                              "speed": 600,
                              "autoplay": {
                                "delay": 5000
                              },
                              "slidesPerView": "auto",
                              "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                              }
                            }
                        </script>
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Saul Goodman</h3>
                                            <h4>Paciente - Cardiología</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Excelente atención desde el primer momento. El Dr. Mendoza me explicó todo con claridad y el seguimiento post-consulta fue impecable. Me siento en muy buenas manos.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Sara Wilsson</h3>
                                            <h4>Paciente - Pediatría</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>La Dra. Jiménez es increíble con los niños. Mi hijo siempre sale contento de la consulta. El personal de recepción también es muy amable y eficiente.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Jena Karlis</h3>
                                            <h4>Paciente - Neurología</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Llevaba meses con dolores de cabeza sin diagnóstico. En SIS Medical encontraron la causa rápidamente y el tratamiento funcionó. Muy agradecida con todo el equipo médico.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Matt Brandon</h3>
                                            <h4>Paciente - Medicina General</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>El sistema de reserva en línea es muy práctico. Pude sacar mi cita en minutos y el médico fue muy profesional y atento. Sin duda volvería y lo recomendaría.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>John Larson</h3>
                                            <h4>Paciente - Rehabilitación</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>El programa de rehabilitación física me ayudó a recuperarme mucho más rápido de lo esperado. Los fisioterapeutas son muy dedicados y el ambiente es muy agradable.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Nuestras Instalaciones</h2>
            <p>Conoce los espacios modernos y confortables que hemos preparado para brindarte la mejor atención.</p>
        </div><!-- End Section Title -->

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-1.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-2.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-3.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-4.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-5.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-6.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-7.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-8.jpg" class="glightbox" data-gallery="images-gallery">
                            <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

            </div>

        </div>

    </section><!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contacto</h2>
            <p>Estamos aquí para atenderte. Comunícate con nosotros o visítanos en nuestras instalaciones.</p>
        </div><!-- End Section Title -->

        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Ubicación</h3>
                            <p>Av. Arce 2631, La Paz, Bolivia</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Llámanos</h3>
                            <p>+591 2 2345678</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Escríbenos</h3>
                            <p>contacto@sismedical.com</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Tu nombre completo" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Tu correo electrónico" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Asunto" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Mensaje" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Enviando...</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Tu mensaje ha sido enviado. ¡Gracias!</div>

                                <button type="submit">Enviar Mensaje</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>

<footer id="footer" class="footer light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">SIS Medical</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>Av. Arce 2631, La Paz, Bolivia</p>
                    <p class="mt-3"><strong>Teléfono:</strong> <span>+591 2 2345678</span></p>
                    <p><strong>Email:</strong> <span>contacto@sismedical.com</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Enlaces Rápidos</h4>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Quiénes Somos</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Términos de servicio</a></li>
                    <li><a href="#">Política de privacidad</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Nuestros Servicios</h4>
                <ul>
                    <li><a href="#">Medicina General</a></li>
                    <li><a href="#">Cardiología</a></li>
                    <li><a href="#">Neurología</a></li>
                    <li><a href="#">Pediatría</a></li>
                    <li><a href="#">Rehabilitación</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Especialidades</h4>
                <ul>
                    <li><a href="#">Gastroenterología</a></li>
                    <li><a href="#">Oftalmología</a></li>
                    <li><a href="#">Genética Clínica</a></li>
                    <li><a href="#">Farmacología</a></li>
                    <li><a href="#">Hospitalización</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Información</h4>
                <ul>
                    <li><a href="#">Reserva tu cita</a></li>
                    <li><a href="#">Historial clínico</a></li>
                    <li><a href="#">Seguros médicos</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">Preguntas frecuentes</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">SIS Medical</strong> <span>Todos los derechos reservados</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
