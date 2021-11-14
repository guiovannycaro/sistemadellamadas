<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">
        <title>Inicio
        </title>
        <style>
            *{
                margin: 0;
                font-family: 'Montserrat', sans-serif;
            }

            body{
                position: absolute;
                background-image: url(Img/fondo_azul.jpeg);
                background-repeat: no-repeat;
                background-size: cover;
            }

            #fondo{
                position: relative;
            }

            .row{
                position: fixed;
                display: flex;
                width: 100%;
                height: 100px;
                background: #fff;
                align-content: center;
                justify-content: center;
            }

            .col-sm a{
                border: 2px solid #0085A3;
                display: inline-block;
                margin-top: 25px;
                margin-left: 30px;
                padding: 10px 20px;
                text-decoration: none;
                border-radius: 10px;
                background: rgb(0,154,205);
                color: #FFF;
            }
            .col-sm a:hover{
                background: #89E6FB;
                color: #013E54;
                box-shadow: 0 1px 1px #01212D;
            }
        </style>
    </head>
    <body >
        <div class="container">
            <div class="row">
                <div class="col-sm">

                    <a href="usuarios.php" target="_self">USUARIOS</a>
                    <a href="salientes.php" target="_self">USUARIOS CLIENTE</a>
                    <a href="registro.php" target="_self">REGISTRO LLAMADAS</a>
                    <a href="guion.php" target="_self">GUION</a>
                    <a href="roles.php" target="_self">ROLES</a>
                </div>
            </div>
        </div>

    </body>
</html>