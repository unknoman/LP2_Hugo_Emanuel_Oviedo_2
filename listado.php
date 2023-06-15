<!DOCTYPE html>
<html lang="en">

<?php require_once("secciones/encabezadoListado.php");?>
<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Mobile header ] start -->
    <div class="pc-mob-header pc-header">
        <div class="pcm-logo">
            <img src="assets/images/logo.svg" alt="" class="logo logo-lg">
        </div>
        <div class="pcm-toolbar">
            <a href="#!" class="pc-head-link" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <!-- <i data-feather="menu"></i> -->
            </a>

            <a href="#!" class="pc-head-link" id="header-collapse">
                <i data-feather="more-vertical"></i>
            </a>
        </div>
    </div>
    <!-- [ Mobile header ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pc-sidebar ">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="index.html" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="assets/images/logo.svg" alt="" class="logo logo-lg">
                    <img src="assets/images/logo-sm.svg" alt="" class="logo logo-sm">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Navegación</label>

                    </li>


                    <li class="pc-item pc-caption">
                        <label>Prestaciones</label>
                    </li>

                   <?php 
                   if($persona["NIVEL"] == "Medico")
                   {
                    ?>
                    <li class="pc-item"><a href="carga.php" class="pc-link ">
                            <span class="pc-micon"><i data-feather="layout"></i></span>
                            <span class="pc-mtext">Cargar nueva</span></a>
                    </li>
                         <?php
                   }

           ?>

                    <li class="pc-item pc-caption">
                        <label>Listados</label>
                    </li>
                    <li class="pc-item"><a href="listado.php" class="pc-link ">
                            <span class="pc-micon"><i data-feather="list"></i></span>
                            <span class="pc-mtext">Listado total</span></a>
                        <!--
                        <span class="pc-mtext">Listado mis turnos</span></a>
                        <span class="pc-mtext">Listado de mis cargas</span></a>
                        -->
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="pc-header ">
        <div class="header-wrapper">

            <div class="ml-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i data-feather="search"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-search">
                            <form class="px-3">
                                <div class="form-group mb-0 d-flex align-items-center">
                                    <i data-feather="search"></i>
                                    <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/user/<?php echo $persona['FOTO']?>" alt="user-image" class="user-avtar">
                            <span>
                                <span class="user-name"><?php

                                                        echo $persona["NOMBRE"] . " " . $persona["APELLIDO"];
                                                        ?></span>
                                <span class="user-desc"><?php echo $persona["NIVEL"];
                                                        ?></span></span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
                            <div class=" dropdown-header">
                                <h6 class="text-overflow m-0">Bienvenido!</h6>
                            </div>
                            <a href="#!" class="dropdown-item">
                                <i data-feather="user"></i>
                                <span>Mis Datos</span>
                            </a>
                            <a href="cerrarSesion.php" class="dropdown-item">
                                <i data-feather="power"></i>
                                <span>Cerrar sesión</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </header>

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
                                <h5 class="m-b-10">Prestaciones</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#!">Listados</a></li>
                                <li class="breadcrumb-item">
                                <?php 
                                         if($persona["NIVEL"] == "Administrador")
                                         {
                                        echo "Todas las prestaciones cargadas";
                                         } else if ($persona["NIVEL"] == "Medico"){
                                            echo "Mis prestaciones cargadas";
                                         } else if($persona["NIVEL"] == "Paciente"){
                                            echo "Mis turnos asignados";
                                         } else if ($persona["NIVEL"] == "Secretaria"){
                                            echo "Todas las prestaciones cargadas";
                                         }
                                ?>
                  
                       </li>
                                <!-- ver los titulos solicitados en el pdf-->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Contextual-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><?php 
                        require_once("cantidadTurnos.php");
                        ?></h5>
                    </div>
                    <!-- ver los titulos solicitados en el pdf y en (xx) poder ver la cantidad de registros visualizados-->
                                    <?php
                                    switch ($persona['NIVEL']) {
                                        case "Administrador";
                                        require_once("administradorList.php");
                                            break;
                                        case "Medico";
                                        require_once ("medicoList.php");
                                            break;
                                        case "Secretaria";
                                        require_once("secretariaList.php");
                                            break;        
                                        case "Paciente";
                                       require_once("pacienteList.php");
                                        break;
                                        
                                    }
                     ?>

<?php require_once("secciones/footerListado.php");?>
</body>

</html>