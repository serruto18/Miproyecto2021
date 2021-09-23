<?php
foreach ($infoEmpresa->result() as $row) {
?>

<input type="text" name="idusuario" value="<?php echo $row->idusuario; ?>">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <hr>
    <h3 class="fLeft">Información de la Empresa</h3>
    <div class="right">
        <p class="mb-0">
        <button type="submit" class="btn btn-primary" id="btn-abrir-popup">Editar iformación de la empresa</button>
      </p>
    </div>
    <div class="clear"></div>
    <hr>
        <div class="input">
            <label class="name">Razon Social</label>
            <div class="value" ><?php echo $row->razonsocial; ?></div>
        </div>
        <div class="input">
            <label class="name">Registro de la ANH</label>
            <div class="value"><?php echo $row->registroanh; ?></div>
        </div>
        <div class="input">
            <label class="name">Primer Apellido</label>
            <div class="value"><?php echo $row->primerApellidoRep; ?></div>
        </div>
        <div class="input">
            <label class="name">Segundo Apellido</label>
            <div class="value"><?php echo $row->segundoApellidoRep; ?></div>
        </div>
        <div class="input">
            <label class="name">Nombres</label>
            <div class="value"><?php echo $row->nombreRep; ?></div>
        </div>
        <div class="input">
            <label class="name">Dirección</label>
            <div class="value"><?php echo $row->direccion; ?></div>
        </div>
        <div class="input">
            <label class="name">Telefono</label>
            <div class="value"><?php echo $row->telefono; ?></div>
        </div>
</div>
<?php
}
?>
    <div class="overlay" id="overlay">
          <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><span class="fas fa-times-circle"></span></a>
            <h3>Formulario de Registro</h3>          
            <?php
              echo form_open_multipart('empresa/modificarbd');
            ?>
              <input type="text" name="idusuario" value="<?php echo $row->idusuario; ?>">
              <div class="contenedor-inputs">
                <label class="name">Razon Social: </label>
                <input type="text" name="razonsocial" value="<?php echo $row->razonsocial; ?>">
                <p><label class="name">Registro ANH: </label>
                <input type="text" name="registroanh" value="<?php echo $row->registroanh; ?>"></p>
                <p><label class="name">Primer Apellido: </label>
                <input type="text" name="primerApellidoRep" value="<?php echo $row->primerApellidoRep; ?>"></p>
                <p><label class="name">Segundo Apellido: </label>
                <input type="text" name="primerMaternoRep" value="<?php echo $row->segundoApellidoRep; ?>"></p>
                <p><label class="name">Nombres: </label>
                <input type="text" name="nombreRep" value="<?php echo $row->nombreRep; ?>"></p>
                <p><label class="name">Dirección: </label>
                <input type="text" name="direccion" value="<?php echo $row->direccion; ?>"></p>
                <p><label class="name">Número de celular: </label>
                <input type="text" name="telefono" value="<?php echo $row->telefono; ?>"></p>
                
              </div>
              <input type="submit" class="btn-submit" value="Modificar">
              <!--<input type="submit" class="btn-submit" value="CANCELAR">
              <button type="submit" class="btn btn-primary">Agregar</button>-->

              <?php
              echo form_close();
              ?>       
          </div>
  </div>






