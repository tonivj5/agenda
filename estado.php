<?php
$servidor = "localhost";
$usuario = "usuario";
$pass = "usuario";
$db = "agenda";
$estado = $_GET['txtestado'];
$conexion = mysql_connect($servidor, $usuario, $pass, $db) or die('Imposible conectarse');
$consulta = "insert into estado (nombre) values ($estado)";
$resultado = $conexion->query($consulta);
if ($resultado) {
    echo "<center><h1>Se ha agregado exitosamente el estado</h1><br />";
    echo "<input class='btn btn-success' type='button' value='Volver atrás' onclick='history.back()'/></center>";
} else {
    echo "Ha ocurrido un error al insertar el estado: ".mysql_error($conexion);
}
mysql_close($conexion);
?>
