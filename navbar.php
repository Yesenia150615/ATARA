<nav class="navbar navbar-expand-lg navbar-dark navbar-fondo">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="principal.php">
            <img src="img/isi.png" width="30" height="30" class="d-inline-block align-top" alt="">
            ATARA
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mr-2">
                    <a class="nav-link" href="principal.php">Principal</a>
                </li>
                <li class="nav-item dropdown mr-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Alumnos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="alumno.php">Registrar y modificar alumnos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="estudiante.php">Alumnos en riesgo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="alumnoAltoriesgo.php">Alumnos alto riego</a>
                    </div>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="alumnoAltoriesgo.php">Cursos</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span id="usuario">Ing. Luis Alvarado</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="perfilusuario.php">Ver perfil</a>
                            <div class="dropdown-divider"></div>
                            <button type="button" class="dropdown-item text-danger" data-toggle="modal"
                                    data-target="#modalCerrar">
                                Cerrar Sesión
                            </button>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="modalCerrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                ¿Desea Cerrar Sesión?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-danger" href="login.php">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</div>