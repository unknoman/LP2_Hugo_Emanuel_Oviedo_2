<?php 
require_once('bdconexion.php');
session_start();
function verificarSesion() : void
{
    // para saber si esta o no la sesion
    if(empty($_SESSION["persona"])){
        header("Location:login.php");
        exit();
    } 
}


function verificarSesionCarga() : void
{
    $persona = ObtenerPersona();
    // para saber si esta o no la sesion y si no es el medico 
    if(empty($_SESSION["persona"]) || $persona["NIVEL"] != "Medico"){
        // redirige al index.php y en caso de que no tenga una sesion desde el index se redirige al login(es por si se intenta acceder a la ruta carga con un usuario logeado que no es el medico)
        header("Location:index.php");
        exit();
    } 
}


function ObtenerPersona(){
   $array = $_SESSION["persona"];
   return $array;
}

// Funciones con sus consultas

// Listar turno admin
function listarTurnoAdmin(){
    $query = "select tur.IDTURNO, tur.MEDICO, tur.FECHATURNO, tur.ASISTIDO, per.NOMBRE, per.APELLIDO, pre.PRESTACION, pre.PRECIO, pre.PORCENTAJE, pre.COMPLEJIDAD, obr.OBRA
    from turno tur, persona per, prestacion pre, obra_social obr
    where tur.IDPERSONA = per.IDPERSONA
        and per.IDOBRA = obr.IDOBRA
        and tur.IDPRESTACION = pre.IDPRESTACION ORDER BY tur.FECHATURNO DESC
    ";
    $conn = conectarDB();
   $info = mysqli_query($conn, $query);
    // tengo entendido que es buena practica cerrar las conexiones de la bd por lo que las cierro siempre
    cerrarCon($conn);
   return $info;
}
// Listar turno Paciente
function listarTurnosPaciente($idPersona){
    $query = "select tur.IDTURNO, tur.MEDICO, tur.FECHATURNO, tur.ASISTIDO, per.NOMBRE, per.APELLIDO, pre.PRESTACION, pre.PRECIO, pre.PORCENTAJE, pre.COMPLEJIDAD, obr.OBRA
    from turno tur, persona per, prestacion pre, obra_social obr
    where tur.IDPERSONA = per.IDPERSONA
        and per.IDOBRA = obr.IDOBRA
        and tur.IDPRESTACION = pre.IDPRESTACION
        and tur.IDPERSONA = '$idPersona' ORDER BY tur.FECHATURNO DESC";
        $conn = conectarDB();
        $info = mysqli_query($conn, $query);
        cerrarCon($conn);
        return $info;
        
}

/// a este metodo se le pasa el nombre del medico para traer todos los turnos los cuales tiene ese medico
function listarTurnosMedico($Nombre, $Apellido){
    $query = "select tur.IDTURNO, tur.MEDICO, tur.FECHATURNO, tur.ASISTIDO, per.NOMBRE, per.APELLIDO, pre.PRESTACION, pre.PRECIO, pre.PORCENTAJE, pre.COMPLEJIDAD, obr.OBRA
    from turno tur, persona per, prestacion pre, obra_social obr
    where tur.IDPERSONA = per.IDPERSONA
        and per.IDOBRA = obr.IDOBRA
        and tur.IDPRESTACION = pre.IDPRESTACION
        and tur.MEDICO = CONCAT('$Nombre', ' ', '$Apellido') ORDER BY tur.FECHATURNO DESC";
        $conn = conectarDB();
        $info = mysqli_query($conn, $query);
        cerrarCon($conn);
        return $info;
        
}

function listarPacientes()
{
     $query = "select IDPERSONA, NOMBRE, APELLIDO FROM persona";
     $conn = conectarDB();
     $info = mysqli_query($conn, $query);
     cerrarCon($conn);
     return $info;
}


function listarPrestaciones(){
    $query = "select IDPRESTACION, PRESTACION FROM prestacion";
    $conn = conectarDB();
    $info = mysqli_query($conn, $query);
    cerrarCon($conn);
    return $info;
}

function insertarTurno($PERSONA, $PRESTACION, $MEDICO, $FECHATURNO, $DIAGNOSTICO){
    if(empty(trim($PERSONA)) || empty(trim($PRESTACION)) || empty(trim($FECHATURNO)))
    {
        ?>
                         <div class="alert alert-info" role="alert">
                         <i data-feather="info"></i> 
							Los campos con * son obligatorios. 
						</div>
        <?php
    
    }  else if(!empty($PERSONA) && !empty($PRESTACION) && !empty($MEDICO) && !empty($FECHATURNO) )
    {
        $query = "INSERT INTO `turno`(`IDPERSONA`, `IDPRESTACION`, `MEDICO`, `FECHACONSULTA`, `FECHATURNO`, `DIAGNOSTICO`, `ASISTIDO`) VALUES ('$PERSONA','$PRESTACION','$MEDICO',CURRENT_TIMESTAMP(),'$FECHATURNO','$DIAGNOSTICO', 0)";
        $conn = conectarDB();
         mysqli_query($conn, $query);
        if(mysqli_affected_rows($conn) > 0 ){
            cerrarCon($conn);
            ?>
                              <div class="alert alert-success" role="alert">
                              <i data-feather="check-circle"></i> 
                                  Se han registrado los datos ingresados. 
                              </div>
            <?php
          }
    } 
}

?>
