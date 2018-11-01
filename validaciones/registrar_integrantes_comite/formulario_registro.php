<div class="row" id="panelFormularioRegistro">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Formulario de ingreso
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class=""><a href="#panelFormLideres" data-toggle="tab">Registrar líderes para comités</a></li>
                    <li class="active"><a href="#panelFormAdmitidos" data-toggle="tab" onclick="listar_gestion_comite()">Registrar admitidos para comités</a></li>                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade " id="panelFormLideres">
                        <div id="formulario">
                            <!--Formulario-->
                            <?php include VALIDACIONES . "registrar_integrantes_comite/form_lideres.php" ?>
                            <!--Botones independientes--> 
                            <?php include VALIDACIONES . "registrar_integrantes_comite/botones_registro_lideres.php" ?>                            
                        </div>
                        <!--Visor-->
                        <?php include VALIDACIONES . "registrar_integrantes_comite/visor_lider.php" ?>
                        <div id="principalLider">
                            <!--tabla de comites registrados-->
                            <?php include VALIDACIONES . "registrar_integrantes_comite/botones_cabecera.php" ?>
                            <?php include VALIDACIONES . "registrar_integrantes_comite/lista_comites.php" ?>
                        </div>
                        <!--Modales-->
                        <?php include VALIDACIONES . "registrar_integrantes_comite/modal_comite.php" ?>
                        <?php include VALIDACIONES . "registrar_integrantes_comite/modal_lider.php" ?>
                        <?php include VALIDACIONES . "registrar_integrantes_comite/modal_suplente.php" ?>
                    </div>
                    <div class="tab-pane fade in active" id="panelFormAdmitidos">
                        <div id="formulario_admitido">
                            <?php include VALIDACIONES . "registrar_integrantes_comite/form_admitidos.php" ?>
                            <?php include VALIDACIONES . "registrar_integrantes_comite/botones_registro_admitidos.php" ?>
                        </div>
                        <div id="principalAdmitido">
                            <?php include VALIDACIONES . "registrar_integrantes_comite/lista_gestion_comites.php" ?>
                        </div>

                        <?php include VALIDACIONES . "registrar_integrantes_comite/modal_lista_postulacion.php" ?>
                        <?php include VALIDACIONES . "registrar_integrantes_comite/modal_lista_seleccion.php" ?>
                        <?php include VALIDACIONES . "registrar_integrantes_comite/modal_lista_integrantes.php" ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
