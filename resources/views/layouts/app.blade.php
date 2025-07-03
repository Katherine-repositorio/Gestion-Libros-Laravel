<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Libros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #f0f4ff);
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden; /* Evitar scroll horizontal */
        }

        /* Animación del degradado (mantenemos la tuya) */
        @keyframes gradientNavbar {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* --- Overlay del Sidebar --- */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Más oscuro para mejor contraste */
            z-index: 1040;
            display: none;
            transition: opacity 0.3s ease;
            opacity: 0;
        }
        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        /* --- Sidebar (Menú Lateral) --- */
        .sidebar {
            position: fixed;
            top: 0;
            left: -300px; /* Ancho ajustado para más espacio */
            width: 300px;
            height: 100%;
            background: linear-gradient(-45deg, #2193b0, #6dd5ed, #005bea, #00c6fb);
            background-size: 400% 400%;
            animation: gradientNavbar 15s ease infinite;
            color: #fff;
            transition: left 0.3s ease;
            z-index: 1050;
            box-shadow: 3px 0 15px rgba(0,0,0,0.4); /* Sombra más pronunciada */
            display: flex;
            flex-direction: column;
        }
        .sidebar.active {
            left: 0;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px; /* Más padding */
            border-bottom: 1px solid rgba(255, 255, 255, 0.3); /* Borde más visible */
        }
        .sidebar-header h3 {
            margin: 0;
            color: #fff;
            font-weight: 700; /* Más negrita */
            font-size: 1.5rem; /* Título más grande */
        }
        .sidebar-header .close-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 36px; /* Más grande para el cierre */
            cursor: pointer;
            padding: 0 10px;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }
        .sidebar-header .close-btn:hover {
            opacity: 1;
            transform: rotate(90deg); /* Pequeña rotación al pasar el ratón */
        }

        .sidebar-nav {
            flex-grow: 1;
            padding-top: 15px;
        }
        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-nav ul li a {
            display: block;
            padding: 18px 25px; /* Más padding para los elementos del menú */
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            transition: background-color 0.2s ease, color 0.2s ease, padding-left 0.2s ease;
        }
        .sidebar-nav ul li:last-child a {
            border-bottom: none; /* Elimina el borde inferior del último elemento */
        }
        .sidebar-nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.25);
            color: #fff; /* Que no cambie de blanco al hacer hover */
            padding-left: 30px; /* Efecto de "deslizamiento" al hacer hover */
        }
        .sidebar-nav ul li a.active { /* Para resaltar el link activo */
            background-color: rgba(255, 255, 255, 0.35);
            font-weight: 700;
        }

        /* --- Barra Superior (Navbar Header) --- */
        .navbar-header-top {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px; /* Más alto */
            background-color: #f8f8f8;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            padding: 0 20px; /* Más padding lateral */
            z-index: 1030;
        }

        .menu-btn {
            background: none;
            border: none;
            font-size: 34px; /* Más grande */
            cursor: pointer;
            margin-right: 20px;
            color: #333;
            line-height: 1;
            padding: 0;
            transition: color 0.2s ease;
        }
        .menu-btn:hover {
            color: #007bff; /* Color al hacer hover */
        }

        /* --- Barra de Búsqueda Integrada --- */
        .search-bar-container-top {
            flex-grow: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            max-width: 600px; /* Ancho máximo para la barra de búsqueda */
            margin-left: auto;
        }
        .search-form-top {
            display: flex;
            width: 100%;
            border: 1px solid #cceeff; /* Borde más suave */
            border-radius: 30px; /* Más redondeado */
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08); /* Sombra suave */
        }
        .search-input-top {
            flex-grow: 1;
            border: none;
            padding: 12px 20px; /* Más padding */
            font-size: 17px; /* Fuente más grande */
            outline: none;
            background: transparent;
        }
        .search-input-top::placeholder {
            color: #999;
        }
        .search-button-top {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 12px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s ease;
        }
        .search-button-top:hover {
            background-color: #0056b3;
        }
        .search-icon {
            width: 22px; /* Icono más grande */
            height: 22px;
        }

        /* --- Contenido Principal --- */
        .content {
            flex-grow: 1;
            padding-top: 70px; /* Ajuste para el nuevo alto del navbar-header-top */
            width: 100%;
        }
        .container {
            margin-top: 25px; /* Más espacio entre el navbar y el contenido */
        }

        /* --- Footer --- */
        footer {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            text-align: center;
            padding: 1.2rem; /* Más padding */
            font-size: 0.95rem;
            color: #555;
            box-shadow: 0 -3px 8px rgba(0,0,0,0.08); /* Sombra más notable */
            margin-top: auto;
        }

        /* --- Tus estilos originales para tarjetas y botones (mantenidos) --- */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-4px);
        }
        .btn-primary {
            background: linear-gradient(to right, #1e90ff, #00bfff);
            border: none;
            font-weight: 500;
        }
        .btn-info {
            background: linear-gradient(to right, #17a2b8, #63cdda);
            border: none;
            font-weight: 500;
        }
        .btn-danger {
            background: linear-gradient(to right, #dc3545, #ff6b6b);
            border: none;
            font-weight: 500;
        }
        .alert {
            font-size: 0.95rem;
            padding: 12px 20px;
            border-radius: 8px;
        }


        /* --- Responsividad --- */
        @media (max-width: 768px) {
            /* Ajustes para pantallas más pequeñas (móviles) */
            .sidebar {
                width: 250px; /* Un poco más estrecho en móviles */
                left: -250px;
            }
            .sidebar.active {
                left: 0;
            }
            .sidebar-header {
                padding: 15px;
            }
            .sidebar-header h3 {
                font-size: 1.3rem;
            }
            .sidebar-header .close-btn {
                font-size: 30px;
            }
            .sidebar-nav ul li a {
                padding: 15px 20px;
            }

            .navbar-header-top {
                height: 60px; /* Un poco más bajo en móviles */
                padding: 0 15px;
            }
            .menu-btn {
                font-size: 28px;
                margin-right: 15px;
            }
            .search-bar-container-top {
                max-width: calc(100% - 60px); /* Ajusta el ancho para dejar espacio al botón de menú */
                margin-right: 0;
            }
            .search-input-top {
                font-size: 14px;
                padding: 8px 15px;
            }
            .search-button-top {
                padding: 8px 15px;
            }
            .search-icon {
                width: 18px;
                height: 18px;
            }
            .content {
                padding-top: 60px; /* Ajuste para el navbar más bajo */
            }
            .container {
                margin-top: 15px; /* Más pequeño en móviles */
            }
        }
    </style>
</head>
<body>

    <div id="app-wrapper">
        <div id="sidebar-overlay" class="sidebar-overlay"></div>

        <aside id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h3>📚 Biblioteca Digital</h3>
                <button id="close-sidebar" class="close-btn">&times;</button>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="{{ route('books.index') }}" class="{{ Request::routeIs('books.index') ? 'active' : '' }}">🏠 Inicio</a></li>
                    <li><a href="{{ route('books.index') }}" class="{{ Request::routeIs('books.index') && !request()->has('query') ? 'active' : '' }}">📄 Listado de Libros</a></li>
                    <li><a href="{{ route('books.create') }}" class="{{ Request::routeIs('books.create') ? 'active' : '' }}">✍️ Crear Libro</a></li>
                    {{-- <li><a href="{{ route('categories.index') }}">📚 Categorías</a></li> --}}
                    {{-- <li><a href="{{ route('authors.index') }}">👤 Autores</a></li> --}}
                    <li><a href="{{ route('recomendaciones.index') }}" class="{{ Request::routeIs('books.recomendaciones') ? 'active' : '' }}">📌 Recomendaciones</a></li>

                </ul>
            </nav>
        </aside>

        <main class="content">
            <header class="navbar-header-top">
                <button id="open-sidebar" class="menu-btn" aria-label="Abrir menú">&#9776;</button>
                <div class="search-bar-container-top">
                    <form action="{{ route('search.books') }}" method="GET" class="search-form-top">
                        <input type="text" name="query" placeholder="Buscar libros, autores..." value="{{ request('query') }}" class="search-input-top" aria-label="Campo de búsqueda">
                        <button type="submit" class="search-button-top" aria-label="Realizar búsqueda">
                            <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </button>
                    </form>
                </div>
            </header>

            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success shadow-sm rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content') {{-- Contenido específico de cada página --}}
            </div>
        </main>
    </div>

    <footer>
        &copy; {{ date('Y') }} 📚 Gestión de Libros. Todos los derechos reservados.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openSidebarBtn = document.getElementById('open-sidebar');
            const closeSidebarBtn = document.getElementById('close-sidebar');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            function openSidebar() {
                sidebar.classList.add('active');
                sidebarOverlay.classList.add('active');
                document.body.style.overflow = 'hidden'; // Evita el scroll del body
            }

            function closeSidebar() {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
                document.body.style.overflow = ''; // Habilita el scroll del body
            }

            if (openSidebarBtn) {
                openSidebarBtn.addEventListener('click', openSidebar);
            }
            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', closeSidebar);
            }
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeSidebar); // Cierra al hacer clic en el overlay
            }

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && sidebar.classList.contains('active')) {
                    closeSidebar();
                }
            });
        });
    </script>
</body>
</html>