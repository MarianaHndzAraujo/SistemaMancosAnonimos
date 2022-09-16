<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title> Confirmación de Eliminar </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/eliminar.css">

    <?php
      session_start();
      $Usession= $_SESSION['usuarioS'];

      if ($Usession == null || $Usession == '') {
        echo '<script> alert("Acceso denegado: Inicia Sesion"); window.location="index.html"</script>';
      }
     ?>
  </head>
  <body>

      <h1 class="display-3 text-center"  style="color:dark;"><b> ¿Seguro que Eliminaras?</b> </h1>

      <div class="container">

        <form class="contenerdorform mt-5"  action="controlador.php" method="post">

          <div class="form-group">
            <label><b><h3>VideoJuego: </h3></b></label>
            <label><h3><?php echo $_REQUEST['vjR'] ?> </h3></label>
          </div>

          <input type="hidden" name="txtidEliminaV" value="<?php echo $_REQUEST['idR'] ?>">

          <button type="submit" name="btnEliminaV" class="btn btn-danger ">Si, Eliminar </button>
          <button type="submit" name="btnRegresoV" class="btn btn-warning">No, Regresar </button>

        </form>
      </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


  </body>
</html>
