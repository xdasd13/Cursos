<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Curso App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 80px 0;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 40px;
            animation: fadeIn 0.8s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .action-btn {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .footer {
            margin-top: 100px;
            padding: 20px 0;
            background-color: #f8f9fa;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap text-primary me-2"></i>
                Curso App
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/cursos/listar.php">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/categorias/listar.php">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Hero Section -->
        <div class="hero-section text-center">
            <h1 class="display-4 mb-3">Bienvenido a Curso App</h1>
            <p class="lead mb-4">Tu plataforma para descubrir y administrar los mejores cursos educativos</p>
        </div>
        
        <!-- Main Options -->
        <div class="row justify-content-center text-center">
            <div class="col-md-5 mb-4">
                <div class="card p-4 h-100 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-book fa-3x text-primary mb-3"></i>
                        <h3>Explora Cursos</h3>
                        <p class="text-muted">Descubre nuestra amplia selección de cursos disponibles para mejorar tus habilidades.</p>
                        <a href="../views/cursos/listar.php" class="btn btn-primary action-btn mt-3">
                            <i class="fas fa-list me-2"></i>Ver Cursos
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 mb-4">
                <div class="card p-4 h-100 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-tags fa-3x text-secondary mb-3"></i>
                        <h3>Explora Categorías</h3>
                        <p class="text-muted">Navega por nuestras categorías para encontrar los cursos que mejor se adapten a tus intereses.</p>
                        <a href="../views/categorias/listar.php" class="btn btn-secondary action-btn mt-3">
                            <i class="fas fa-th-large me-2"></i>Ver Categorías
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="text-muted">© 2025 Curso App - Todos los derechos reservados</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>