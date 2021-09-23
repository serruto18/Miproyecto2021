
<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary" id="btn-abrir-popup">Agregar Zona</button>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Departamento</th>
            <th scope="col">Provincia</th>
            <th scope="col">Distrito</th>
            <th scope="col">Otb</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
      <?php
      $indice=1;
      foreach ($zona->result() as $row) {
        ?>
        <tr>
          <th scope="row"><?php echo $indice; ?></th>
          <td><?php echo $row->departamento; ?></td>
          <td><?php echo $row->provincia; ?></td>
          <td><?php echo $row->distrito; ?></td>
          <td><?php echo $row->otb; ?></td>
          <td>
            <?php
              echo form_open_multipart('zonatrabajo/modificar');
            ?>
            
            <input type="hidden" name="idzonaTrabaja" value="<?php echo $row->idzonaTrabaja; ?>">
            <button type="submit" class="btn btn-primary btn xs">Modificar</button>
            <?php
              echo form_close();
            ?> 
          </td>
          <td>
            <?php
              echo form_open_multipart('usuario/modificar');
            ?>
            <input type="hidden" name="idzonaTrabaja" value="<?php echo $row->idzonaTrabaja; ?>">
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
            <h3>Formulario de Registro de Zona de Trabajo</h3>          
            <?php
              echo form_open_multipart('zonatrabajo/agregarbd');
            ?>      
              <div class="contenedor-inputs">
                <p><label class="name">Departamento: </label>
                <input type="text" name="departamento"></p>
                <p><label class="name">Provincia: </label>
                <input type="text" name="provincia"></p>
                <p><label class="name">Distrito: </label>
                <input type="text" name="distrito"></p> 
                <p><label class="name">otb: </label>
                <input type="text" name="otb"></p>  
              </div>
              <input type="submit" class="btn-submit" value="Agregar1">
              <?php
              echo form_close();
              ?>       
          </div>
  </div>
