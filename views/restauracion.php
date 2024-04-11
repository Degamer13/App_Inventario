
         
 

    <?php require'nav.php';?>
         
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Restauración de Base de Datos</h1>
                        
    <div class="card bg-light" style="margin: 10px; ">
      
        <form class="needs-validation"  action="../php/Restore.php" method="POST">
          <div class="container">
          

            <div class="col-12">
            <label class="form-label">Selecciona un punto de restauración</label><br>
		<select class="form-select" name="restorePoint"  id="single-select-field" required>
			<option value="" disabled="" selected="">Selecciona un punto de restauración</option>
			<?php
				include_once '../php/Connet.php';
				$ruta=BACKUP_PATH;
				if(is_dir($ruta)){
				    if($aux=opendir($ruta)){
				        while(($archivo = readdir($aux)) !== false){
				            if($archivo!="."&&$archivo!=".."){
				                $nombrearchivo=str_replace(".sql", "", $archivo);
				                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                $ruta_completa=$ruta.$archivo;
				                if(is_dir($ruta_completa)){
				                }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                }
				            }
				        }
				        closedir($aux);
				    }
				}else{
				    echo $ruta." No es ruta válida";
				}
			?>
		</select>
        

            
        
            </div>
       
          
          

          <hr class="my-4">

          <button class=" btn btn-info btn-lg col-12" type="submit">Subir</button>
        </form>
      </div>
    </div>
                    
                        
                    </div>             
</main>

    
    <?php require'footer.php';?>
            
                
     
    