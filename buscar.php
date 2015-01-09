<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div id="main">
        <div id="tabla" style="height: auto;">
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
    $buscar = $_GET["txtnombreb"];
    $conexion = mysqli_connect($servidor, $usuario, $pass, $db) or die("Imposible conectarse");
    $consulta = "select * from contacto where nombre like '%$buscar%'";
    $resultado = $conexion->query($consulta);
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr><td><input type='checkbox' name='chkid[]' value='".$fila["id"]."'/></td><td>".$fila["nombre"]."</td><td>".$fila["apellido"]."</td><td>".$fila["numero"]."</td></tr>";
    }
$url = $_SERVER[HTTP_REFERER];
mysqli_close($conexion);
?>
                </tbody>
            </table>
        </div>
        <div class='well'>
<?php
            echo "<a href=$url><input type='button' value='Volver atrás' name='btnatras' class='btn btn-success'/></a>";
?>
        </div>
