<?php
require"../php/conexion.php";

session_start();
$id = $_SESSION["id"];

$rol1=2;

$estatus='estatus';
$consulta = "SELECT * FROM users WHERE id = '$id'  OR $rol1='role_id' AND $estatus='estatus'";
$result = mysqli_query($conexion, $consulta);
$ejecute= $conexion->query($consulta);
$row= $result->fetch_assoc();
if (mysqli_num_rows($result) == 0) {
    echo"<script>
    alert('Por favor debe de iniciar sesión');
    window.location.href='../index.php';
</script>";
    

    // Si el id del usuario no existe en la base de datos, destruir la sesión
    session_destroy();
      // Cerrar la conexión con la base de datos
      mysqli_close($conexion);
}if (!$result=mysqli_query($conexion, $consulta)) {
	echo("Error description:".mysqli_error($conexion));
}

$filas=mysqli_fetch_array($result, MYSQLI_ASSOC);

$result1 = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($result1) > 0) {

if ($filas["estatus"]=='Inactivo'){
    echo"<script>
    alert('El Usuario se encuentra Inactivo');
    window.location.href='../index.php';
</script>";
   
    

  // Si el id del usuario no existe en la base de datos, destruir la sesión
  session_destroy();
  // Cerrar la conexión con la base de datos
  mysqli_close($conexion);
}if ($filas["role_id"]==2){

    echo"<script>
    alert('No posee los permisos necesarios');
    window.location.href='../index.php';
</script>";
 

  // Si el id del usuario no existe en la base de datos, destruir la sesión
  session_destroy();
  // Cerrar la conexión con la base de datos
  mysqli_close($conexion);
}
}



    ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <title>FAB & WELD, C. A. INVENTARIO</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-2" href="home.php">FAB & WELD, C. A.</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="hidden" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                     
                        <li><a class="dropdown-item" href="../php/cerrar.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Inicio
                            </a>
                            <div class="sb-sidenav-menu-heading">Gestión de Registros</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Registros
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="materiales.php"> Materiales</a>
                                    <a class="nav-link" href="facilidades.php">Facilidades</a>
                                    <a class="nav-link" href="maquinarias_fijas.php">Maquinarias Fijas</a>
                                    <a class="nav-link" href="mobiliarios.php">Mobiliarios</a>
                                    <a class="nav-link" href="sistemas.php">Sistemas</a>
                                    <a class="nav-link" href="vehiculos.php">Vehiculos</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Gestión de Usuarios</div>
                            <a class="nav-link" href="nuevo_user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                               Registrar Usuario
                              
                            </a>
                            <a class="nav-link" href="usuarios.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Tabla de  Usuarios
                              
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Reportes y Respaldos</div>
                            <a class="nav-link" href="reportes.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-file-pdf' style='font-size:12px'></i></div>
                               Gestión de Reportes
                            </a>
                            <a class="nav-link" href="backups.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-cloud' style='font-size:12px'></i></div>
                              Gestión de Respaldos
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Usuario: <b style="text-transform: uppercase"><?php echo $row['username'] ?></b></div>
                       
                    </div>
                </nav>
            </div>