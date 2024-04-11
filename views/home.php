
<?php require'nav.php';?>
      
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Contadores</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Control de Registros</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                                  <?php
    require"../php/conexion.php";
    
  $registras = mysqli_query($conexion, "select count(*) as cantidad from materiales WHERE id") or
    die("Problemas en el select:" . mysqli_error($conexion));
  $rego = mysqli_fetch_array($registras);
                                   echo" <div class='card-body'>Materiales <br>
                                   <center><h2>".$rego['cantidad']."</center></h2></div>
                                    
                           ";
                                   echo"   <div class='card-footer d-flex align-items-center justify-content-between'>";
                                     echo"     <a class='small text-white stretched-link' href='materiales.php'>Visualizar Detalles</a>";
                                    echo"      <div class='small text-white'><i class='fas fa-angle-right'></i></div>";
                                    echo"  </div>";
                                echo"  </div>";
                             echo" </div>";
                                 ?> 
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                      <?php
    require"../php/conexion.php";
    
  $registras = mysqli_query($conexion, "select count(*) as cantidad from facilidades WHERE id") or
    die("Problemas en el select:" . mysqli_error($conexion));
  $rego = mysqli_fetch_array($registras);
                                   echo" <div class='card-body'>Facilidades<br>
                                   <center><h2>".$rego['cantidad']."</center></h2></div>
                                    
                           ";
                                   echo"   <div class='card-footer d-flex align-items-center justify-content-between'>";
                                     echo"     <a class='small text-white stretched-link' href='facilidades.php'>Visualizar Detalles</a>";
                                    echo"      <div class='small text-white'><i class='fas fa-angle-right'></i></div>";
                                    echo"  </div>";
                                echo"  </div>";
                             echo" </div>";
                                 ?> 
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                     <?php
    require"../php/conexion.php";
    
  $registras = mysqli_query($conexion, "select count(*) as cantidad from maquinarias_fijas WHERE id") or
    die("Problemas en el select:" . mysqli_error($conexion));
  $rego = mysqli_fetch_array($registras);
                                   echo" <div class='card-body'>Maquinarias Fijas<br>
                                   <center><h2>".$rego['cantidad']."</center></h2></div>
                                    
                           ";
                                   echo"   <div class='card-footer d-flex align-items-center justify-content-between'>";
                                     echo"     <a class='small text-white stretched-link' href='maquinarias_fijas.php'>Visualizar Detalles</a>";
                                    echo"      <div class='small text-white'><i class='fas fa-angle-right'></i></div>";
                                    echo"  </div>";
                                echo"  </div>";
                             echo" </div>";
                                 ?> 

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                 
                                    <?php
    require"../php/conexion.php";
    
  $registras = mysqli_query($conexion, "select count(*) as cantidad from mobiliarios WHERE id") or
    die("Problemas en el select:" . mysqli_error($conexion));
  $rego = mysqli_fetch_array($registras);
                                   echo" <div class='card-body'>Mobiliarios<br>
                                   <center><h2>".$rego['cantidad']."</center></h2></div>
                                    
                           ";
                                   echo"   <div class='card-footer d-flex align-items-center justify-content-between'>";
                                     echo"     <a class='small text-white stretched-link' href='mobiliarios.php'>Visualizar Detalles</a>";
                                    echo"      <div class='small text-white'><i class='fas fa-angle-right'></i></div>";
                                    echo"  </div>";
                                echo"  </div>";
                             echo" </div>";
                                 ?> 
                             </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                   

                                    <?php
    require"../php/conexion.php";
    
  $registras = mysqli_query($conexion, "select count(*) as cantidad from sistema WHERE id") or
    die("Problemas en el select:" . mysqli_error($conexion));
  $rego = mysqli_fetch_array($registras);
                                   echo" <div class='card-body'>Sistemas<br>
                                   <center><h2>".$rego['cantidad']."</center></h2></div>
                                    
                           ";
                                   echo"   <div class='card-footer d-flex align-items-center justify-content-between'>";
                                     echo"     <a class='small text-white stretched-link' href='sistemas.php'>Visualizar Detalles</a>";
                                    echo"      <div class='small text-white'><i class='fas fa-angle-right'></i></div>";
                                    echo"  </div>";
                                echo"  </div>";
                             echo" </div>";
                                 ?> 
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    
                                 
                                    <?php
    require"../php/conexion.php";
    
  $registras = mysqli_query($conexion, "select count(*) as cantidad from vehiculo WHERE estatus='Almacenado'") or
    die("Problemas en el select:" . mysqli_error($conexion));
  $rego = mysqli_fetch_array($registras);
                                   echo" <div class='card-body'>Vehiculos<br>
                                   <center><h2>".$rego['cantidad']."</center></h2></div>
                                    
                           ";
                                   echo"   <div class='card-footer d-flex align-items-center justify-content-between'>";
                                     echo"     <a class='small text-white stretched-link' href='vehiculos.php'>Visualizar Detalles</a>";
                                    echo"      <div class='small text-white'><i class='fas fa-angle-right'></i></div>";
                                    echo"  </div>";
                                echo"  </div>";
                             echo" </div>";
                                 ?> 
                           
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                             
                                       <?php
    require"../php/conexion.php";
    
  $registras = mysqli_query($conexion, "select count(*) as cantidad from users WHERE id") or
    die("Problemas en el select:" . mysqli_error($conexion));
  $rego = mysqli_fetch_array($registras);
                                   echo" <div class='card-body'>Usuarios<br>
                                   <center><h2>".$rego['cantidad']."</center></h2></div>
                                    
                           ";
                                   echo"   <div class='card-footer d-flex align-items-center justify-content-between'>";
                                     echo"     <a class='small text-white stretched-link' href='usuarios.php'>Visualizar Detalles</a>";
                                    echo"      <div class='small text-white'><i class='fas fa-angle-right'></i></div>";
                                    echo"  </div>";
                                echo"  </div>";
                             echo" </div>";
                                 ?> 
                      
                    </div>
                </div>
                </main>
                <?php require'footer.php';?>