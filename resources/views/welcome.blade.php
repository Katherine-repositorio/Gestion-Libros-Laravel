<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Botones Bonitos y Tarjeta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            font-family: 'Segoe UI', sans-serif;
        }
        .btn-box {
            padding: 15px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        h2 {
            font-weight: bold;
        }
    </style>
</head>
<body class="py-5">

    <div class="container">
        <!-- Sección de Botones -->
        <div class="card p-5 mb-5">
            <h2 class="mb-4 text-center text-primary">Componentes de Botón con Bootstrap</h2>

            <div class="row text-center">
                <div class="col-md-3 btn-box"><x-button type="primary" text="Primary" size="btn-lg" /></div>
                <div class="col-md-3 btn-box"><x-button type="secondary" text="Secondary" /></div>
                <div class="col-md-3 btn-box"><x-button type="success" text="Success" /></div>
                <div class="col-md-3 btn-box"><x-button type="danger" text="Danger" /></div>
            </div>

            <div class="row text-center">
                <div class="col-md-3 btn-box"><x-button type="warning" text="Warning" size="btn-sm" /></div>
                <div class="col-md-3 btn-box"><x-button type="info" text="Info" /></div>
                <div class="col-md-3 btn-box"><x-button type="light" text="Light" /></div>
                <div class="col-md-3 btn-box"><x-button type="dark" text="Dark" /></div>
            </div>

            <div class="row text-center">
                <div class="col-md-3 btn-box"><x-button type="outline-primary" text="Outline Primary" /></div>
                <div class="col-md-3 btn-box"><x-button type="outline-success" text="Outline Success" /></div>
                <div class="col-md-3 btn-box"><x-button type="outline-danger" text="Outline Danger" /></div>
                <div class="col-md-3 btn-box"><x-button type="outline-warning" text="Outline Warning" /></div>
            </div>
        </div>

 <!-- Card  -->
 <x-card class="bg-primary bg-opacity-25 border-0 shadow-sm rounded-4 p-3" style="max-width: 400px; margin: auto;">
    <x-slot name="title">
        <h6 class="card-title text-dark text-center mb-3 fw-semibold">
            ✨ Motivación Rápida
        </h6>
    </x-slot>

    <div class="card-text text-dark text-center small px-3">
        <blockquote class="blockquote mb-0">
            <p class="fst-italic mb-0">
                "Haz hoy lo que otros no quieren, y mañana lograrás lo que otros no pueden. 
                Cada paso que das, aunque pequeño, te acerca a algo grande."
            </p>
        </blockquote>
    </div>

    <x-slot name="footer">
        <div class="text-dark text-center small mt-3 opacity-75">
            © 2025 - Sigue brillando 🌟
        </div>
    </x-slot>
</x-card>


  

</body>
</html>
