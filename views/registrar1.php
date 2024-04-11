<?php require'nav.php';?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Nuevo Material</h1>
                      
                        <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">

      <div class="card">
       
      
  <div class="card-body">
  <center><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
</svg><h3>Registrar Material</h3></center>
  <form action="../php/registro1.php" method="POST">
   <div class="row g-2">
   <div class="mb-3">
    <label for="floatingInput">Descripción</label>
  <Textarea type="text" class="form-control"   name="descripcion"  required></Textarea>
</div>
  <div class="col-md">
  <div class="mb-3">
    <label for="floatingInputGrid">Serial de Numero</label>
      <input type="text" class="form-control" name="serial_number" required>
      
    </div>
  </div>
  <div class="col-md">
  <div class="mb-3">
    <label for="floatingInputGrid">Numero de Pack</label>
    <input type="number" class="form-control" name="numero_de_pack" required>
      
    </div>
  </div>
  <div class="mb-3">
    <label for="floatingInput">Ubicación</label>
  <Textarea type="text" class="form-control"   name="ubicacion"  required></Textarea>
</div>
<div class="col-md">
  <div class="mb-3">
    <label for="floatingInputGrid">Marca</label>
      <input type="text" class="form-control" name="marca" required>
      
    </div>
  </div>
  <div class="col-md">
  <div class="mb-3">
    <label for="floatingInputGrid">Cantidad</label>
    <input type="number" class="form-control" name="cantidad" min="1" required>
      
    </div>
  </div>
  </div>

  <div class="row g-3">
  <div class="col-md">
  <div class="mb-2">
  <label  for="autoSizingSelect">Codigo</label>
  <input type="number" class="form-control" name="codigo" required>
      
    </div>
  </div>
  <div class="col-md">
  <div class="mb-2">
  <label  for="autoSizingSelect">Fecha</label>
  <input type="date" class="form-control" name="fecha" required>
      
    </div>
  </div>
  <div class="col-md">
  <div class="mb-2">
  <label  for="autoSizingSelect">Unidad de Medida</label>
  <input type="text" class="form-control" name="unidad_de_medida" required>
      
    </div>
    
  </div>
  </div>
<br>
<div class="d-grid gap-2 col-6 mx-auto">
  <button type="submit" class="btn btn-outline-info">Registrar</button>

</div>
  

</form>
  </div>
</div>

</div>
 
 </div>

                      
                      
                </main>
          
                <?php require'footer.php';?>
