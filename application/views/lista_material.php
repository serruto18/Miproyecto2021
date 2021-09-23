
<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary" id="btn-abrir-popup">Agregar Cliente</button>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Material</th>
            <th scope="col">Stock (Unidad)</th>
            <th scope="col">Precio de compra</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
      <?php
      $indice=1;
      foreach ($material->result() as $row) {
        ?>
        <tr>
          <th scope="row"><?php echo $indice; ?></th>
          <td><?php echo $row->nombreMaterial; ?></td>
          <td><?php echo $row->stock; ?></td>
          <td><?php echo $row->precioCompra; ?></td>
          <td>
            <?php
              echo form_open_multipart('material/modificar');
            ?>
            
            <input type="hidden" name="idmaterial" value="<?php echo $row->idmaterial; ?>">
            <button type="submit" class="btn btn-primary btn xs">Modificar</button>
            <?php
              echo form_close();
            ?> 
          </td>
          <td>
            <?php
              echo form_open_multipart('usuario/modificar');
            ?>
            <input type="hidden" name="idmaterial" value="<?php echo $row->idmaterial; ?>">
            <button type="submit" class="btn btn-primary btn xs">Eliminar</button>
            <?php
              echo form_close();
            ?> 
          </td>
        </tr>
        <?php
        $indice++;
      }
      ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

     

<div class="overlay" id="overlay">
          <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><span class="fas fa-times-circle"></span></a>
            <h3>Formulario de Registro de Material</h3>          
            <?php
              echo form_open_multipart('material/agregarbd');
            ?>      
              <div class="contenedor-inputs">
                <p><label class="name">Material: </label>
                <input type="text" name="nombreMaterial"></p>
                <p><label class="name">Stock: </label>
                <input type="text" name="stock"></p>
                <p><label class="name">Precio de Compra: </label>
                <input type="text" name="precioCompra"></p>   
              </div>
              <input type="submit" class="btn-submit" value="Agregar1">
              <?php
              echo form_close();
              ?>       
          </div>
  </div>
