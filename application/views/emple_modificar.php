
<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
      <?php
      foreach ($infoempleado->result() as $row){
        echo form_open_multipart('empleado/modificarbdEmpl');
      ?>
      <input type="hidden" name="idempleado" value="<?php echo $row->idempleado; ?>">
      <div class="mb-3">
          <label class="form-label">Primer Apellido</label>
          <input type="text" class="form-control" name="primerApellido" value="<?php echo $row->primerApellido; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Segundo Apellido</label>
          <input type="text" class="form-control" name="segundoApellido" value="<?php echo $row->segundoApellido; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Nombres</label>
          <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Numero del Titulo</label>
          <input type="text" class="form-control" name="numeroTitulo" value="<?php echo $row->numeroTitulo; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">telelfono</label>
          <input type="text" class="form-control" name="telefono" value="<?php echo $row->telefono; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">subCategoria</label>
          <input type="text" class="form-control" name="subcategoria" value="<?php echo $row->subcategoria; ?>">
      </div>
      
      
      <button type="submit" class="btn btn-primary">Modificar</button>
      <?php 
        echo form_close();
      }
      ?>

      
       
    </div>
  </div>
</div>
</div>

     
