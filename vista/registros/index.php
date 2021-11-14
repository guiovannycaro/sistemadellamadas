<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Llamadas</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest minified bootstrap js -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="librerias/alertifyjs/alertify.js"></script>
        <script src="librerias/select2/js/select2.js"></script>
        <style>
            .col-1{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #Agregar{
                margin-left: 20px;
            }
            .container{
                display:flex;
                justify-content: center;
                width:100%;
                align-items: center;
                padding-top: 30px; 
            }

        </style>

    </head>	
    <body>

</html>


<script src="vista/registros/funciones.js"></script>
<div class="container">

    <table class="table table-hover" style="width:70%">
        <thead class="table-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">nombres</th>
                <th scope="col">apellidos</th>
                <th scope="col">guion</th>
                <th scope="col">nombre cliente</th>
                <th scope="col">apellido cliente</th>
                <th scope="col">fecha</th>
                <th scope="col">Duracion</th>
                 <!--<td>Accion</td>-->
            </tr>
        </thead>
        <?php
        foreach ($this->modelregistro->Listar() as $dat) {


            $datos = $dat->id . "||" . $dat->nombres . "||" . $dat->apellidos . '||' . $dat->guion . '||' . $dat->guion . '||' . $dat->nombrecliente
                    . '||' . $dat->apellidocliente . '||' . $dat->fechahora . '||' . $dat->duracion;
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $dat->id; ?></th>
                    <td><?php echo $dat->nombres; ?></td>
                    <td> <?php echo $dat->apellidos; ?></td>
                    <td><?php echo $dat->guion; ?></td>
                    <td><?php echo $dat->nombrecliente; ?></td>
                    <td><?php echo $dat->apellidocliente; ?></td>
                    <td><?php echo $dat->fechahora; ?></td>
                    <td><?php echo $dat->duracion; ?></td>
                   <!-- <td>
                   
          <button  data-toggle="modal" data-target="#EliminarRegistroModal" id="<?php echo $dat->id ?>" name="drop" class="btn btn-primary btn-xs drop">Eliminar</button> 
                    
                    -
                    
                    <button  data-toggle="modal" data-target="#EditarRegistroModal" onclick="agregardatos('<?php echo $datos; ?>')" name="edit" class="btn btn-primary btn-xs edit">Editar</button> 
          </td>-->
                </tr>
            </tbody>
        <?php }
        ?>

        <tr>
            <th scope="col"><button type="button" class="btn btn-danger" onclick="location.href = 'index.php'">VOLVER</button></th>
            <td> <button class="btn btn-primary add" data-toggle="modal" name="add" data-target="#RegistrarRegistroModal	" id="Agregar">AGREGAR</button> </td>
        </tr>
    </table>
</div>


<div id="RegistrarRegistroModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Agregar Registro</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Fecha</label>
                    <div class="field desc">
                        <input class="form-control" id="fechahora" name="fechahora" placeholder="Fecha" type="date" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Duracion</label>
                    <div class="field desc">
                        <input class="form-control" id="duracion" name="duracion" placeholder="Digite La Duracion de la llamada" type="number" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Usuario Entrante</label>
                    <div class="field desc">

                        <select class="form-control" id="usuario1" name="usuario1">
                            <option value="" selected>Seleccione un Usuario .....</option>
                            <?php foreach ($this->modelregistro->Listarusuarios() as $dat) { ?>
                                <option value="<?php echo $dat->id; ?>"><?php echo $dat->nombres . " " . $dat->apellidos; ?></option>

                            <?php } ?>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Usuario Saliente</label>
                    <div class="field desc">
                        <select class="form-control" id="usuario2" name="usuario2">
                            <option value="" selected>Seleccione un Usuario .....</option>
                            <?php foreach ($this->modelregistro->Listarsalientes() as $dat) { ?>
                                <option value="<?php echo $dat->id; ?>"><?php echo $dat->nombres . " " . $dat->apellidos; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputPatient">Guion</label>
                    <div class="field desc">
                        <select class="form-control" id="guion" name="guion">
                            <option value="" selected>Seleccione un Usuario .....</option>
                            <?php foreach ($this->modelregistro->Listarguion() as $dat) { ?>
                                <option value="<?php echo $dat->id; ?>"><?php echo $dat->nombre; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">

                    <div class="field desc">
                        <input class="form-control" id="idu" name="idu"  value="0" type="hidden">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button type="submit" class="btn btn-primary Registrar"  data-dismiss="modal" id="Registrar">Registrar</button>

            </div>
        </div>
    </div>
</div>



<div id="EditarRegistroModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Editar Registro</h4>
            </div>
            <div class="modal-body">



                <div class="form-group">
                    <label class="control-label" for="inputPatient">Fecha</label>
                    <div class="field desc">
                        <input class="form-control" id="fechahorau" name="fechahorau" placeholder="Fecha" type="date" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Duracion</label>
                    <div class="field desc">
                        <input class="form-control" id="duracionu" name="duracionu" placeholder="Digite La Duracion de la llamada" type="number" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Usuario Uno</label>
                    <div class="field desc">
                        <input class="form-control" id="usuario1u" name="usuario1u" placeholder="Digite el Usuario" type="text" value="" required>
                        <select class="form-control" id="usuario1u" name="usuario1u">
                            <option value="" selected>Seleccione un Usuario .....</option>
                            <?php foreach ($this->modelregistro->Listarusuarios() as $dat) { ?>
                                <option value="<?php echo $dat->id; ?>"><?php echo $dat->nombres . " " . $dat->apellidos; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Usuario Dos</label>
                    <div class="field desc">

                        <select class="form-control" id="usuario2u" name="usuario2u">
                            <option value="" selected>Seleccione un Usuario .....</option>
                            <?php foreach ($this->modelregistro->Listarsalientes() as $dat) { ?>
                                <option value="<?php echo $dat->id; ?>"><?php echo $dat->nombres . " " . $dat->apellidos; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputPatient">Guion</label>
                    <div class="field desc">


                        <select class="form-control" id="guionu" name="guionu">
                            <option value="" selected>Seleccione un Usuario .....</option>
                            <?php foreach ($this->modelregistro->Listarguion() as $dat) { ?>
                                <option value="<?php echo $dat->id; ?>"><?php echo $dat->nombre; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">

                    <div class="field desc">
                        <input class="form-control" id="idu" name="idu"  type="hidden">
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button type="submit" class="btn btn-primary Registrar"  data-dismiss="modal" id="Editar">Editar</button>

            </div>
        </div>
    </div>
</div>


<div id="EliminarRegistroModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Eliminar Guion</h4>
            </div>
            <div class="modal-body">

                seguro de eliminar?






            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button type="submit" class="btn btn-primary Registrar"  data-dismiss="modal" id="Eliminar">Eliminar</button>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {


        $(document).on('click', '.add', function () {
            $('#Registrar').click(function () {
                var id = $('#idu').val();
                var fechahora = $('#fechahora').val();
                var duracion = $('#duracion').val();
                var usuario1 = $('#usuario1').val();
                var guion = $('#guion').val();
                var usuario2 = $('#usuario2').val();



                datos = "id=" + id + "&fechahora=" + fechahora + "&duracion=" + duracion + "&usuario1=" + usuario1 + "&guion=" + guion + "&usuario2=" + usuario2;

                $.ajax({
                    type: "POST",
                    method: "post",
                    url: 'registro.php?r=Guardar',
                    data: datos,
                    success: function (data)
                    {
                        alertify.alert('Mensaje Informativo', 'se inserto el registro', function () {
                            alertify.success('Ok');
                        });


                        setTimeout("location.reload()", 7000);
                    },

                    error: function (data) {
                        alertify.alert('Mensaje Informativo', 'No se inserto  el registro', function () {
                            alertify.success('No Ok');
                        });

                    }


                });

            });
        });

        $(document).on('click', '.edit', function () {


            $('#Editar').click(function () {

                var id = $('#idu').val();
                var fechahora = $('#fechahorau').val();
                var duracion = $('#duracionu').val();
                var usuario1 = $('#usuario1u').val();
                var usuario2 = $('#usuario2u').val();
                var guion = $('#guionu').val();


                datos = "id=" + id + "&fechahora=" + fechahora + "&duracion=" + duracion + "&usuario1=" + usuario1 + "&usuario2=" + usuario2 + "&guion=" + guion;

                $.ajax({
                    type: "POST",
                    method: "post",
                    url: 'registro.php?r=Guardar',
                    data: datos,
                    success: function (data)
                    {
                        alertify.alert('Mensaje Informativo', 'se edito el registro', function () {
                            alertify.success('Ok');
                        });


                        setTimeout("location.reload()", 7000);
                    },

                    error: function (data) {
                        alertify.alert('Mensaje Informativo', 'No se edito  el registro', function () {
                            alertify.success('No Ok');
                        });

                    }

                });

            });
        });

        $(document).on('click', '.drop', function () {

            var id = $(this).attr("id");

            $('#Eliminar').click(function () {

                $.ajax({
                    type: "POST",
                    method: "post",
                    url: 'registro.php?r=eliminar',
                    data: 'id=' + id,
                    success: function (data)
                    {
                        alertify.alert('Mensaje Informativo', 'se elimino el registro', function () {
                            alertify.success('Ok');
                        });


                        setTimeout("location.reload()", 7000);
                    },

                    error: function (data) {
                        alertify.alert('Mensaje Informativo', 'No se elimino  el registro', function () {
                            alertify.success('No Ok');
                        });

                    }
                });

            });
        });

    });
</script>
</body>	
</head>