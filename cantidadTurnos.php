<?php 
                        // esto es para traer la cantidad de turnos que hay 
                                  if($persona["NIVEL"] == "Administrador")                 // ADMIN 
                                                 {
                                                    $resultadoP = listarTurnoAdmin();
                                                    $totalList = mysqli_num_rows($resultadoP);
                                      echo "Todas las prestaciones cargadas(" .  $totalList .")";
                                     }                                else if ($persona["NIVEL"] == "Medico"){ // MEDICO 
                                        $resultadoP = listarTurnosMedico($persona["NOMBRE"], $persona["APELLIDO"]); // Nombre y apellido del medico que esta logeado actualmente para ver todos sus turnos
                                        $totalList = mysqli_num_rows($resultadoP);
                                       echo "Mis prestaciones cargadas(" .  $totalList .")";
                                      }                                else if($persona["NIVEL"] == "Paciente"){ // paciente 
                                        $resultadoP = listarTurnosPaciente($persona["IDPERSONA"]);
                                        $totalList = mysqli_num_rows($resultadoP);
                                         echo "Mis turnos asignados (" .  $totalList .")";
                                     }   else if($persona["NIVEL"] == "Secretaria"){ // secretaria 
                                        $resultadoP = listarTurnoAdmin(); // uso el mismo metodo de admin porque trae todos los turnos y fue el primero que codifiqué
                                        $totalList = mysqli_num_rows($resultadoP);
                                        echo "Todas las prestaciones cargadas(" .  $totalList .")";
                                     }
                        
                        ?>