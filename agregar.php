<head>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="funciones.js"></script>
</head>
<?php
$nombre = $_GET["txtnombre"];
$apellido = $_GET["txtapellido"];
$numero = $_GET["txtnumero"];
$servidor = "localhost";
$usuario = "usuario";
$pass = "usuario";
$bd = "agenda";
$conexion = mysqli_connect($servidor, $usuario, $pass, $bd) or die("Imposible conectarse");
$consulta = "insert into contacto (nombre, apellido, numero) values ('$nombre', '$apellido', $numero)";
$resultado = mysqli_query($conexion, $consulta);
if ($resultado) {
    echo "<center><h1>Se ha agregado exitosamente el contacto</h1><br />";
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<a href=$url><input class='btn btn-success' type='button' value='Volver atrás'/></a></center>";
} else {
    echo "Ha ocurrido un error: ".mysqli_error($conexion);
}
mysqli_close($conexion);
?>
