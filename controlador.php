<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title> Controlador </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <?php
      require 'funcionesBD.php';
      if( isset( $_POST[ 'btningresar' ]) ){

        $usu= $_POST[ 'txtusuario' ];
        $cont= $_POST[ 'txtpass' ];

        $status= validarUsuario($usu,$cont);

        if($status === 1){

          session_start();
          $_SESSION['usuarioS']= $usu;

          echo "<script> alert('Bienvenido a Mancos anonimos'); window.location='MancosAnonimos.php'</script>";

        }else{
          echo "<script> alert('Revisa tus credenciales'); window.location='index.html' </script>";
        }
      }

      if( isset( $_POST[ 'btnGusuario' ]) ){
        $usu= $_POST[ 'txtcorreo' ];
        $cont= $_POST[ 'txtpass' ];
        $confi= $_POST[ 'txtcpass' ];
        $per= $_POST[ 'selperfil' ];

        if ( $cont === $confi ) {
          $status= guardarUsuario($usu,$cont,$per);

          if ($status === 1) {
            echo "<script> alert('Usuario Guardado en BD'); window.location='formUsuarios.php'</script>";
          } else {
            echo "<script> alert('Usuario NO Guardado en BD'); window.location='formUsuarios.php'</script>";
          }

        } else {
          echo "<script> alert('Contraseñas no coinciden'); window.location='formUsuarios.php' </script>";
        }
      }

      if(isset($_POST[ 'btnElimina'])){

        $idE= $_POST[ 'txtidElimina'];

        $stat= eliminarU($idE);
        if ( $stat === 1) {
          echo "<script> alert( 'Usuario eliminado en BD' ); </script>";
          echo "<script> window.location='consultaUsuarios.php ';</script>";

        } else {
          echo "<script> alert( 'Usuario no eliminado' ); </script>";
          echo "<script> window.location='consultaUsuarios.php'; </script>";
        }
      }

        if(isset($_POST[ 'btnRegreso'])){
          echo "<script> alert( 'Regresando' ); </script>";
          echo "<script> window.location='consultaUsuarios.php'; </script>";
        }

        if(isset($_POST[ 'btncerrar'])){
          session_start();
          session_destroy();
          echo '<script> window.location="index.html"; </script>';
        }

        if( isset( $_POST[ 'btnGvideojuegos' ]) ){
          $nombre= $_POST[ 'txtnombrev' ];
          $consola= $_POST[ 'txtconsola' ];
          $precioA= $_POST[ 'txtprecioa' ];
          $precioV= $_POST[ 'txtpreciov' ];


            $status= guardarVideojuego($nombre,$consola,$precioA,$precioV);

            if ($status === 1) {
              echo "<script> alert('VideoJuego Guardado en BD'); window.location='Videojuegos.php'</script>";
            } else {
              echo "<script> alert('VideoJuego NO Guardado en BD'); window.location='Videojuegos.php'</script>";
            }
        }

        if(isset($_POST[ 'btnEliminaV'])){

          $idE= $_POST[ 'txtidEliminaV'];

          $stat= eliminarV($idE);
          if ( $stat === 1) {
            echo "<script> alert( 'VideoJuego eliminado en BD' ); </script>";
            echo "<script> window.location='consultaVJ.php ';</script>";

          } else {
            echo "<script> alert( 'VideoJuego no eliminado' ); </script>";
            echo "<script> window.location='consultaVJ.php'; </script>";
          }
        }

          if(isset($_POST[ 'btnRegresoV'])){
            echo "<script> alert( 'Regresando' ); </script>";
            echo "<script> window.location='consultaVJ.php'; </script>";
          }

          if( isset( $_POST[ 'btnAvideojuegos' ]) ){
            $idV= $_POST[ 'txtidActualizar'];
            $nombre= $_POST[ 'txtnombrev' ];
            $consola= $_POST[ 'txtconsola' ];
            $precioA= $_POST[ 'txtprecioa' ];
            $precioV= $_POST[ 'txtpreciov' ];


              $status= actualizarVideojuego($idV,$nombre,$consola,$precioA,$precioV);

              if ($status === 1) {
                echo "<script> alert('VideoJuego Actualizado correctamente en BD'); window.location='consultaVJ.php'</script>";
              } else {
                echo "<script> alert('VideoJuego NO Actualizado en BD'); window.location='consultaVJ.php'</script>";
              }
          }



     ?>
  </body>
</html>
