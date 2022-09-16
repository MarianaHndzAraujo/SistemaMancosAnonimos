<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registro de Usuarios</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/registrousu.css">

  <?php
    session_start();
    $Usession= $_SESSION['usuarioS'];

    if ($Usession == null || $Usession == '') {
      echo '<script> alert("Acceso denegado: Inicia Sesion"); window.location="index.html"</script>';
    }
   ?>

   <script src="js/validadorInputs.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<a class="navbar-brand" href="#">Mancos Anonimos</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="MancosAnonimos.php">Inicio <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Usuarios
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="formUsuarios.php">Registro de Usuarios</a>
      <a class="dropdown-item" href="consultaUsuarios.php">Consulta de Usuarios</a>
    </div>
  </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        VideoJuegos
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="Videojuegos.php">Registro de Videojuegos</a>
        <a class="dropdown-item" href="consultaVJ.php">Consulta de Videojuegos</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="buscarVJ.php">Buscar VideoJuego</a>
      </div>
    </li>

  </ul>
  <form class="form-inline my-2 my-lg-0" method="post" action="controlador.php">
    <label class="text-light"> <?php echo $_SESSION['usuarioS'] ?> </label>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btncerrar">Cerrar Sesión</button>
  </form>
</div>
</nav>

    <h1 class="display-3 text-center"><b> Registro de Usuarios</b> </h1>

  <div class="container">

        <form class="contenerdorform mt-2" action="controlador.php"  method="POST" onsubmit="return vaciosRegistrar();">

            <div class="form-group">
              <label >Correo Electronico:</label>
              <input type="email" class="form-control" id="txtcorreo" name="txtcorreo">
            </div>


          <div class="form-group">
            <label> Contraseña:</label>
            <input type="password" class="form-control" id="txtpass" name="txtpass">
          </div>

          <div class="form-group">
            <label> Confirma contraseña:</label>
            <input type="password" class="form-control" id="txtcpass" name="txtcpass">
          </div>

          <div class="form-group">
            <label> Perfil:</label>
            <select class="form-control" name="selperfil" required >
              <option value>Elije...</option>
              <option >Empleado</option>
              <option>Administrador</option>
            </select>
          </div>


            <button type="submit" name="btnGusuario" class="btn btn-info btn-block">Guardar Usuario</button>


        </form>


  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>

</html>
