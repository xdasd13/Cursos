<?php
include '../../app/controllers/CategoriaController.php';

$categoriaController = new CategoriaController();
$categorias = $categoriaController->listar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías | Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color:rgb(0, 0, 0);
            color: #333;
        }
        .table {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .table thead {
            background-color: #f8f9fa;
        }
        .table th {
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
        }
        .card {
            border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .card-header {
            background-color: white;
            border-bottom: 1px solid #eee;
            padding: 1rem 1.25rem;
        }
        .btn-sm {
            border-radius: 4px;
            padding: 0.25rem 0.5rem;
        }
        .action-buttons .btn {
            margin-right: 5px;
        }
        .page-header {
            margin-bottom: 1.5rem;
        }
        .main-content {
            padding: 2rem 0;
        }
        .navbar {
            padding: 0.75rem 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar simple -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="../../public/index.php">
                Sistema de Gestión
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../public/index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cursos/listar.php">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="listar.php">Categorías</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Categorías</h5>
                <a href="registrar.php" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus-circle me-1"></i>Nueva Categoría
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="10%" class="text-center">ID</th>
                                <th width="70%">Nombre</th>
                                <th width="20%" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($categorias->rowCount() > 0): ?>
                                <?php while ($row = $categorias->fetch(PDO::FETCH_ASSOC)): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['categoria']; ?></td>
                                        <td class="text-center action-buttons">
                                            <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm" 
                                               onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center py-3">No hay categorías registradas</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="../../public/index.php" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left me-1"></i>Volver al Inicio
                </a>
            </div>
        </div>
    </div>

    <footer class="bg-light mt-4 py-3 border-top">
        <div class="container text-center text-muted">
            <small>&copy; <?php echo date('Y'); ?> Sistema de Gestión</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>