<?php
// Listar pacientes
$resultado = listarTurnoAdmin(); 
         $total = 0;
?> 
                        <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <!-- ver columnas y datos solicitados para cada nivel -->
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Paciente</th>
                                        <th>Obra social</th>
                                        <th>Solicitante</th>
                                        <th>Prestación</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                            <?php
                                              while ($res = mysqli_fetch_assoc($resultado)) {
                                               if ($res["ASISTIDO"] == 0) {
                                    ?>
                                                    <tr title="Este turno figura no asistido">
                                                    <?php
                                                } else if ($res["ASISTIDO"] == 1){
                                                    ?>
                                                    <tr class="table-warning" title="Este turno figura no asistido">
                                                    <?php
                                                } else if ($res["ASISTIDO"] == 3){
                                                    ?>
                                                    <tr class="table-sucess" title="Este turno figura asistido">
                                                    <?php
                                                }
               
                                                    ?>
                                                    <td><?php echo $res["IDTURNO"] ?></td>
                                                    <td><?php
                                                    $date = date("Y-m-d", strtotime($res["FECHATURNO"]));
                                                    $time = date("H:i:s", strtotime($res["FECHATURNO"]));
                                                    
                                                    
                                                    echo  $date?> <br>  <?php echo $time ?></td>
                                                    <td><?php echo $res["NOMBRE"] . " " . $res["APELLIDO"] ?></td>
                                                    <td><?php echo $res["OBRA"] ?></td>
                                                    <td>Dr/a. <?php echo $res["MEDICO"] ?></td>
                                                    <td><?php echo $res["PRESTACION"] ?> <br /> Monto a abonar: $<?php
                                                       $resultado1 = $res["PRECIO"] * ($res["PORCENTAJE"] / 100);
                                                       $resultado2 = $resultado1 + $res["PRECIO"];
                                                       if($res["COMPLEJIDAD"] == 1) // si es de complejidad muestra el porcentaje que se tiene que pagar
                                                       {
                                                        echo $resultado2;
                                                       }
                                                      $total = $total + $resultado2;
                                                         ?></td>
                                                         <td>
                                                          <a href="#!" title="Asistencia/Inasistencia Turno"><i class="icon feather icon-clock f-20  text-success"></i></a>
                                                          <a href="#!" title="Cancelar turno"><i class="feather icon-trash-2 ml-3 f-20 text-danger"></i></a>
                                                         </td>
                                                    </tr>
                                                    <?php
                                               } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
               </section>
