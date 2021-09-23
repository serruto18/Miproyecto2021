
<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
      <?php
      foreach ($infozona->result() as $row){
        echo form_open_multipart('zonatrabajo/modificarbd');
      ?>
      <input type="hidden" name="idzonaTrabaja" value="<?php echo $row->idzonaTrabaja; ?>">
      <div class="mb-3">
          <label class="form-label">Departamento</label>
          <input type="text" class="form-control" name="departamento" value="<?php echo $row->departamento; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Provincia</label>
          <input type="text" class="form-control" name="provincia" value="<?php echo $row->provincia; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Distrito</label>
          <input type="text" class="form-control" name="distrito" value="<?php echo $row->distrito; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">OTB</label>
          <input type="text" class="form-control" name="otb" value="<?php echo $row->otb; ?>">
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

     
