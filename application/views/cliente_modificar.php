
<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
      <?php
      foreach ($infocliente->result() as $row){
        echo form_open_multipart('cliente/modificarbd');
      ?>
      <input type="hidden" name="idcliente" value="<?php echo $row->idcliente; ?>">
      <div class="mb-3">
          <label class="form-label">Codigo</label>
          <input type="text" class="form-control" name="codigo" value="<?php echo $row->codigo; ?>">
      </div>
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
          <label class="form-label">Numero de C.I.</label>
          <input type="text" class="form-control" name="carnet" value="<?php echo $row->carnet; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Expedido</label>
          <input type="text" class="form-control" name="ciudad" value="<?php echo $row->ciudad; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Direccion</label>
          <input type="text" class="form-control" name="direccion" value="<?php echo $row->direccion; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Telefono</label>
          <input type="text" class="form-control" name="telefono" value="<?php echo $row->telefono; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Modificar</button>
      
      <?php 
        echo form_close();
      }
      ?>
      <?php
        echo form_open_multipart('cliente/verlistaZona');
      ?>
      <input type="hidden" name="idzona" value="<?php echo $row->idzona; ?>">
      <button type="submit" class="btn btn-primary">Cancelar</button>
      <?php 
        echo form_close();
      ?>
       
    </div>
  </div>
</div>
</div>

     
