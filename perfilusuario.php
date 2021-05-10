<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    @include_once('links.php');
    ?>
</head>
<body class="body-fondo">

<?php
@include_once('navbar.php');
?>

<div class="container">
    <h1 class="my-4 font-weight-bold">Perfil del Usuario</h1>

    <div class="card">
        <div class="card-header bg-white font-weight-bold">
            <h5 class="font-weight-bold text-muted">Configuración de la cuenta del usuario</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col col-12 col-lg-6 mb-2">
                    <h5 class="font-weight-bold mb-3">Información personal</h5>
                    <form class="mt-2">
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="paterno" class="font-weight-bold">Apellidos</label>
                                </div>
                                <div class="col col-sm-4">
                                    <input type="text" class="form-control bg-light" id="paterno">
                                </div>
                                <div class="col col-sm-4">
                                    <input type="text" class="form-control bg-light" id="materno">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="nombres" class="font-weight-bold">Nombres</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="nombres">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="direccion" class="font-weight-bold">Dirección</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="direccion">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end my-3">
                            <button type="submit" class="btn btn-primary font-weight-bold">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col col-12 col-lg-6 mb-2">
                    <h5 class="font-weight-bold mb-3">Cambiar información de acceso</h5>
                    <form class="mt-2">
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="usuario" class="font-weight-bold">Usuario</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="usuario">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="contra" class="font-weight-bold">Contraseña</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="password" class="form-control bg-light" id="contra">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="repetir-contra" class="font-weight-bold">Repetir contraseña</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="password" class="form-control bg-light" id="repetir-contra">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end my-3">
                            <button type="submit" class="btn btn-primary font-weight-bold">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!--====== Scripts -->
<?php
@include_once('scripts.php');
?>


</body>
</html>