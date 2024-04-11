
<?php require'nav.php';?>
         
         <div id="layoutSidenav_content">
                     <main>
                         <div class="container-fluid px-4">
                             <h1 class="mt-4">LISTADO DE VEHICULOS</h1>
                             <ol class="breadcrumb mb-4">
                              
                              <a href="registrar6.php" class="btn btn-success" >Registrar</a>
     
                             </ol>
                             <div class="card">
  <div class="card-body">
  <h3>Salida de Materiales</h3>
  <form action="../php/salida_vehiculo.php" method="POST">
           <div class="row g-3">

  <div class="col-sm-2">
    <input type="text" class="form-control" placeholder="Descripción" name="descripcion" required>
  </div>
  <div class="col-sm-2">
    <input type="text" class="form-control" placeholder="Tipo" name="tipo" required>
  </div>
  <div class="col-sm-2">
    <input type="text" class="form-control" placeholder="Marca" name="marca" required>
  </div>
  <div class="col-sm-2">
    <input type="text" class="form-control" placeholder="Placa" name="placa" required>
  </div>
  <div class="col-sm-2">
    <input type="number" class="form-control" placeholder="Año" name="anio" required>
  </div>
  <div class="col-sm-2">
    <input type="text" class="form-control" placeholder="Color"  name="color" required>
  </div>
  
  <div class="col-sm-2">
    <input type="text" class="form-control" placeholder="Bateria" name="bateria"  required>
  </div>
  <div class="col-sm-2">
    <input type="text" class="form-control" placeholder="Observación" name="observacion"  required>
  </div>
  <input type="hidden" valu="Almacenado" name="estatus">
  <div class="col-sm-2">
    <input type="date" class="form-control" name="fecha"   required>
  </div>
 
  <div class="col-sm-2">
  <button class="btn btn-success" type="submit">Registrar salida</button>
  </div>

</div>
</form>  
  </div>
</div>
              
                     
             <br>     
                             <div class="row">
                          
                             <div class="card mb-4">
                                 <div class="card-header">
                                     <i class="fas fa-table me-1"></i>
                                     
                                 </div>
                                 <div class="card-body">
                                     <table id="datatablesSimple" >
                                     <thead>
                                             <tr>
                                          
                                        <th style="text-align: center;">Descripción</th>
                                             <th style="text-align: center;">Tipo</th>
                                            <th style="text-align: center;">Marca</th>
                                            <th style="text-align: center;">Placa</th>
                                            <th style="text-align: center;">Año</th>
                                            <th style="text-align: center;">Color</th>
                                        
                                            <th style="text-align: center;">Bateria</th>
                                            <th style="text-align: center;">Observacion</th>
                                            <th style="text-align: center;">Estatus</th>
                                            <th style="text-align: center;">Fecha</th>
                                         
                                            
                                      
                                                   <th >Actualizar</th>
                                                 <th >Eliminar</th>
     
                                                 
                                             </tr>
                                                 
                                             </tr>
                                         </thead>
                                        <img src="" alt="">
                                         <tbody >
                                             <?php
                                             require"../php/conexion.php";
     
     $queto= "SELECT * FROM vehiculo";
     $result= mysqli_query($conexion, $queto);
     while($fila = mysqli_fetch_array($result)){
         echo "<tr>";
     
      
             echo "<td>". $fila['descripcion']. "</td>";   
             echo "<td>".$fila['tipo']. "</td>";
         echo "<td>". $fila['marca']. "</td>";
         echo "<td>". $fila['placa']. "</td>";
         echo "<td>". $fila['anio']. "</td>";
         echo "<td>". $fila['color']. "</td>";
        
         echo "<td>". $fila['bateria']. "</td>";
         echo "<td>". $fila['observacion']. "</td>";
         echo "<td>". $fila['estatus']. "</td>";
         echo "<td>". $fila['fecha']. "</td>";
       
         
           echo "<td><a href='actualizar_vehiculos.php?id=".$fila['id']."' class='btn btn-primary btn-raised btn-xs'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
           <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z'/>
         </svg></a></td>";
           echo "<td><a  class='btn btn-danger btn-raised btn-xs' href='../php/eliminar_vehiculos.php?id=".$fila['id']."'>
           <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
           <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
         </svg></td>";
             
         echo "</tr>";
        
     
     }
     ?>
               </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
     
     
                           
                           
                     </main>
         
         <?php require'footer.php';?>
                 