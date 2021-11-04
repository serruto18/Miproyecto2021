<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SisteGas</title>

  <!-- Google Font: Source Sans Pro -->
  <style>
    body{
      background-image: url("<?php echo base_url(); ?>img/imagen5.jpg");  
      background-size: cover;
      background-repeat: no-repeat;
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      height: 100%;
      margin: auto;
    }
  </style>


  <!-- Para sesion -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>estilos1.css">


</head>
<body class="hold-transition login-page" >


<div class="login-box" >
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
  	<?php
            switch ($msg) {
              case '1':
                $mensaje="Error de ingreso";
                break;
              case '2':
                $mensaje="Acceso no valido";
                break;
              case '3':
                $mensaje="Gracias por usar el sistema";
                break;
              case '4':
                $mensaje="Algun campo esta vacio, ingrese datos correctos";
                break;
              default:
                $mensaje="Ingrese sus datos";
                break;
            }
    ?>
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Siste</b>GAS</a>
    </div>
    <div class="card-body">
      <?php
              echo form_open_multipart('usuario/validarusuario');     
        ?>
      <p class="login-box-msg"><?php echo $mensaje; ?></p>

      <form action="vistaLogin.php" method="POST">

        <?php
          if (isset($_POST['login'])) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $campos=array();
            if ($login == "") {
              array_push($campos, "El campo no puede estar vacio");
            }
            if ($pass =="") {
              array_push($campos, "El campo no puede estar vacio");
            }
            if (count($campos) > 0) {
              echo "<div class='error'>";
              for ($i=0; $i <count($campos) ; $i++) { 
                echo "<li>".$campos[$i]."</li>";
              }
            }else{

            }
            echo "</div>";
          }
        ?>

        
        <div class="input-group mb-3">       
          <input type="text" class="form-control" name="login" placeholder="Login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tie"></span>        
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>

        

      </form>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="register.html" class="text-center" id="btn-abrir-popup">Registrar nueva empresa</a>
      </p>

      <?php
              echo form_close();
        ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <div class="overlay" id="overlay">
          <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><span class="fas fa-times-circle"></span></a>
            <h3>Formulario de Registro</h3>          
            <?php
              echo form_open_multipart('empresa/agregarbd');

              ?>
              
              <div class="contenedor-inputs">
                
                <input type="text" name="razonsocial" placeholder="Razon Social">
                <input type="text" name="registroanh" placeholder="Registro ANH">
                <input type="text" name="primerApellidoRep" placeholder="Apellido Paterno del representante legal">
                <input type="text" name="primerMaternoRep" placeholder="Apellido Materno del representante legal">
                <input type="text" name="nombreRep" placeholder="Nombres del representante legal">
                <input type="text" name="direccion" placeholder="Dirección">
                <input type="text" name="telefono" placeholder="Telefono">
                <select name="rol">
                  <option value="admin">empresa</option>
                </select>
              </div>
              <input type="submit" class="btn-submit" value="REGISTRAR">
              <!--<input type="submit" class="btn-submit" value="CANCELAR">
              <button type="submit" class="btn btn-primary">Agregar</button>-->

              <?php
              echo form_close();
              ?>
            
            
          </div>
  </div>




</div>

<script src="<?php echo base_url(); ?>popup2.js"></script>

<script src="<?php echo base_url(); ?>adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>adminlte/dist/js/adminlte.min.js"></script>



</body>
</html>