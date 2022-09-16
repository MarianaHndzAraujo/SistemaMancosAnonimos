<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title> Buscar Videojuegos </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/consulta.css">

    <?php
      session_start();
      $Usession= $_SESSION['usuarioS'];

      if ($Usession == null || $Usession == '') {
        echo '<script> alert("Acceso denegado: Inicia Sesion"); window.location="index.html"</script>';
      }
     ?>

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

<h1 class="display-3 text-center" style="color:dark;"><b>Buscar VideoJuegos</b></h1>

<div class="container mt-5">

  <form class="contenerdorform mt-5"  action="" method="POST" onsubmit="return vaciosLogin();">

    <div class="form-group">
      <input type="text" class="form-control" id="txtbv" name="txtbv" placeholder="Escribe VideoJuego">
      <button type="submit" name="btnbv" class="btn btn-info btn-block"> Buscar por VideoJuego </button>
    </div>

    <div class="form-group">

      <select class="form-control" name="selconsola">
      <option value>Elije Consola...</option>

      <?php
        require 'funcionesBD.php';
        $rsVideojuegos= consultaVJ();

          while ($valores = mysqli_fetch_array($rsVideojuegos)) {
            echo "<option value='".$valores['consola']."'>".$valores['consola']."</option>";
          }
          echo "</select>";


    echo "<button type='submit' name='btnbc' class='btn btn-info btn-block'> Buscar por Consola </button>
    </div>
  </form>

  <table class='table table-hover'>
    <thead class='thead-light'>
      <tr>
        <th scope='col'>Nombre VideoJuego</th>
        <th scope='col'>Consola</th>
        <th scope='col'>Precio Adquiaición</th>
        <th scope='col'>Precio Venta</th>

      </tr>
    </thead>
    <tbody>" ;

          $conex=conectarBD();
          if(isset($_POST[ 'btnbv' ])){
            $nombreV=$_POST[ 'txtbv' ];
            $query=mysqli_query($conex, "select * from tbvideojuegos where nombreV='$nombreV'");
            $row=mysqli_num_rows($query);
            if($row>0){
              while($fetch=mysqli_fetch_array($query)){
                echo"<tr>
                  <td>".$fetch['nombreV']."</td>
                  <td>".$fetch['consola']."</td>
                  <td>".$fetch['precioA']."</td>
                  <td>".$fetch['precioV']."</td>
                  </tr>";
                }
              }else{
                echo'
                <tr>
                <td colspan = "4"><center>VideoJuego no Existe en la BD</center></td>
                </tr>';
                echo "<script>alert('VideoJuego no Existe en la BD')</script>";
              }
            }else{
              if(isset($_POST[ 'btnbc' ])){
                $consola=$_POST[ 'selconsola' ];
                $query=mysqli_query($conex, "select * from tbvideojuegos where consola='$consola'");
                $row=mysqli_num_rows($query);
                if($row>0){
                  while($fetch=mysqli_fetch_array($query)){
                    echo"<tr>
                      <td>".$fetch['nombreV']."</td>
                      <td>".$fetch['consola']."</td>
                      <td>".$fetch['precioA']."</td>
                      <td>".$fetch['precioV']."</td>
                      </tr>";
                    }
                  }else{
                    echo'
                    <tr>
                    <td colspan = "4"><center>VideoJuego no Existe en la BD</center></td>
                    </tr>';
                  echo "<script>alert('VideoJuego no Existe en la BD')</script>";
                  }

                }

            }

      ?>
      </tbody>
    </table>

  </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
