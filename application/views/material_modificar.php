
<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
      <?php
      foreach ($infomaterial->result() as $row){
        echo form_open_multipart('material/modificarbd');
      ?>
      <input type="hidden" name="idmaterial" value="<?php echo $row->idmaterial; ?>">
      <div class="mb-3">
          <label class="form-label">Material</label>
          <input type="text" class="form-control" name="nombreMaterial" value="<?php echo $row->nombreMaterial; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Stock (Unidades)</label>
          <input type="text" class="form-control" name="stock" value="<?php echo $row->stock; ?>">
      </div>
      <div class="mb-3">
          <label class="form-label">Precio de Compra</label>
          <input type="text" class="form-control" name="precioCompra" value="<?php echo $row->precioCompra; ?>">
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

     
