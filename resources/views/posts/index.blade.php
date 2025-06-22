<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Modal pequeño y bonito</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .open-modal-container {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      max-width: 400px;
      padding: 20px;
      background: rgba(255 255 255 / 0.15);
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      user-select: none;
    }

    .btn-open-modal {
      padding: 1rem 2.5rem;
      font-size: 1.25rem;
      font-weight: 600;
      border-radius: 50px;
      box-shadow: 0 6px 15px rgba(255, 111, 97, 0.6);
      transition: background-color 0.3s ease, transform 0.2s ease;
      border: none;
      background-color: #ff6f61;
      color: white;
    }

    .btn-open-modal:hover {
      background-color: #ff3b2f;
      transform: scale(1.05);
    }

    .modal-content {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-radius: 12px;
      border: none;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .modal-footer .btn-primary {
      background-color: #ff6f61;
      border: none;
      transition: background-color 0.3s ease;
    }

    .modal-footer .btn-primary:hover {
      background-color: #ff3b2f;
    }

    .modal-footer .btn-outline-secondary {
      color: white;
      border-color: white;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .modal-footer .btn-outline-secondary:hover {
      background-color: white;
      color: #764ba2;
    }

    .btn-close {
      filter: invert(1);
    }

    .modal-body p {
      text-align: center;
      font-size: 1.25rem;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <div class="open-modal-container">
    <button type="button" class="btn btn-open-modal" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Abrir Modal
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <p>Modal en Laravel</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
