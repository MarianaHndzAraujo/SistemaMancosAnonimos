<?php
  function conectarBD(){
    $servidor="localhost";
    $baseDatos="bdmancos";
    $usuario="root";
    $contra="";

    $conexion=mysqli_connect($servidor,$usuario,$contra,$baseDatos)or die("No se pudo conectar");
    return $conexion;
  }

  function validarUsuario($usu,$cont){
    $conex=conectarBD();
    $consulta="select pass from tbusuarios where usuario='$usu'";

    try{
      $rsval= mysqli_query($conex,$consulta);
      $numerg= mysqli_num_rows($rsval);
      $regBd= mysqli_fetch_array($rsval);
      mysqli_close($conex);

      if( ( $numerg == 1 ) && ( $cont === $regBd['pass'] ) ){
        $status=1;

      }else{
          $status=0;

        }
        return $status;


    }catch(Exception $e){
      die('exception captura:'. $e->getMessage());
    }
  }

  function guardarUsuario($usu,$cont,$per){

    $conex= conectarBD();
    $insertU="insert into tbusuarios(usuario,pass,perfil) values(?,?,?)";
    try {
      $stmt=$conex->prepare($insertU);
      $stmt->bind_param('sss',$usu,$cont,$per);
      $stmt-> execute();

      $stmt->close();
      mysqli_close($conex);

      $status=1;
      return $status;

    } catch (Exception $e) {
      die('exception captura:'. $e->getMessage());
    }

  }

  function consultaUsuarios(){
    $conex= conectarBD();
    $selectU= "select * from tbusuarios";

    try {
      $rsUsuarios= mysqli_query($conex,$selectU);
      mysqli_close($conex);

      return $rsUsuarios;

    } catch (Exception $e) {
      die('exception captura:'. $e->getMessage());
    }

  }

  function eliminarU($idE){
    $conex= conectarBD();
    $deleteU="delete from tbusuarios where idUsuario= ?";

    try {
      $stmt = $conex->prepare($deleteU);
      $stmt -> bind_param('i',$idE);
      $stmt -> execute();
      $stmt -> close();
      mysqli_close($conex);

      $status=1;
      return $status;

    } catch (Exception $e) {
        die('exception al eliminar:'. $e->getMessage());
    }

  }

  function guardarVideojuego($nombre,$consola,$precioA,$precioV){

    $conex= conectarBD();
    $insertV="insert into tbvideojuegos(nombreV,consola,precioA,precioV) values(?,?,?,?)";
    try {
      $stmt=$conex->prepare($insertV);
      $stmt->bind_param('ssdd',$nombre,$consola,$precioA,$precioV);
      $stmt-> execute();

      $stmt->close();
      mysqli_close($conex);

      $status=1;
      return $status;

    } catch (Exception $e) {
      die('exception captura:'. $e->getMessage());
    }

  }

  function consultaVJ(){
    $conex= conectarBD();
    $selectV= "select * from tbvideojuegos";

    try {
      $rsVideojuegos= mysqli_query($conex,$selectV);
      mysqli_close($conex);

      return $rsVideojuegos;

    } catch (Exception $e) {
      die('exception captura:'. $e->getMessage());
    }

  }

  function eliminarV($idE){
    $conex= conectarBD();
    $deleteV="delete from tbvideojuegos where idV= ?";

    try {
      $stmt = $conex->prepare($deleteV);
      $stmt -> bind_param('i',$idE);
      $stmt -> execute();
      $stmt -> close();
      mysqli_close($conex);

      $status=1;
      return $status;

    } catch (Exception $e) {
        die('exception al eliminar:'. $e->getMessage());
    }

  }


  function actualizarVideojuego($idV,$nombre,$consola,$precioA,$precioV){

    $conex= conectarBD();
    $updateV="update tbvideojuegos set nombreV='$nombre',consola='$consola',precioA='$precioA',precioV='$precioV' where idV='$idV'";
    try {
      $stmt=$conex->prepare($updateV);
      $stmt-> execute();

      $stmt->close();
      mysqli_close($conex);

      $status=1;
      return $status;

    } catch (Exception $e) {
      die('exception captura:'. $e->getMessage());
    }

  }

  



 ?>
