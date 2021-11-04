
<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
      
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
          <td><?php echo $row->carnet; ?></td>
          <td><?php echo $row->ciudad; ?></td>
          <td><?php echo $row->direccion; ?></td>
          <td><?php echo $row->telefono; ?></td>
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

