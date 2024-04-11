

    <?php require'nav.php';?>
         
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Gestion de Respaldos</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" >
                                     <thead >
                                     
                                        <tr> 
          <th >NUMERO</th> 
          <th >NOMBBRE</th>
          <th >DESCARGAR</th>
          <th >ELIMINAR</th>
        </tr> 
                                            
                                        </tr>
                                    </thead>
                                   <img src="" alt="">
                                    <tbody>
                                        <?php
                                       
                                        // Esto devolverá todos los archivos de esa carpeta
                                        $archivos = scandir("../backups");
                                        $num=0;
                                        for ($i=2; $i<count($archivos); $i++)
                                        {$num++;
                          
                                          echo "<tr>";
                             
                                   echo "<td>".$num."</td>";
                                  echo "<td>".$archivos[$i]."</td>";
                                  
                            
                             
                             
                                    echo "<td><a  href='../backups/".$archivos[$i]."' download='".$archivos[$i]."' > 
                                               <button type='submit' class='btn btn-success'><i class='fa fa-download'></i></button></a></td>";
                              
                                   echo "<td><a  class='btn btn-danger' href='eliminar.php?name=../backups/".$archivos[$i]."'><i class='fa fa-trash'></i></td>";
                                  echo "</tr>";
                          }
                                       


?>   </tbody>
</table>
</div>
</div>
</div>




</main>
    
    <?php require'footer.php';?>
            
                

