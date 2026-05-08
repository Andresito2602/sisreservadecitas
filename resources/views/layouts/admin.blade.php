<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIS Medical — Sistema de Reservas</title>

    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- AdminLTE (solo para datatables y bootstrap compatibility) -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- jQuery -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <!-- FULLCALENDAR -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.js'></script>
    <script src="{{url('fullcalendar/es.global.js')}}"></script>

    <!-- CKEDITOR5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --sidebar-width: 260px;
            --sidebar-bg: #0a1628;
            --sidebar-accent: #1a2f4e;
            --sidebar-active: #1e6fff;
            --sidebar-text: #8fa3bc;
            --sidebar-text-active: #ffffff;
            --topbar-height: 64px;
            --topbar-bg: #ffffff;
            --body-bg: #f0f4f8;
            --card-bg: #ffffff;
            --text-primary: #0d1b2a;
            --text-secondary: #5a7184;
            --border: #e2e8f0;
            --blue: #1e6fff;
            --blue-light: #e8f0fe;
            --green: #10b981;
            --green-light: #d1fae5;
            --amber: #f59e0b;
            --amber-light: #fef3c7;
            --red: #ef4444;
            --red-light: #fee2e2;
            --purple: #8b5cf6;
            --purple-light: #ede9fe;
            --teal: #14b8a6;
            --teal-light: #ccfbf1;
            --indigo: #6366f1;
            --indigo-light: #e0e7ff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--body-bg);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ===== SIDEBAR ===== */
        .sis-sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #1a2f4e transparent;
        }

        .sis-sidebar::-webkit-scrollbar { width: 4px; }
        .sis-sidebar::-webkit-scrollbar-track { background: transparent; }
        .sis-sidebar::-webkit-scrollbar-thumb { background: #1a2f4e; border-radius: 4px; }

        .sidebar-brand {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .sidebar-brand-icon {
            width: 38px; height: 38px;
            background: var(--blue);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .sidebar-brand-icon svg { width: 20px; height: 20px; fill: white; }

        .sidebar-brand-text { line-height: 1.2; }
        .sidebar-brand-text span:first-child {
            display: block;
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.3px;
        }
        .sidebar-brand-text span:last-child {
            display: block;
            font-size: 11px;
            color: var(--sidebar-text);
            font-weight: 400;
        }

        .sidebar-user {
            padding: 16px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-user-avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--blue), #5b9fff);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px;
            font-weight: 600;
            color: white;
            flex-shrink: 0;
        }

        .sidebar-user-info span:first-child {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #ffffff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 160px;
        }

        .sidebar-user-info span:last-child {
            display: block;
            font-size: 11px;
            color: var(--sidebar-text);
            text-transform: capitalize;
        }

        .sidebar-nav { padding: 12px 0; flex: 1; }

        .nav-section-label {
            padding: 12px 24px 6px;
            font-size: 10px;
            font-weight: 600;
            color: #4a6080;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-item-sis { list-style: none; }

        .nav-link-sis {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 24px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }

        .nav-link-sis:hover {
            color: var(--sidebar-text-active);
            background: rgba(255,255,255,0.05);
        }

        .nav-link-sis.active {
            color: var(--sidebar-text-active);
            background: rgba(30,111,255,0.15);
            border-right: 3px solid var(--blue);
        }

        .nav-link-sis .nav-icon {
            width: 18px;
            font-size: 15px;
            flex-shrink: 0;
            text-align: center;
        }

        .nav-link-sis .nav-arrow {
            margin-left: auto;
            font-size: 11px;
            transition: transform 0.2s;
        }

        .nav-link-sis.open .nav-arrow { transform: rotate(90deg); }

        .nav-submenu {
            display: none;
            background: rgba(0,0,0,0.15);
        }

        .nav-submenu.open { display: block; }

        .nav-submenu .nav-link-sis {
            padding: 8px 24px 8px 54px;
            font-size: 13px;
            font-weight: 400;
        }

        .nav-submenu .nav-link-sis::before {
            content: '';
            width: 5px; height: 5px;
            border-radius: 50%;
            background: #3a5a7a;
            flex-shrink: 0;
            margin-right: -4px;
        }

        .nav-submenu .nav-link-sis:hover::before { background: var(--blue); }

        .sidebar-footer {
            padding: 16px 24px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 10px 16px;
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.2);
            border-radius: 8px;
            color: #fc8181;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
        }

        .btn-logout:hover {
            background: rgba(239,68,68,0.2);
            color: #feb2b2;
        }

        /* ===== TOPBAR ===== */
        .sis-topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background: var(--topbar-bg);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 900;
        }

        .topbar-left { display: flex; align-items: center; gap: 16px; }

        .topbar-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .topbar-breadcrumb {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .topbar-right { display: flex; align-items: center; gap: 16px; }

        .topbar-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            background: var(--blue-light);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: var(--blue);
        }

        .topbar-date {
            font-size: 12px;
            color: var(--text-secondary);
        }

        /* ===== MAIN CONTENT ===== */
        .sis-main {
            margin-left: var(--sidebar-width);
            padding-top: var(--topbar-height);
            min-height: 100vh;
        }

        .sis-content {
            padding: 28px;
        }

        /* ===== CARDS ===== */
        .sis-card {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .sis-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sis-card-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .sis-card-body { padding: 24px; }

        /* ===== OVERRIDE ADMINLTE TABLES ===== */
        .content-wrapper { background: transparent !important; }
        .card { border-radius: 12px !important; border: 1px solid var(--border) !important; box-shadow: none !important; }
        .card-header { border-bottom: 1px solid var(--border) !important; background: white !important; }
        .card-title { font-size: 15px !important; font-weight: 600 !important; color: var(--text-primary) !important; }
        .table thead th, .table thead td { background: #f8fafc !important; color: var(--text-secondary) !important; font-size: 12px !important; font-weight: 600 !important; text-transform: uppercase !important; letter-spacing: 0.5px !important; border-bottom: 2px solid var(--border) !important; }
        .table td { font-size: 13.5px !important; color: var(--text-primary) !important; vertical-align: middle !important; }
        .btn-primary { background: var(--blue) !important; border-color: var(--blue) !important; border-radius: 8px !important; font-size: 13px !important; font-weight: 500 !important; }
        .btn-success { background: var(--green) !important; border-color: var(--green) !important; border-radius: 8px !important; font-size: 13px !important; }
        .btn-danger { background: var(--red) !important; border-color: var(--red) !important; border-radius: 8px !important; font-size: 13px !important; }
        .btn-warning { background: var(--amber) !important; border-color: var(--amber) !important; border-radius: 8px !important; font-size: 13px !important; }
        .btn-secondary { border-radius: 8px !important; font-size: 13px !important; }
        .form-control { border-radius: 8px !important; border: 1px solid var(--border) !important; font-size: 13.5px !important; font-family: 'Inter', sans-serif !important; }
        .form-control:focus { border-color: var(--blue) !important; box-shadow: 0 0 0 3px rgba(30,111,255,0.1) !important; }
        .badge { border-radius: 6px !important; font-size: 11px !important; font-weight: 600 !important; }
        .modal-content { border-radius: 14px !important; border: none !important; }
        .modal-header { border-bottom: 1px solid var(--border) !important; padding: 20px 24px !important; }
        .modal-title { font-size: 16px !important; font-weight: 600 !important; }
        .modal-body { padding: 24px !important; }
        .modal-footer { border-top: 1px solid var(--border) !important; padding: 16px 24px !important; }
        .alert { border-radius: 10px !important; border: none !important; font-size: 13.5px !important; }
        label { font-size: 13px !important; font-weight: 500 !important; color: var(--text-secondary) !important; margin-bottom: 6px !important; }
        h3, h4, h5 { font-family: 'Inter', sans-serif !important; }
        .small-box { border-radius: 12px !important; overflow: hidden !important; }
        .small-box .inner h3 { font-size: 28px !important; font-weight: 700 !important; }
        .small-box .inner p { font-size: 13px !important; font-weight: 500 !important; }
        .dataTables_wrapper .dataTables_filter input { border-radius: 8px !important; border: 1px solid var(--border) !important; font-size: 13px !important; padding: 6px 12px !important; }
        .dataTables_wrapper .dataTables_length select { border-radius: 8px !important; border: 1px solid var(--border) !important; font-size: 13px !important; }
        .page-item.active .page-link { background: var(--blue) !important; border-color: var(--blue) !important; }
        .page-link { color: var(--blue) !important; border-radius: 6px !important; font-size: 13px !important; }
        select.form-control { appearance: auto !important; }
    </style>
</head>
<body style="background: var(--body-bg)">
<!-- SIDEBAR -->
<aside class="sis-sidebar">
    @php $config = \App\Models\Configuracione::latest()->first(); @endphp
    <a href="{{url('/admin')}}" class="sidebar-brand">
        <div class="sidebar-brand-icon" style="background:none; padding:0;">
            @if($config && $config->logo)
                <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo" style="width:38px;height:38px;object-fit:cover;border-radius:10px;">
            @else
                <div style="width:38px;height:38px;background:var(--blue);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-plus-circle" style="color:white;font-size:18px;"></i>
                </div>
            @endif
        </div>
        <div class="sidebar-brand-text">
            <span>{{ $config->nombre ?? 'SIS Medical' }}</span>
            <span>Sistema de Reservas</span>
        </div>
    </a>

    <div class="sidebar-user">
        <div class="sidebar-user-avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <div class="sidebar-user-info">
            <span>{{ Auth::user()->name }}</span>
            <span>{{ Auth::user()->roles->pluck('name')->first() ?? 'Usuario' }}</span>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul style="list-style:none; padding:0; margin:0;">

            <li><div class="nav-section-label">Principal</div></li>

            <li class="nav-item-sis">
                <a href="{{url('/admin')}}" class="nav-link-sis {{ request()->is('admin') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-grid-1x2"></i>
                    Dashboard
                </a>
            </li>

            @can('admin.usuarios.index')
            <li class="nav-item-sis">
                <a href="{{url('/admin/configuraciones')}}" class="nav-link-sis {{ request()->is('admin/configuraciones*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-sliders"></i>
                    Configuraciones
                </a>
            </li>
            @endcan

            <li><div class="nav-section-label" style="margin-top:8px">Gestión</div></li>

            @can('admin.usuarios.index')
            <li class="nav-item-sis">
                <button class="nav-link-sis {{ request()->is('admin/usuarios*') ? 'open' : '' }}" onclick="toggleMenu('menu-usuarios')">
                    <i class="nav-icon bi bi-people"></i>
                    Usuarios
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </button>
                <ul class="nav-submenu {{ request()->is('admin/usuarios*') ? 'open' : '' }}" id="menu-usuarios">
                    <li class="nav-item-sis">
                        <a href="{{url('admin/usuarios/create')}}" class="nav-link-sis">Crear usuario</a>
                    </li>
                    <li class="nav-item-sis">
                        <a href="{{url('admin/usuarios')}}" class="nav-link-sis">Listado</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('admin.secretarias.index')
            <li class="nav-item-sis">
                <button class="nav-link-sis {{ request()->is('admin/secretarias*') ? 'open' : '' }}" onclick="toggleMenu('menu-secretarias')">
                    <i class="nav-icon bi bi-person-badge"></i>
                    Secretarias
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </button>
                <ul class="nav-submenu {{ request()->is('admin/secretarias*') ? 'open' : '' }}" id="menu-secretarias">
                    <li class="nav-item-sis">
                        <a href="{{url('admin/secretarias/create')}}" class="nav-link-sis">Crear secretaria</a>
                    </li>
                    <li class="nav-item-sis">
                        <a href="{{url('admin/secretarias')}}" class="nav-link-sis">Listado</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('admin.pacientes.index')
            <li class="nav-item-sis">
                <button class="nav-link-sis {{ request()->is('admin/pacientes*') ? 'open' : '' }}" onclick="toggleMenu('menu-pacientes')">
                    <i class="nav-icon bi bi-person-heart"></i>
                    Pacientes
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </button>
                <ul class="nav-submenu {{ request()->is('admin/pacientes*') ? 'open' : '' }}" id="menu-pacientes">
                    <li class="nav-item-sis">
                        <a href="{{url('admin/pacientes/create')}}" class="nav-link-sis">Registrar paciente</a>
                    </li>
                    <li class="nav-item-sis">
                        <a href="{{url('admin/pacientes')}}" class="nav-link-sis">Listado</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('admin.consultorios.index')
            <li class="nav-item-sis">
                <button class="nav-link-sis {{ request()->is('admin/consultorios*') ? 'open' : '' }}" onclick="toggleMenu('menu-consultorios')">
                    <i class="nav-icon bi bi-hospital"></i>
                    Consultorios
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </button>
                <ul class="nav-submenu {{ request()->is('admin/consultorios*') ? 'open' : '' }}" id="menu-consultorios">
                    <li class="nav-item-sis">
                        <a href="{{url('admin/consultorios/create')}}" class="nav-link-sis">Crear consultorio</a>
                    </li>
                    <li class="nav-item-sis">
                        <a href="{{url('admin/consultorios')}}" class="nav-link-sis">Listado</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('admin.doctores.index')
            <li class="nav-item-sis">
                <button class="nav-link-sis {{ request()->is('admin/doctores*') ? 'open' : '' }}" onclick="toggleMenu('menu-doctores')">
                    <i class="nav-icon bi bi-person-vcard"></i>
                    Doctores
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </button>
                <ul class="nav-submenu {{ request()->is('admin/doctores*') ? 'open' : '' }}" id="menu-doctores">
                    <li class="nav-item-sis">
                        <a href="{{url('admin/doctores/create')}}" class="nav-link-sis">Registrar doctor</a>
                    </li>
                    <li class="nav-item-sis">
                        <a href="{{url('admin/doctores')}}" class="nav-link-sis">Listado</a>
                    </li>
                    <li class="nav-item-sis">
                        <a href="{{url('admin/doctores/reportes')}}" class="nav-link-sis">Reportes</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('admin.horarios.index')
            <li class="nav-item-sis">
                <button class="nav-link-sis {{ request()->is('admin/horarios*') ? 'open' : '' }}" onclick="toggleMenu('menu-horarios')">
                    <i class="nav-icon bi bi-clock-history"></i>
                    Horarios
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </button>
                <ul class="nav-submenu {{ request()->is('admin/horarios*') ? 'open' : '' }}" id="menu-horarios">
                    <li class="nav-item-sis">
                        <a href="{{url('admin/horarios/create')}}" class="nav-link-sis">Crear horario</a>
                    </li>
                    <li class="nav-item-sis">
                        <a href="{{url('admin/horarios')}}" class="nav-link-sis">Listado</a>
                    </li>
                </ul>
            </li>
            @endcan

            <li><div class="nav-section-label" style="margin-top:8px">Clínico</div></li>

            @can('admin.usuarios.index')
            <li class="nav-item-sis">
                <button class="nav-link-sis {{ request()->is('admin/reservas*') ? 'open' : '' }}" onclick="toggleMenu('menu-reservas')">
                    <i class="nav-icon bi bi-calendar2-check"></i>
                    Reservas
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </button>
                <ul class="nav-submenu {{ request()->is('admin/reservas*') ? 'open' : '' }}" id="menu-reservas">
                    <li class="nav-item-sis">
                        <a href="{{url('admin/reservas/reportes')}}" class="nav-link-sis">Reportes</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('admin.historiales.index')
            <li class="nav-item-sis">
                <button class="nav-link-sis {{ request()->is('admin/historial*') ? 'open' : '' }}" onclick="toggleMenu('menu-historial')">
                    <i class="nav-icon bi bi-journal-medical"></i>
                    Historial Clínico
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </button>
                <ul class="nav-submenu {{ request()->is('admin/historial*') ? 'open' : '' }}" id="menu-historial">
                    <li class="nav-item-sis">
                        <a href="{{url('admin/historiales')}}" class="nav-link-sis">Listado</a>
                    </li>
                    <li class="nav-item-sis">
                        <a href="{{url('admin/historial/buscar-paciente')}}" class="nav-link-sis">Buscar paciente</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('admin.pagos.index')
            <li class="nav-item-sis">
                <button class="nav-link-sis {{ request()->is('admin/pagos*') ? 'open' : '' }}" onclick="toggleMenu('menu-pagos')">
                    <i class="nav-icon bi bi-credit-card-2-front"></i>
                    Pagos
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </button>
                <ul class="nav-submenu {{ request()->is('admin/pagos*') ? 'open' : '' }}" id="menu-pagos">
                    <li class="nav-item-sis">
                        <a href="{{url('admin/pagos')}}" class="nav-link-sis">Listado</a>
                    </li>
                </ul>
            </li>
            @endcan

        </ul>
    </nav>

    <div class="sidebar-footer">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
        <a href="#" class="btn-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-left"></i>
            Cerrar sesión
        </a>
    </div>
</aside>

<!-- TOPBAR -->
<header class="sis-topbar">
    <div class="topbar-left">
        <div>
            <div class="topbar-title">Sistema de Gestión Médica</div>
            <div class="topbar-breadcrumb">SIS Medical — Panel de administración</div>
        </div>
    </div>
    <div class="topbar-right">
        <div class="topbar-date" id="topbar-clock"></div>
        <div class="topbar-badge">
            <i class="bi bi-shield-check"></i>
            {{ Auth::user()->roles->pluck('name')->first() ?? 'Usuario' }}
        </div>
    </div>
</header>

<!-- MAIN CONTENT -->
<main class="sis-main">
    <div class="sis-content">

        @if( (($message = Session::get('mensaje')) && ($icono = Session::get('icono'))) )
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: "top-end",
                        icon: "{{$icono}}",
                        title: "{{$message}}",
                        showConfirmButton: false,
                        timer: 4500,
                        toast: true
                    });
                });
            </script>
        @endif

        @yield('content')

    </div>
</main>

<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!--Datatables-->
<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>

<script>
    // Toggle sidebar submenus
    function toggleMenu(id) {
        const menu = document.getElementById(id);
        const btn = menu.previousElementSibling;
        menu.classList.toggle('open');
        btn.classList.toggle('open');
    }

    // Topbar clock
    function updateClock() {
        const now = new Date();
        const options = { weekday: 'short', day: 'numeric', month: 'short', hour: '2-digit', minute: '2-digit' };
        document.getElementById('topbar-clock').textContent = now.toLocaleDateString('es-ES', options);
    }
    updateClock();
    setInterval(updateClock, 60000);
</script>
</body>
</html>
