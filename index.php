<html lang="es">
    <head>
        <title>Agenda</title>
        <style>
            .oscurecer {
                opacity: 0.2;
            }
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Jquery -->
        <script type="text/javascript" src="jquery/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="jquery/validate/jquery.validate.min.js"></script>
        <script type="text/javascript" src="jquery/validate/messages_es.min.js"></script>
        <!-- Funciones JS -->
        <script type="text/javascript">
            function activarBtn() {
                var btneliminar = document.getElementById('btneliminar');
                var btnactualizar = document.getElementById('btnactualizar');
                var elementoschk = document.getElementsByClassName('chk');
                var numerochk = elementoschk.length;
                var i = 0;
                var n = 0;
                while (numerochk>0) {
                    if (elementoschk[i].checked) {
                        n += 1;
                    }
                    i++;
                    numerochk--;
                }
                if (n>0) {
                    btneliminar.classList.remove('disabled');
                    btnactualizar.classList.remove('disabled');
                } else {
                    btneliminar.classList.add('disabled');
                    btnactualizar.classList.add('disabled');

                }
            }
            function enviarEliminar() {
                var formulario = document.getElementById('formenvio');
                formulario.removeAttribute('action', 'eliminar.php');
                formulario.setAttribute('action', 'eliminar.php');
                formulario.submit();
            }
            function enviarUpdate() {
                var formulario = document.getElementById('formenvio');
                formulario.removeAttribute('action', 'preupdate.php');
                formulario.setAttribute('action', 'preupdate.php');
                formulario.submit();
            }
        </script>
        <script type="text/javascrip">

        </script>
        <!--<script type="text/javascript">
            var principal = document.getElementById('main');
            principal.classList.add('oscurecer');
        </script>-->
    </head>
    <body>
<!--
        <div id="divacciones" class="well divacciones" style="z-index: 3; height: 50%; width: 50%; position: absolute; top: 25%; left: 25%; display: none;"></div>
-->
        <div id="main">
            <div id="tabla" style="height: 150px; margin-bottom: 20px; overflow-y: auto">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $servidor = "localhost";
                        $usuario = "usuario";
                        $pass = "usuario";
                        $db = "agenda";
                        $conexion = mysqli_connect($servidor, $usuario, $pass, $db) or die("Imposible conectarse");
                        $consulta = "select * from contacto";
                        $resultado = $conexion->query($consulta);
                        echo "<form name='formupdate' role='form' action='preupdate.php' enctype='multipart/form-data' method='get' id='formenvio'>";
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr><td><input type='checkbox' name='chkid[]' onclick='activarBtn()' class='chk' value='".$fila["id"]."'/></td><td>".$fila["nombre"]."</td><td>".$fila["apellido"]."</td><td>".$fila["numero"]."</td></tr>";
                        }
                        echo "</form>";
                        mysqli_close($conexion);
                    ?>
                    </tbody>
                </table>
            </div>
            <div id="formulario" class="row" style="margin: auto;">
                <div class="col-md-3 well">
                    <fieldset>
                        <legend>Ingresar contacto</legend>
                        <form role="form" action="agregar.php" enctype="multipart/form-data" method="get" id="formagregar">
                            <div class="form-group">
                                <label for="inputnombre">Nombre: <input type="text" name="txtnombre" class="form-control" id="inputnombre" placeholder="Escribe aquí el nombre" maxlength="15" required/></label>
                            </div>
                            <div class="form-group">
                                <label for="inputapellido">Apellido: <input type="text" name="txtapellido" class="form-control" id="inputapellido" placeholder="Escribe aquí el apellido" maxlength="20"/></label>
                            </div>
                            <div class="form-group">
                                <label for="inputnumero">Número: <input type="text" name="txtnumero" class="form-control" id="inputnumero" placeholder="Escribe aquí el número" number="true" minlength="9" required/></label>
                            </div>
                            <input type="submit" name="btnenviar" value="Agregar contacto" class="btn btn-default" id="btnagregar"/>
                        </form>
                    </fieldset>
                </div>
                <div class="col-md-2 well">
                    <div class="">
                        <fieldset>
                            <legend>Buscar contacto</legend>
                            <form role="form" action="buscar.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputnombreb">Nombre: <input type="text" name="txtnombreb" class="form-control" id="inputnombreb" placeholder="Buscar aquí"/></label>
                                </div>
                                <input type="submit" name="btnenviarb" value="Buscar contacto" class="btn btn-default" id="btnbuscar"/>
                            </form>
                        </fieldset>
                    </div>
                    <div class="">
                        <legend>Actualizar contacto</legend>
                        <form role="form" action="preupdate.php" enctype="multipart/form-data">
                            <div class="form-group">
                            </div>
                                <input type="button" name="btnactualizar" id="btnactualizar" value="Actualizar contacto" class="btn btn-primary disabled" onclick="enviarUpdate();"/><br /><br />
                        </form>
                    </div>
                    <div class="">
                        <fieldset>
                            <legend>Eliminar contacto</legend>
                            <form role="form" action="eliminar.php" enctype="multipart/form-data">
                                <div class="form-group">
                                </div>
                                <input type="button" name="btneliminar" id="btneliminar" value="Eliminar contacto" class="btn btn-danger disabled" onclick="enviarEliminar();"/><br />
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<!-- Validación de formulario -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#formagregar").validate();
        /*$("#btnenviar").click(function(event) {
            /*var main = document.getElementById('main');
            var cuenta = main.classList.length;
            var i = 0;
            while (cuenta > i) {
            if (main.classList[i] == 'oscurecer') {
                i = cuenta + 10;
                main.classList.remove('oscurecer');
                }
                var z = cuenta - 1;
                if (main.classList[z] != 'oscurecer') {
                }
                i++;
                }
                    $("main").classList.add(oscurecer);
            $("#divacciones").load('./buscar.php?txtnombre=p').toggle('slow');
        })*/
    });
</script>
