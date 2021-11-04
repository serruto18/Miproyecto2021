
<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
      <?php
      foreach ($infocliente->result() as $row){
        echo form_open_multipart('inspector/modificarbd');
      ?>
      <input type="hidden" name="idinspector" value="<?php echo $row->idinspector; ?>">
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
          <label class="form-label">Descripcion</label>
          <input type="text" class="form-control" name="descripcion" value="<?php echo $row->descripcion; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Modificar</button>
      
      <?php 
        echo form_close();
      }
      ?>
      <?php
        echo form_open_multipart('inspector/verlista');
      ?>
      <button type="submit" class="btn btn-primary">Cancelar</button>
      <?php 
        echo form_close();
      ?>
       
    </div>
  </div>
</div>
</div>

     
