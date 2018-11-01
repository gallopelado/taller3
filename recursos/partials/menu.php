<body data-spy="scroll" data-target=".navbar" data-offset="50" style="padding-top: 50px">

    <div id="wrapper">

        <!-- Navigation -->
        <!--class="navbar navbar-default navbar-static-top"-->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0;position: fixed;">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?echo DIR_RAIZ ;?>">SYS IEC | <label class="label label-primary"><?php echo $_SESSION["usuario"]["nombre"] . "(" . $_SESSION["usuario"]["grupo"] . ")"; ?></label></a>                
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION["usuario"]["nombre"]; ?></a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo DIR_RAIZ . 'validaciones/gestionar_sesiones/cerrar_sesion.php' ?>"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar..." id="BuscaCentral">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i>Menu</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-gears fa-fw"></i>Mantenimiento y Seguridad<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <!--Validar para usuarios-->
                                <?php if ($_SESSION["usuario"]["grupo"] == "ADMINISTRADOR") { ?>
                                    <li>
                                        <a href="·"><i class="fa fa-gear fa-fw"></i>Administrar Roles y Permisos<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level collapse">
                                            <li>
                                                <a href="<?php echo DIR_RAIZ . 'vista/gestionar_roles_permisos/panel_admin.php' ?>">Panel</a>
                                            </li>
                                        </ul>

                                    </li>
                                    <li>
                                        <a href="<?php echo DIR_RAIZ . 'vista/referenciales/mantener_ciudades.php' ?>">Ciudades</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo DIR_RAIZ . 'vista/referenciales/mantener_nacionalidades.php' ?>">Nacionalidades</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo DIR_RAIZ . 'vista/referenciales/mantener_calles.php' ?>">Calles</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo DIR_RAIZ . 'vista/referenciales/mantener_barrios.php' ?>">Barrios</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo DIR_RAIZ . 'vista/referenciales/mantener_ministerios.php' ?>">Ministerios</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo DIR_RAIZ . 'vista/referenciales/mantener_sedes.php' ?>">Sedes</a>
                                    </li>
                                    <?php } ?> 
                                    <li>
                                        <a href="<?php echo DIR_RAIZ . 'vista/referenciales/mantener_familias.php' ?>">Familias</a>
                                    </li>                                    
                                    <li>
                                        <a href="<?php echo DIR_RAIZ . 'vista/referenciales/mantener_personas.php' ?>">Personas</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo DIR_RAIZ . 'vista/referenciales/mantener_telefonos.php' ?>">Telefonos</a>
                                    </li>                                
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>Gestión de Miembros<span class="fa arrow"></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="<?php echo DIR_RAIZ . 'vista/gestionar_miembros/gestionar_historico_afiliante.php' ?>">Gestionar histórico del afiliante</a>
                                </li>
                                <li>
                                    <a href="<?php echo DIR_RAIZ . 'vista/gestionar_miembros/registrar_documentos.php' ?>">Registrar Documentos</a>
                                </li>
                                <li>
                                    <a href="<?php echo DIR_RAIZ . 'vista/gestionar_miembros/registrar_fbautismo.php' ?>">Registrar Ficha de Bautismo</a>
                                </li>
                                <li>
                                    <a href="<?php echo DIR_RAIZ . 'vista/gestionar_miembros/registrar_afiliante.php' ?>">Registrar Afiliante</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-briefcase fa-fw"></i>Gestión de Comités<span class="fa arrow"></a>
                                    <ul class="nav nav-third-level collapse">
                                        <li>
                                            <a href="<?php echo DIR_RAIZ . 'vista/gestionar_miembros/registrar_candidato_comite.php' ?>">Registrar candidatos para comités</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo DIR_RAIZ . 'vista/gestionar_miembros/registrar_postulacion.php' ?>">Registrar postulación</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo DIR_RAIZ . 'vista/gestionar_miembros/gestionar_postulacion.php' ?>">Gestionar postulación</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo DIR_RAIZ . 'vista/gestionar_miembros/evaluacion_postulante.php' ?>">Evaluación de postulantes</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo DIR_RAIZ . 'vista/gestionar_miembros/registrar_integrantes_comites.php' ?>">Registrar integrantes para comités</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-pdf-o   fa-fw"></i>Gestionar Informes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="<?php echo DIR_RAIZ . 'vista/gestionar_informes/ref_personas.php' ?>">Personas</a>
                                </li>
                                <li>
                                    <a href="<?php echo DIR_RAIZ . 'vista/gestionar_informes/ref_afiliante.php' ?>">Afiliante</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
