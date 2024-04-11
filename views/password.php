<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FAB & WELD, C. A. INVENTARIO</title>
        <link href="../css/styles.css" rel="stylesheet" />
         <style>
            body{
                background-image: url('../img/photo1701313612.jpeg');
                
    /**background-repeat: no-repeat;
    */
    background-size:cover;
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
  position: relative;
    
            }
            
img {
  position: absolute;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
            .card{
                background-color: rgba(0, 0, 0, 0.5);
            }
           a{
            text-decoration: none;
            color: #fff;
           }
           a:hover{
   color:gainsboro;
}
           h6{
            color:#fff;
            text-transform: uppercase
           }
           .group-material-login{ 
    position:relative; 
    margin-bottom:25px; 
}
.material-login-control,
.material-control-login{
  background-color: transparent;
  font-size:17px;
  padding:10px 10px 10px 5px;
  display:block;
  width:100%;
  border:none;
  border-bottom:1px solid #fff;
  outline:none;
  color: #fff;
}


            
        </style>
         <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">FAB & WELD, C. A.<span class="visually-hidden">(current)</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>



<!-- Right Side Of Navbar -->
    <!-- Authentication Links -->
    <div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav ms-auto">

            <li class="nav-item">
 
                <a class="nav-link" href="../index.php" style="text-transform: uppercase">Inicio</a>
            </li>
  

   
            <li class="nav-item">
                <a class="nav-link" style="text-transform: uppercase"   href="../views/login.php">Login</a>
            </li>
  
</ul>
  </div>
</nav>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container ">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 my-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header"><h6 class="text-center font-weight-light my-"> <center><i class='fas fa-user-circle' style='font-size:50px;'></i><br><br>Recuperar Cuenta</h6></div>
                                    <div class="card-body">
                                        <form  method = 'POST' action = '../php/validaEmail.php'>
                                            <br>
                                        <div class="group-material-login">
                                        <label style="color:#fff;"><i class="fa fa-envelope"></i> &nbsp; Correo Eléctronico</label>
              <input type="email" class="material-login-control" name="email" required="" >
              
              
            </div>
         
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                               <button type="submit" class="btn btn-outline-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
</svg></button> 
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div><br>
            <div id="layoutAuthentication_footer">
                <footer class="py-4  mt-auto" style=" background-color:#000">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">FAB & WELD, C. A. &copy; 2023-2024</div>
                            <div class="col-lg-4 text-lg-end">
                        <a class="link text-decoration-none me-3" href="#!">Política de Privacidad</a>
                        <a class="link text-decoration-none" href="#!">Condiciones de Uso</a>
                    </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
