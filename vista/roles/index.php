<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Roles</title>
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
        <script src="vista/roles/funciones.js"></script>
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

<div class="container">

    <table class="table table-hover" style="width:70%">
        <thead class="table-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">descripcion</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <?php
        foreach ($this->modelroles->Listar() as $dat) {


            $datos = $dat->id . "||" . $dat->rol . "||" . $dat->descripcion;
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $dat->id; ?></th>
                    <td><?php echo $dat->rol; ?></td>
                    <td> <?php echo $dat->descripcion; ?></td>

                    <td>



                        <button  data-toggle="modal" data-target="#EliminarRolModal" id="<?php echo $dat->id ?>" name="drop" class="btn btn-primary btn-xs drop">Eliminar</button> 

                        -

                        <button  data-toggle="modal" data-target="#EditarRolModal" onclick="agregardatos('<?php echo $datos; ?>')" name="edit" class="btn btn-primary btn-xs edit">Editar</button> 


                </tr>
            </tbody>
        <?php }
        ?>

        <tr>
            <th scope="col"><button type="button" class="btn btn-danger" onclick="location.href = 'index.php'">VOLVER</button></th>
            <td> <button class="btn btn-primary add" data-toggle="modal" name="add" data-target="#RegistrarRolModal	" id="Agregar">AGREGAR</button> </td>
        </tr>
    </table>
</div>


<div id="RegistrarRolModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Agregar Rol</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label" for="inputPatient">Nombre</label>
                    <div class="field desc">
                        <input class="form-control" id="rol" name="rol" placeholder="Digite el rol" type="text" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">descripcion</label>
                    <div class="field desc">
                        <input class="form-control" id="descripcion" name="descripcion" placeholder="Digite la descripcion del rol" type="text" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
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



<div id="EditarRolModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Editar Rol</h4>
            </div>
            <div class="modal-body">



                <div class="form-group">
                    <label class="control-label" for="inputPatient">Nombre</label>
                    <div class="field desc">
                        <input class="form-control" id="rolu" name="rolu" placeholder="Rol" type="text" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Descripcion</label>
                    <div class="field desc">
                        <input class="form-control" id="descripcionu" name="descripcionu" placeholder="Descripcion" type="text" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
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


<div id="EliminarRolModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Eliminar Rol</h4>
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
                var nombre = $('#rol').val();
                var descripcion = $('#descripcion').val();


                datos = "id=" + id + "&nombre=" + nombre + "&descripcion=" + descripcion;

                $.ajax({
                    type: "POST",
                    method: "post",
                    url: 'roles.php?r=Guardar',
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
                var nombre = $('#rolu').val();
                var descripcion = $('#descripcionu').val();


                datos = "id=" + id + "&nombre=" + nombre + "&descripcion=" + descripcion;
                $.ajax({
                    type: "POST",
                    method: "post",
                    url: 'roles.php?r=Guardar',
                    data: datos,
                    success: function (data)
                    {
                        alertify.alert('Mensaje Informativo', 'se edito el registro', function () {
                            alertify.success('Ok');
                        });


                        setTimeout("location.reload()", 7000);
                    },

                    error: function (data) {
                        alertify.alert('Mensaje Informativo', 'No se edito el registro', function () {
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
                    url: 'roles.php?r=eliminar',
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