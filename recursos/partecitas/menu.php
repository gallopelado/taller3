<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SYS IEC</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                    <!-- /.dropdown-tasks -->
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
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Menu</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Mantenimiento y Seguridad<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level" id="menu_referencial">
                                <li>
                                    <a href="../pages/referenciales/mantener_ciudades.php">Ciudades</a>
                                </li>
                                <li>
                                    <a href="../pages/referenciales/mantener_nacionalidades.php">Nacionalidades</a>
                                </li>
                                <li>
                                    <a href="../pages/referenciales/mantener_calles.php">Calles</a>
                                </li>
                                <li>
                                    <a href="../pages/referenciales/mantener_barrios.php">Barrios</a>
                                </li>
                                <li>
                                    <a href="../pages/referenciales/mantener_ministerios.php">Ministerios</a>
                                </li>
                                <li>
                                    <a href="../pages/referenciales/mantener_sedes.php">Sedes</a>
                                </li>
                                <li>
                                    <a href="../pages/referenciales/mantener_familias.php">Familias</a>
                                </li>
                                <li>
                                    <a href="../pages/referenciales/mantener_personas.php">Personas</a>
                                </li>
                                <li>
                                    <a href="../pages/referenciales/mantener_telefonos.php">Telefonos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-edit fa-fw"></i>Gestion de Miembros<span class="fa arrow"></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="flot.html">Admision de Miembros</a>
                              </li>
                              <li>
                                  <a href="flot.html">Carta de Recomendacion</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
