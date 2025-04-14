<?php
include '../../app/controllers/CategoriaController.php';

$categoriaController = new CategoriaController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $categoria = $categoriaController->obtenerPorId($id);

    if (!$categoria) {
        echo "Categoría no encontrada.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombreCategoria = $_POST['categoria'];

    if ($categoriaController->actualizar($id, $nombreCategoria)) {
        header('Location: listar.php');
        exit;
    } else {
        $mensaje = "Error al actualizar la categoría.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría | Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
        }
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border-radius: 0.5rem;
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: 1.25rem 1.5rem;
            font-weight: 500;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .breadcrumb {
            margin-bottom: 1.5rem;
        }
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .page-header {
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="../../index.php">Sistema de Gestión</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">Inicio</a>
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

    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="listar.php">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Editar Categoría</h5>
                        <a href="listar.php" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Volver
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <?php if (isset($mensaje)): ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i><?php echo $mensaje; ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
                            <div class="mb-4">
                                <label for="categoria" class="form-label">Nombre de la categoría</label>
                                <input type="text" name="categoria" id="categoria" class="form-control" 
                                       value="<?php echo $categoria['categoria']; ?>" required autofocus>
                                <div class="form-text text-muted">Ingrese un nombre único para identificar esta categoría.</div>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="listar.php" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-1"></i>Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Guardar cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light mt-5 py-3 border-top">
        <div class="container text-center text-muted">
            <small>&copy; <?php echo date('Y'); ?> Sistema de Gestión. Todos los derechos reservados.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>