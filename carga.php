
<!DOCTYPE html>
<html lang="en">
<?php require_once("secciones/headerCarga.php");?>
	<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<section class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Solicitudes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#!">Prestaciones</a></li>
                            <li class="breadcrumb-item">Cargar nueva</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        
        <div class="row">
            <!-- [ form-element ] start -->
            <form method="post">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Cargar Solicitud </h5>
                        <hr>
                      <?php 
                      	 if ($_SERVER["REQUEST_METHOD"] == "POST") {
                           $persona = ObtenerPersona();
                          insertarTurno($_POST["Paciente"], $_POST["Prestacion"], $persona["NOMBRE"].' '.$persona["APELLIDO"], $_POST["Fecha"] . ' ' . $_POST["Hora"], $_POST["Diagnostico"]);
                          }
                    
                      ?>


                        <form>

                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Indique el Paciente (*)
                                        </label>

                                        <select name="Paciente" class="form-control" id="exampleFormControlSelect1">
                                            <option>Selecciona una opción...</option>
                                            <?php
                                            $resultado = listarPacientes(); 
                                            while ($res = mysqli_fetch_assoc($resultado)) {

                                                 
                                    ?>
                                        <option value='<?php echo $res["IDPERSONA"]?>'><?php echo $res["NOMBRE"]. ' ' .$res["APELLIDO"]?></option>
                                        <?php
                                        }
                                    ?>
                                        </select>
                             
                                    </div>
                            </div>


                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Seleccione Prestación (*)</label>
                                        <select name="Prestacion" class="form-control" id="exampleFormControlSelect2">
                                            <option>Selecciona una opción...</option>
                                            <?php
                                            $resultado = listarPrestaciones(); 
                                            while ($res = mysqli_fetch_assoc($resultado)) { 
                                            ?>
                                            <option value="<?php echo $res["IDPRESTACION"]?>"><?php echo $res["PRESTACION"]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Ingrese el Diagnóstico</label>
                                        <textarea class="form-control" name="Diagnostico" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>

                            </div>
                            <div class="col-md-6">
                                    <label for="datepicker">Ingresa Fecha y Hora (*)</label>
                                <div class="col-md-3">
                                    <div class="md-form md-outline input-with-post-icon datepicker">
                                        <input class="form-control" type="date" name="Fecha" id="datepicker" placeholder="Selecciona fecha" >
                                    </div>
                               
                                    <div class="md-form md-outline input-with-post-icon datepicker" >
                                        <input class="form-control" name="Hora" placeholder="Selecciona hora" type="text" id="datetime" />
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-12">
                                    <button class="btn  btn-primary" type="submit">Registrar</button> 
                                    <input class="btn btn-secondary" type="reset" value="Limpiar datos">
                                    <a class="btn btn-light" href="index.html" role="button">Volver a Home</a>
                            </div>
                            
                        </div>
                        </form>
                       

                        <script>
                            $('#datetime').datetimepicker({
                                format: 'HH:mm:ss'
                            });
                        </script>
                    </div>
                </div>
            </div>
            <form>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>


</body>
<?php require_once("secciones/footercarga.php"); 

?>

</html>
