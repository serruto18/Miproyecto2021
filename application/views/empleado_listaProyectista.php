
<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary" id="btn-abrir-popup">Agregar proyectista</button>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Nombres</th>
            <th scope="col">Numero de titulo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Categoria</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
      <?php
      $indice=1;
      foreach ($empleado->result() as $row) {
        ?>
        <tr>
          <th scope="row"><?php echo $indice; ?></th>
          <td><?php echo $row->primerApellido; ?></td>
          <td><?php echo $row->segundoApellido; ?></td>
          <td><?php echo $row->nombre; ?></td>
          <td><?php echo $row->numeroTitulo; ?></td>
          <td><?php echo $row->telefono; ?></td>
          <td><?php echo $row->subcategoria; ?></td>
          <td>
            <?php
              echo form_open_multipart('empleado/modificar');
            ?>
            
            <input type="hidden" name="idempleado" value="<?php echo $row->idempleado; ?>">
            <button type="submit" class="btn btn-primary btn xs">Modificar</button>
            <?php
              echo form_close();
            ?>
          </td>
          <td>
            <?php
              echo form_open_multipart('empleado/eliminarProyectistabd');
            ?>
            <input type="hidden" name="idempleado" value="<?php echo $row->idempleado; ?>">
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
            <h3>Formulario de Registro de Proyectista</h3>          
            
            <?php
              echo form_open_multipart('empleado/agregarbd');
            ?>       
                <div class="contenedor-inputs">
                <label class="name">Primer Apellido: </label>
                <input type="text" name="primerApellido">
                <p><label class="name">Segundo Apellido: </label>
                <input type="text" name="segundoApellido"></p>
                <p><label class="name">Nombres: </label>
                <input type="text" name="nombre" value=""></p>
                <p><label class="name">Numero del titulo: </label>
                <input type="text" name="numeroTitulo"></p>
                <p><label class="name">Numero de celular: </label>
                <input type="text" name="telefono"></p>
                <p><label class="name">Cargo en la empresa: </label>
                <select type="hidden" name="categoria">
                  <option  value="proyectista">Proyectista</option>
                </select>
                <select name="subcategoria">
                  <option value="proyectista1">Proyectista 1</option>
                  <option value="proyectista2">Proyectista 2</option>
                </select>
                
                
              </div>
              <input type="submit" class="btn-submit" value="Agregar">
              <?php
              echo form_close();
              ?>       
          </div>
  </div>

