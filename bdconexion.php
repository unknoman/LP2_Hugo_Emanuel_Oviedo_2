<?php
function conectarDB()
{
    $server = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "lp2";
    $conn = mysqli_connect($server, $usuario, $password, $bd);
    if($conn != false)
    {
        return $conn;
    }
   return $conn;
}


function cerrarCon($conn){
    mysqli_close($conn);
}


?>