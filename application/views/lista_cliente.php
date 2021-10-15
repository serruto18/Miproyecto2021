
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
            <th scope="col">Codigo</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Nombres</th>
            <th scope="col">NUmero de C.I.</th>
            <th scope="col">Expedido</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
      <?php
      $indice=1;
      foreach ($cliente->result() as $row) {
        ?>
        <tr>
          <th scope="row"><?php echo $indice; ?></th>
          <td><?php echo $row->codigo; ?></td>
          <td><?php echo $row->primerApellido; ?></td>
          <td><?php echo $row->segundoApellido; ?></td>
          <td><?php echo $row->nombre; ?></td>
          <td><?php echo $row->numci; ?></td>
          <td><?php echo $row->ciudad; ?></td>
          <td><?php echo $row->direccion; ?></td>
          <td><?php echo $row->tel; ?></td>
          <td>
            <?php
              echo form_open_multipart('cliente/modificar');
            ?>
            
            <input type="hidden" name="idcliente" value="<?php echo $row->idcliente; ?>">
            <button type="submit" class="btn btn-primary btn xs">Modificar</button>
            <?php
              echo form_close();
            ?> 
          </td>
          <td>
            <?php
              echo form_open_multipart('cliente/eliminarbd');
            ?>
            <input type="hidden" name="idcliente" value="<?php echo $row->idcliente; ?>">
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
            <h3>Formulario de Registro de Instalador</h3>          
            <?php
              echo form_open_multipart('cliente/agregarbd');
            ?>      
              <div class="contenedor-inputs">
                <p><label class="name">Código: </label>
                <input type="text" name="codigo"></p>
                <p><label class="name">Primer Apellido: </label>
                <input type="text" name="primerApellido"></p>
                <p><label class="name">Segundo Apellido: </label>
                <input type="text" name="segundoApellido"></p>
                <p><label class="name">Nombres: </label>
                <input type="text" name="nombre"></p>
                <p><label class="name">Numero de C.I.: </label>
                <input type="text" name="numci"></p>
                <p><label class="name">Ciudad: </label>
                <input type="text" name="ciudad"></p>
                <p><label class="name">Direccion: </label>
                <input type="text" name="direccion"></p>
                <p><label class="name">Telefono: </label>
                <input type="text" name="tel"></p>          
              </div>
              <input type="submit" class="btn-submit" value="Agregar1">
              <?php
              echo form_close();
              ?>       
          </div>
  </div>
