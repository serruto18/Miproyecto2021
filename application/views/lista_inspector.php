
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
            <th scope="col">Primer Apelldio: </th>
            <th scope="col">Segundo Apellido: </th>
            <th scope="col">Nombres: </th>
            <th scope="col">Descripcion: </th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
      <?php
      $indice=1;
      foreach ($inspector->result() as $row) {
        ?>
        <tr>
          <th scope="row"><?php echo $indice; ?></th>
          <td><?php echo $row->primerApellido; ?></td>
          <td><?php echo $row->segundoApellido; ?></td>
          <td><?php echo $row->nombre; ?></td>
          <td><?php echo $row->descripcion; ?></td>
          <td>
            <?php
              echo form_open_multipart('inspector/modificar');
            ?>
            
            <input type="hidden" name="idinspector" value="<?php echo $row->idinspector; ?>">
            <button type="submit" class="btn btn-primary btn xs">Modificar</button>
            <?php
              echo form_close();
            ?> 
          </td>
          <td>
            <?php
              echo form_open_multipart('inspector/eliminarbd');
            ?>
            <input type="hidden" name="idinspector" value="<?php echo $row->idinspector; ?>">
            <button type="submit" class="btn btn-primary btn xs" onclick="eliminar();">Eliminar</button>
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
            <h3>Formulario de Registro de Inspector</h3>          
            <?php
              echo form_open_multipart('inspector/agregarbd');
            ?>      
              <div class="contenedor-inputs">
                <p><label class="name">Primer Apellido: </label>
                <input type="text" name="primerApellido"></p>
                <p><label class="name">Segundo Apellido: </label>
                <input type="text" name="segundoApellido"></p>
                <p><label class="name">Nombres: </label>
                <input type="text" name="nombre"></p>
                <p><label class="name">Descripcion: </label>
                <input type="text" name="descripcion"></p>  
              </div>
              <button type="submit" class="btn btn-primary" onclick="positvoInspector();">Agregar</button>
              
              <?php
              echo form_close();
              ?>       
          </div>
  </div>
