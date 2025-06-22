<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detalle del Post</title>

  <!-- Bootstrap y Google Fonts + Iconos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      background: linear-gradient(to right top, #fbc2eb, #a6c1ee);
      font-family: 'Raleway', sans-serif;
      margin: 0;
      min-height: 100vh;
    }

    .navbar {
      background: #6c5ce7 !important;
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.25rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .post-container {
      max-width: 450px;
      margin: 100px auto;
      padding: 2rem;
      background-color: #fff;
      border-radius: 1rem;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      text-align: center;
      animation: fadeIn 0.6s ease-in-out;
    }

    .post-container h2 {
      color: #6c5ce7;
      margin-bottom: 1rem;
    }

    .post-container p {
      font-size: 1.1rem;
      color: #555;
    }

    .btn-back {
      margin-top: 2rem;
      background-color: #6c5ce7;
      color: white;
      border: none;
      padding: 0.6rem 1.5rem;
      border-radius: 30px;
      font-weight: bold;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .btn-back:hover {
      background-color: #4834d4;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <!-- Navbar con icono y mensaje bonito -->
  <x-navbar brand="Bienvenido a mi blog">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('posts.index') }}"><i class="bi bi-house-door"></i> Inicio</a>
    </li>
  </x-navbar>

  <div class="post-container">
    <h2><i class="bi bi-journal-text"></i> Post #{{ $id }}</h2>
    <p>Gracias por visitar este rincón mágico donde cada post cuenta una historia. ✨</p>
    <a href="{{ route('posts.index') }}" class="btn btn-back">← Volver al inicio</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
