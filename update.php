<head>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
$servidor = "localhost";
$usuario = "usuario";
$pass = "usuario";
$db = "agenda";
$id = $_GET['chkid'];
$ids = implode(',',$id);
$nombre = $_GET['txtnombre'];
$apellido = $_GET['txtapellido'];
$numero = $_GET['txtnumero'];
$conexion = mysqli_connect($servidor, $usuario, $pass, $db) or die('Imposible conectarse');
$consulta = "select * from contacto";
$resultado = $conexion->query($consulta);
if ($resultado) {
echo "<div class='container well center-block'><h2 class='text-center'>Historial de cambios</h2><hr />";
$i = 0;
$cuenta = count(explode(',',$ids));
while ($cuenta>$i) {
    $consulta = "select * from contacto where id=$id[$i]";
    $resultado = $conexion->query($consulta);
    if ($fila = $resultado->fetch_assoc()) {
    echo "<h4>".$fila["nombre"]." ".$fila["apellido"].", ".$fila["numero"]."</h4>";
    }
    $consulta = "select * from contacto";
    $resultado = $conexion->query($consulta);
    if (!empty($nombre[$i])) {
        $consulta = "update contacto set nombre='$nombre[$i]' where id=$id[$i]";
        echo "<h3>Cambió de nombre a <strong>$nombre[$i]</strong><h3>";
        $conexion->query($consulta);
    }
    if (!empty($apellido[$i])) {
        $consulta = "update contacto set apellido='$apellido[$i]' where id=$id[$i]";
        echo "<h3>Cambió de apellido a <strong>$apellido[$i]</strong></h3>";
        $conexion->query($consulta);
    }
    if (!empty($numero[$i])) {
        $consulta = "update contacto set numero=$numero[$i] where id=$id[$i]";
        echo "<h3>Cambió de número a <strong>$numero[$i]</strong></h3>";
        $conexion->query($consulta);
    }
    echo "<br />";
    $i++;
}
$url = 'index.php';
echo "<div class='center-block text-center'><a href=$url><input type='button' class='btn btn-success' name='btnatras' value='Volver atrás'/></a></div>";
echo "</div>";
} else {
    echo "Ha ocurrido un error: ".mysqli_error($conexion);
}
mysqli_close($conexion);
?>
