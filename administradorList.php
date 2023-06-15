<?php

$resultado = listarTurnoAdmin();
                                            $total = 0;
                                            $complejidad = 0;

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
                                                } else if ($res["ASISTIDO"] == 2){
                                                    ?>
                                                    <tr class="table-success" title="Este turno figura asistido">
                                                    <?php
                                                }

                                                if($res["COMPLEJIDAD"] == 1)
                                                {
                                                    $complejidad = $complejidad + 1; 
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
                                                    <td><?php echo $res["PRESTACION"] ?> <br /> 
                                                    
                                                   <?php
                                                       $resultado1 = $res["PRECIO"] * ($res["PORCENTAJE"] / 100);
                                                       $resultado2 = $resultado1 + $res["PRECIO"];
                                                       if($res["COMPLEJIDAD"] == 1)
                                                       {
                                                        echo " Monto a abonar: $";
                                                        echo $resultado2;
                                                       }
                                                     
                                                      $total = $total + $resultado2;
                                                        
                                                        
                                                    }?></td>
                                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- support-section start -->
                <div class="col-xl-6 col-md-12">
                    <div class="card flat-card">
                        <div class="row-table">
                            <div class="col-sm-6">
                                <div class="card prod-p-card background-pattern">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-0">
                                            <div class="col">
                                                <h6 class="m-b-5">Cantidad de Prestaciones Complejas</h6>
                                                <h3 class="m-b-0"><?php 
                                                echo $complejidad;
                                                ?> </h3>
                                            </div> 
                                            <div class="col-auto">
                                                <i class="fas fa-tags text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card prod-p-card bg-primary background-pattern-white">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-0">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Total Recaudación</h6>
                                                <h3 class="m-b-0 text-white">$ <?php echo $total?></h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill-alt text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
               </section>
