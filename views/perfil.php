<?php
require"../php/conexion.php";

session_start();
$id = $_SESSION["id"];

$rol1=2;

$estatus='estatus';
$consulta = "SELECT * FROM users u LEFT JOIN roles r ON u.role_id=r.id_rol LEFT JOIN preguntas_seguridad p ON p.id_user=u.id WHERE id='$id'   OR $rol1='role_id'  AND $estatus='estatus' ";
$result = mysqli_query($conexion, $consulta);
$ejecute= $conexion->query($consulta);
$row= $result->fetch_assoc();
if (mysqli_num_rows($result) == 0) {
    echo" <script>
    alert('Por favor debe de iniciar sesión');
    window.location.href='../index.php';
    
    </script>';
    ";
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
    echo '

    <script>
    
    alert("Su cuenta se encuentra inactiva");
    window.location.href="../index.php";
    
    </script>';
    

  // Si el id del usuario no existe en la base de datos, destruir la sesión
  session_destroy();
  // Cerrar la conexión con la base de datos
  mysqli_close($conexion);
}if ($filas["role_id"]==2){
    echo '

    <script>
    
    alert("No posee los permisos necesarios);
    window.location.href="../index.php";
    
    </script>';
    

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
                                <a class="nav-link" href="materiales.php">Materiales</a>
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
<div id = 'layoutSidenav_content'>
<main>
<div class = 'container-fluid px-4'>
<h1 class = 'mt-4'>Perfil de Usuario</h1>
<ol class = 'breadcrumb mb-4'>

</ol>

<div class = 'container'>

<div class = 'row g-5'>
<div class = 'col-md-5 col-lg-4 order-md-last'>
<h4 class = 'd-flex justify-content-between align-items-center mb-3'>
<span class = 'text-dark'>Información Del Perfil</span>

</h4>
<ul class = 'list-group mb-3'>
<li class = 'list-group-item d-flex justify-content-between lh-sm'>
<div>

<small class = 'text-muted'>Actualice la información de perfil y la dirección de correo electrónico de su cuenta.</small>
</div>

</li>

</ul>

</div>
<div class = 'col-md-7 col-lg-8'>

<form class = '' method = 'POST' action = "../php/actualizar_profile.php?id=<?=$row['id']?>">
<div class = 'row g-3'>

<div class = 'col-12'>
<label for = 'username' class = 'form-label'>Nombre de Usuario</label>
<div class = 'input-group has-validation'>

<input type = 'text' class = 'form-control' id = 'username' name = 'username' placeholder = 'Escribir Nombre de Usuario' value = "<?php echo $row['username'] ?>" required>
<div class = 'invalid-feedback'>
Your username is required.
</div>
</div>
</div>

<div class = 'col-12'>
<label for = 'email' class = 'form-label'>Correo Eléctronico</label>
<input type = 'email' class = 'form-control' id = 'email'  name = 'email' placeholder = 'you@example.com' value = "<?php echo $row['email'] ?>" required>
<div class = 'invalid-feedback'>
Please enter a valid email address for shipping updates.
</div>
</div>

</div>
<br>
<div class = 'd-grid gap-2 d-md-flex justify-content-md-end'>

<button class = 'btn btn-outline-info' type = 'submit'>Guardar</button>
</div>

<hr class = 'my-4'>

</form>
</div>
</div>

</div>
<div class = 'container'>

<div class = 'row g-5'>
<div class = 'col-md-5 col-lg-4 order-md-last'>
<h4 class = 'd-flex justify-content-between align-items-center mb-3'>
<span class = 'text-dark'>Actualizar Contraseña</span>

</h4>
<ul class = 'list-group mb-3'>
<li class = 'list-group-item d-flex justify-content-between lh-sm'>
<div>

<small class = 'text-muted'>Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.</small>
</div>

</li>

</ul>

</div>
<div class = 'col-md-7 col-lg-8'>

<form class = '' method = 'POST' action = "../php/actualizar_password.php?id=<?=$row['id']?>"  onsubmit = 'return validarClave()' >
<div class = 'row g-3'>

<div class = 'col-12'>
<label for = 'username' class = 'form-label'>Nueva Contraseña</label>
<div class = 'input-group has-validation'>

<input type = 'password' class = 'form-control' id = 'clave' name = 'passwordd' maxlength = '15' minlength = '8' placeholder = 'Escribir Contraseña Nueva'  required>
<div class = 'invalid-feedback'>
Your username is required.
</div>
</div>
</div>

<div class = 'col-12'>
<label for = 'email' class = 'form-label'>Confirmar Contraseña</label>
<input type = 'password' class = 'form-control' id = 'confirmacionClave' name = 'confirm_password' maxlength = '15' minlength = '8' placeholder = 'Escribir Contraseña de Nuevo'  required>
<div class = 'invalid-feedback'>
Please enter a valid email address for shipping updates.
</div>
</div>

</div>
<br>
<div class = 'd-grid gap-2 d-md-flex justify-content-md-end'>

<button class = 'btn btn-outline-info' type = 'submit'>Guardar</button>
</div>

<hr class = 'my-4'>

</form>
</div>
</div>

</div>

<div class = 'container'>

<div class = 'row g-5'>
<div class = 'col-md-5 col-lg-4 order-md-last'>
<h4 class = 'd-flex justify-content-between align-items-center mb-3'>
<span class = 'text-dark'>Preguntas de Seguridad</span>

</h4>
<ul class = 'list-group mb-3'>
<li class = 'list-group-item d-flex justify-content-between lh-sm'>
<div>

<small class = 'text-muted'>Asegúrese de establecer sus preguntas de seguridad para poder recuperar el acceso a su cuenta si es necesario.</small>
</div>

</li>

</ul>

</div>
<div class = 'col-md-7 col-lg-8'>

<form class = '' method = 'POST' action = '../php/actualizar_preguntas.php'>
<div class = 'row'>
<div class = 'col'>
<label for = 'email' class = 'form-label'>Pregunta N° 1</label>
<input type = 'text' class = 'form-control' placeholder = 'Escribir Pregunta' aria-label = 'First name' value = "<?php echo $row['pregunta1'] ?>" name = 'pregunta1' required>
</div>
<br>
<div class = 'col'>
<label for = 'email' class = 'form-label'>Respuesta N° 1</label>
<input type = 'text' class = 'form-control' placeholder = 'Escribir Respuesta' aria-label = 'Last name' name = 'respuesta1' required>
</div>
</div>

<br>
<div class = 'row'>
<div class = 'col'>
<label for = 'email' class = 'form-label'>Pregunta N° 2</label>
<input type = 'text' class = 'form-control' placeholder = 'Escribir Pregunta' value = "<?php echo $row['pregunta2'] ?>" aria-label = 'First name' name = 'pregunta2' required>
</div>

<br>
<div class = 'col'>
<label for = 'email' class = 'form-label'>Respuesta N° 2</label>
<input type = 'text' class = 'form-control' placeholder = 'Escribir Respuesta' aria-label = 'Last name' name = 'respuesta2' required>
</div>
</div>

<br>
<div class = 'row'>
<div class = 'col'>
<label for = 'email' class = 'form-label'>Pregunta N° 3</label>
<input type = 'text' class = 'form-control' placeholder = 'Escribir Pregunta' value = "<?php echo $row['pregunta3'] ?>" name = 'pregunta3' aria-label = 'First name' required>
</div>

<br>
<div class = 'col'>
<label for = 'email' class = 'form-label'>Respuesta N° 3</label>
<input type = 'text' class = 'form-control' placeholder = 'Escribir Respuesta' aria-label = 'Last name' name = 'respuesta3' required>
</div>
</div>

<br>

<input type = 'hidden' class = 'form-control'  name = 'id_user' value = "<?php echo $row['id'];?>">
<br>
<div class = 'd-grid gap-2 d-md-flex justify-content-md-end'>

<button class = 'btn btn-outline-info' type = 'submit'>Guardar</button>
</div>

<hr class = 'my-4'>

</form>
</div>
</div>

</div>

</main>
                <?php require'footer.php';?>