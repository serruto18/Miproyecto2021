

<?php
foreach ($costo->result() as $row) {
?>

<input type="text" name="idexcedente" value="<?php echo $row->idexcedente; ?>">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <hr>
    <h3 class="fLeft">Información de Excedente del Cliente</h3>
    <div class="right">
        <p class="mb-0">
        <button type="submit" class="btn btn-primary" id="btn-abrir-popup">Editar Excedente</button>

        <?php
            echo form_open_multipart('zonatrabajo/verlista');
        ?>
            <input type="hidden" name="idcliente" value="<?php echo $row->idcliente; ?>">
            <button type="submit" class="btn btn-primary btn xs">Volver</button>
        <?php
            echo form_close();
        ?>
        <a target= "_blank" href="<?php echo base_url();?>index.php/excedente/excedentepdf?idcliente=<?php echo $row->idcliente;?>">
            <button class="btn btn-success btn-block">Imprimir excedente</button>
        </a>
      </p>
    </div>
    <div class="clear"></div>
    <hr>
        <div class="input">

            <label class="name">Precio a cancelar de tuberia de 3/4" de <?php echo $row->distanciatrescuartos; ?> metro(s)</label>
            <div class="value" >
                <?php
                if ($row->distanciatrescuartos < 22) {
                    echo "No tiene Excedente en tuberia de 3/4";
                }
                else{
                    echo $row->costotrescuartos." Bs.";    
                }
                ?>
            </div>
        </div>
        <div class="input">
            <label class="name">Precio a cancelar de tuberia de 1" de <?php echo $row->distanciaunapulgada; ?> metro(s)</label>
            <div class="value">
                <?php
                if ($row->distanciaunapulgada ==0) {
                    echo 'No tiene Excedente en tuberia de 1"';
                }
                else{
                    echo $row->costounapulgada." Bs.";    
                }
                ?>
            </div>
        </div>
        <div class="input">
            <label class="name">Precio a cancelar por tuberia enterrada de <?php echo $row->distanciaenterrado; ?> metro(s)</label>
            <div class="value">
                <?php
                if ($row->distanciaenterrado < 4 or $row->distanciaenterrado < 4) {
                    echo "No tiene Excedente en tuberia Enterrada";
                }
                else{
                    echo $row->costoenterrado." Bs.";    
                }
                ?>
            </div>
        </div>
        <div class="input">
            <label class="name">Precio a cancelar por tuberia empotrada de <?php echo $row->distanciaempotrado; ?> metro(s)</label>
            <div class="value">
                <?php
                if ($row->distanciaempotrado < 4 && $row->distanciaenterrado < 4) {
                    echo "No tiene Excedente en tuberia Enterrada";
                }
                else{
                    echo $row->costoempotrado." Bs.";    
                }
                ?>
            </div>
        </div>
        <div class="input">
            <label class="name">Precio total a cancelar</label>
            <div class="value"><?php echo $row->precioTotal." Bs."; ?></div>
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
              echo form_open_multipart('excedente/modificarbd');
            ?>
              <input type="hidden" name="idexcedente" value="<?php echo $row->idexcedente; ?>">
              <input type="hidden" name="idcliente" value="<?php echo $row->idcliente; ?>">
              <div class="contenedor-inputs">
                <label class="name">Insertar la distancia de la tuberia de 3/4": </label>
                <input type="text" name="distanciatrescuartos" value="<?php echo $row->distanciatrescuartos; ?>">
                <p><label class="name">Insertar la distancia de la tuberia de 1": </label>
                <input type="text" name="distanciaunapulgada" value="<?php echo $row->distanciaunapulgada; ?>"></p>
                <p><label class="name">Insertar la distancia de la tuberia enterrada: </label>
                <input type="text" name="distanciaenterrado" value="<?php echo $row->distanciaenterrado; ?>"></p>
                <p><label class="name">Insertar la distancia de la tuberia empotrada: </label>
                <input type="text" name="distanciaempotrado" value="<?php echo $row->distanciaempotrado; ?>"></p>                
              </div>
              <input type="submit" class="btn-submit" value="Modificar">
              <!--<input type="submit" class="btn-submit" value="CANCELAR">
              <button type="submit" class="btn btn-primary">Agregar</button>-->

              <?php
              echo form_close();
              ?>       
          </div>
  </div>






