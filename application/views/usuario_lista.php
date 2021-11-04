<div class="content-wrapper">
    <!-- Content Header (Page header) -->    
<div class="conteiner">
  <div class="row">
    <div class="col-md-12">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Password</th>
      <th scope="col">Rol</th>
      <th scope="col">Cambiar Password</th>
      <th scope="col">Eliminar usuario</th>
    </tr>
  </thead>
  <tbody>
<?php
$indice=1;
foreach ($usuario->result() as $row) {
  ?>
  <tr>
    <th scope="row"><?php echo $indice; ?></th>
    <td><?php echo $row->login; ?></td>
    <td><?php echo $row->pass; ?></td>
    <td><?php echo $row->rol; ?></td>
    <td>
            <?php
              echo form_open_multipart('usuario/modificar');
            ?>
            
            <input type="hidden" name="idusuario" value="<?php echo $row->idusuario; ?>">
            <button type="submit" class="btn btn-primary btn xs">Modificar</button>
            <?php
              echo form_close();
            ?>
    </td>
    <td>
            <?php
              $parametros=array('name'=>'formulario'.$indice,'id'=>'form1');
              echo form_open_multipart('usuario/elimiarbd',$parametros);
            ?>
            <input type="hidden" name="idusuario" value="<?php echo $row->idusuario; ?>">
            <button type="button" id="boton1" class="btn btn-primary btn xs" onclick="eliminar (<?php echo $indice; ?>);">Eliminar</button>
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

<script src="<?php echo base_url(); ?>//cdn.jsdelivr.net/npm/sweetalert2@11"></script><!-- para los mensajes de confirmacion -->
<script src="<?php echo base_url(); ?>package/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url(); ?>sweetAlert.js"></script>