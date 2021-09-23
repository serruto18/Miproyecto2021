<?php
foreach ($infoEmpleado->result() as $row) {
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
            <label class="name">Primer Apellido</label>
            <div class="value" ><?php echo $row->primerApellido; ?></div>
        </div>
        <div class="input">
            <label class="name">Segundo Apellido</label>
            <div class="value"><?php echo $row->segundoApellido; ?></div>
        </div>
        <div class="input">
            <label class="name">Nombres</label>
            <div class="value"><?php echo $row->nombre; ?></div>
        </div>
        <div class="input">
            <label class="name">Numero del Titulo</label>
            <div class="value"><?php echo $row->numeroTitulo; ?></div>
        </div>
        <div class="input">
            <label class="name">Telefono</label>
            <div class="value"><?php echo $row->telefono; ?></div>
        </div>
        <div class="input">
            <label class="name">Categoria</label>
            <div class="value"><?php echo $row->categoria; ?></div>
        </div>
        <div class="input">
            <label class="name">SubCategoria</label>
            <div class="value"><?php echo $row->subcategoria; ?></div>
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
              echo form_open_multipart('empleado/modificarbd');
            ?>
              <input type="text" name="idusuario" value="<?php echo $row->idusuario; ?>">
              <div class="contenedor-inputs">
                <label class="name">Primer Apellido: </label>
                <input type="text" name="primerApellido" value="<?php echo $row->primerApellido; ?>">
                <p><label class="name">Segundo Apellido: </label>
                <input type="text" name="segundoApellido" value="<?php echo $row->segundoApellido; ?>"></p>
                <p><label class="name">Nombres: </label>
                <input type="text" name="nombre" value="<?php echo $row->nombre; ?>"></p>
                <p><label class="name">Numero del titulo: </label>
                <input type="text" name="numeroTitulo" value="<?php echo $row->numeroTitulo; ?>"></p>
                <p><label class="name">Telefono o cel: </label>
                <input type="text" name="telefono" value="<?php echo $row->telefono; ?>"></p>
                <p><label class="name">categoria: </label>
                <input type="text" name="categoria" value="<?php echo $row->categoria; ?>"></p>
                <p><label class="name">Sub categoria: </label>
                <input type="text" name="subcategoria" value="<?php echo $row->subcategoria; ?>"></p>
                
              </div>
              <input type="submit" class="btn-submit" value="Modificar">
              <!--<input type="submit" class="btn-submit" value="CANCELAR">
              <button type="submit" class="btn btn-primary">Agregar</button>-->

              <?php
              echo form_close();
              ?>       
          </div>
  </div>






