<?php
require_once("bdconexion.php");


$Persona = array();


function Login($email, $password)
{
        if (empty($email) && empty($password)) {
            echo '<div class="alert alert-info" role="alert">
                             Usuario y clave son requeridos.
                             </div>';
    }   else {
        $conn = conectarDB();
       if($conn != false)
       {
        $resultado = mysqli_query($conn, "SELECT p.IDPERSONA, p.NOMBRE, p.APELLIDO, n.NIVEL,p.DNI, p.FOTO, O.OBRA FROM persona p, obra_social o, nivel n WHERE p.IDOBRA = o.IDOBRA AND p.IDNIVEL = n.IDNIVEL AND p.EMAIL = '$email' AND p.CLAVE = '$password'
        ");
        $data = mysqli_fetch_array($resultado);
        if(!empty($data)){
            $persona["IDPERSONA"] = $data["IDPERSONA"];
            $persona["NOMBRE"] = $data["NOMBRE"];
            $persona["APELLIDO"] = $data["APELLIDO"];
            $persona["OBRA"] = $data["OBRA"];
            $persona["NIVEL"] = $data["NIVEL"];
            $persona["FOTO"] = $data["FOTO"];
            session_start();
            $_SESSION['persona'] = $persona;
         header('Location: index.php');

        } else {
            echo '<div class="alert alert-danger" role="alert">
            Los datos son incorrectos. Intenta nuevamente.
            </div>';
        }

       }
    {

    }
   
    }
}
 ?>