<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Usuarios</title>
        <!-- Latest minified bootstrap css -->
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
        <script src="vista/usuarios/funciones.js"></script>
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

        <div class="container">

            <table class="table table-hover" style="width:80%">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Clave</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Correo</th>

                        <th>Accion</th>
                    </tr>
                </thead>
                <?php
                foreach ($this->modelentrante->Listar() as $dat) {


                    $datos = $dat->id . "||" . $dat->nombres . "||" . $dat->apellidos . '||' . $dat->usuario . "||" . $dat->clave . "||" . $dat->idrol . "||" . $dat->correo;
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $dat->id; ?></th>
                            <td ><?php echo $dat->nombres; ?></td>
                            <td> <?php echo $dat->apellidos; ?></td>
                            <td><?php echo $dat->usuario; ?></td>
                            <td><?php echo $dat->clave; ?></td>
                            <td> <?php echo $dat->idrol; ?></td>
                            <td><?php echo $dat->correo; ?></td>


                            <td>



                                <button  data-toggle="modal" data-target="#EliminarClienteModal" id="<?php echo $dat->id ?>" name="drop" class="btn btn-primary btn-xs drop">Eliminar</button> 

                                -

                                <button  data-toggle="modal" data-target="#EditarClienteModal" onclick="agregardatos('<?php echo $datos; ?>')" name="edit" class="btn btn-primary btn-xs edit">Editar</button> 


                        </tr>
                    </tbody>
                <?php }
                ?>
                <td>
                    <table  style="width:80%">
                        <tbody>
                            <tr>
                                <th scope="col"><button type="button" class="btn btn-danger" onclick="location.href = 'index.php'">VOLVER</button></th>
                                <th scope="col"><button class="btn btn-primary add" data-toggle="modal" name="add" data-target="#RegistrarClienteModal	" id="Agregar">AGREGAR</button></th>

                            </tr>
                        </tbody>
                    </table>
                </td>
                <table>

                    <div id="RegistrarClienteModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Agregar Usuario</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Nombre</label>
                                        <div class="field desc">
                                            <input class="form-control" id="nombre" name="nombre" placeholder="Nombres" type="text" value="" required>

                                            <input class="form-control" name="id" id="id" type="hidden">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Apellido</label>
                                        <div class="field desc">
                                            <input class="form-control" id="apellido" name="apellido" placeholder="Apellidos" type="text" value="" required>

                                            <input class="form-control" name="id" id="id" type="hidden">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Usuario</label>
                                        <div class="field desc">
                                            <input class="form-control" id="usuario" name="usuario" placeholder="Usuario" type="text" value="" required>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Clave</label>
                                        <div class="field desc">
                                            <input class="form-control" id="clave" name="Clave" placeholder="Clave" type="password" value="" required>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Rol</label>
                                        <div class="field desc">
                                            <select class="form-control" id="rol" name="rol">
                                                <option value="" selected>Seleccione un Usuario .....</option>
                                                <?php foreach ($this->modelentrante->Listarroles() as $dat) { ?>
                                                    <option value="<?php echo $dat->id; ?>"><?php echo $dat->rol; ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Email</label>
                                        <div class="field desc">
                                            <input class="form-control" id="correo" name="correo" placeholder="Correo Electronico" type="text" value="" required>

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



                    <div id="EditarClienteModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Editar Persona</h4>
                                </div>
                                <div class="modal-body">



                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Nombre</label>
                                        <div class="field desc">
                                            <input class="form-control" id="nombreu" name="nombreu" placeholder="Nombres" type="text" value="" required>

                                            <input class="form-control" name="id" id="id" type="hidden">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Apellido</label>
                                        <div class="field desc">
                                            <input class="form-control" id="apellidou" name="apellidou" placeholder="Apellidos" type="text" value="" required>

                                            <input class="form-control" name="id" id="id" type="hidden">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Usuario</label>
                                        <div class="field desc">
                                            <input class="form-control" id="usuariou" name="usuariou" placeholder="Usuario" type="text" value="" required>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Clave</label>
                                        <div class="field desc">
                                            <input class="form-control" id="claveu" name="Claveu" placeholder="Clave" type="password" value="" required>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Rol</label>
                                        <div class="field desc">
                                            <select class="form-control" id="rol" name="rol">
                                                <option value="" selected>Seleccione un Usuario .....</option>
                                                <?php foreach ($this->modelentrante->Listarroles() as $dat) { ?>
                                                    <option value="<?php echo $dat->id; ?>"><?php echo $dat->rol; ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="inputPatient">Email</label>
                                        <div class="field desc">
                                            <input class="form-control" id="correou" name="correou" placeholder="Correo Electronico" type="text" value="" required>

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


                    <div id="EliminarClienteModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Eliminar Persona</h4>
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
                                    var nombre = $('#nombre').val();
                                    var apellidos = $('#apellido').val();
                                    var usuario = $('#usuario').val();
                                    var clave = $('#clave').val();
                                    var rol = $('#rol').val();
                                    var correo = $('#correo').val();
                                    datos = "id=" + id + "&nombre=" + nombre + "&apellido=" + apellidos + "&usuario=" + usuario + "&clave=" + clave + "&rol=" + rol + "&correo=" + correo;

                                    $.ajax({
                                        type: "POST",
                                        method: "post",
                                        url: 'usuarios.php?m=Guardar',
                                        data: datos,
                                        success: function (data)
                                        {
                                            alertify.alert('Mensaje Informativo', 'se inserto el registro', function () {
                                                alertify.success('Ok');
                                            });


                                            setTimeout("location.reload()", 7000);
                                        },

                                        error: function (data) {
                                            alertify.alert('Mensaje Informativo', 'se no inserto el registro', function () {
                                                alertify.success('No Ok');
                                            });

                                        }


                                    });

                                });
                            });

                            $(document).on('click', '.edit', function () {


                                $('#Editar').click(function () {


                                    var id = $('#idu').val();
                                    var nombre = $('#nombreu').val();
                                    var apellidos = $('#apellidou').val();
                                    var usuario = $('#usuariou').val();
                                    var clave = $('#claveu').val();
                                    var rol = $('#rolu').val();
                                    var correo = $('#correou').val();



                                    datos = "id=" + id + "&nombre=" + nombre + "&apellido=" + apellidos + "&usuario=" + usuario + "&clave=" + clave + "&rol=" + rol + "&correo=" + correo;

                                    $.ajax({
                                        type: "POST",
                                        method: "post",
                                        url: 'usuarios.php?m=Guardar',
                                        data: datos,
                                        success: function (data)
                                        {
                                            alertify.alert('Mensaje Informativo', 'se edito el registro', function () {
                                                alertify.success('Ok');
                                            });


                                            setTimeout("location.reload()", 7000);
                                        },
                                        error: function (data) {
                                            alertify.alert('Mensaje Informativo', 'se no edito el registro', function () {
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
                                        url: 'usuarios.php?m=eliminar',
                                        data: 'id=' + id,
                                        success: function (data)
                                        {
                                            alertify.alert('Mensaje Informativo', 'se elimino el registro', function () {
                                                alertify.success('Ok');
                                            });


                                            setTimeout("location.reload()", 7000);
                                        },
                                        error: function (data) {
                                            alertify.alert('Mensaje Informativo', ' nose elimino el registro', function () {
                                                alertify.success('No Ok');
                                            });

                                        }
                                    });

                                });
                            });
                        });
                    </script>
                    </body>
                    </html>