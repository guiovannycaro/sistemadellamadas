<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guión</title>
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
        <script src="vista/guion/funciones.js"></script>

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
                <th scope="col">observacion</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <?php
        foreach ($this->modelguion->Listar() as $dat) {


            $datos = $dat->id . "||" . $dat->nombre . "||" . $dat->descripcion . '||' . $dat->observacion;
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $dat->id; ?></th>
                    <td><?php echo $dat->nombre; ?></td>
                    <td> <?php echo $dat->descripcion; ?></td>
                    <td><?php echo $dat->observacion; ?></td>
                    <td>



                        <button  data-toggle="modal" data-target="#EliminarGuionModal" id="<?php echo $dat->id ?>" name="drop" class="btn btn-primary btn-xs drop">Eliminar</button> 

                        -

                        <button  data-toggle="modal" data-target="#EditarGuionModal" onclick="agregardatos('<?php echo $datos; ?>')" name="edit" class="btn btn-primary btn-xs edit">Editar</button> 


                </tr>
            </tbody>
        <?php }
        ?>
        <tr>
            <th scope="col"><button type="button" class="btn btn-danger" onclick="location.href = 'index.php'">VOLVER</button></th>
            <td> <button class="btn btn-primary add" data-toggle="modal" name="add" data-target="#RegistrarGuionModal	" id="Agregar">AGREGAR</button> </td>
        </tr>
    </table>
</div>



<div id="RegistrarGuionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Agregar Guion</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label" for="inputPatient">Nombre</label>
                    <div class="field desc">
                        <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Guion</label>
                    <div class="field desc">
                        <input class="form-control" id="guion" name="guion" placeholder="Digite el guion" type="text" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Observacion</label>
                    <div class="field desc">
                        <input class="form-control" id="observacion" name="observacion" placeholder="Observaciones" type="text" value="" required>

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



<div id="EditarGuionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Editar Guion</h4>
            </div>
            <div class="modal-body">



                <div class="form-group">
                    <label class="control-label" for="inputPatient">Nombre</label>
                    <div class="field desc">
                        <input class="form-control" id="nombreu" name="nombreu" placeholder="Nombre" type="text" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Guion</label>
                    <div class="field desc">
                        <input class="form-control" id="guionu" name="guionu" placeholder="Guion" type="text" value="" required>

                        <input class="form-control" name="id" id="id" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputPatient">Observacion</label>
                    <div class="field desc">
                        <input class="form-control" id="observacionu" name="uobservacionu" placeholder="Observacion" type="text" value="" required>

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


<div id="EliminarGuionModal" class="modal fade" role="dialog">
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
                var nombre = $('#nombre').val();
                var descripcion = $('#guion').val();
                var observacion = $('#observacion').val();

                datos = "id=" + id + "&nombre=" + nombre + "&descripcion=" + descripcion + "&observacion=" + observacion;

                $.ajax({
                    type: "POST",
                    method: "post",
                    url: 'guion.php?g=Guardar',
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
                var nombre = $('#nombreu').val();
                var descripcion = $('#guionu').val();
                var observacion = $('#observacionu').val();

                datos = "id=" + id + "&nombre=" + nombre + "&descripcion=" + descripcion + "&observacion=" + observacion;
                $.ajax({
                    type: "POST",
                    method: "post",
                    url: 'guion.php?g=Guardar',
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
                    url: 'guion.php?g=eliminar',
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
</html>