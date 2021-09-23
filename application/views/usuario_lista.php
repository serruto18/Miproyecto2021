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