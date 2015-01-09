<head>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
$ids = implode(',',$_GET["chkid"]);
$servidor = "localhost";
$usuario = "usuario";
$pass = "usuario";
$db = "agenda";
$conexion = mysqli_connect($servidor, $usuario, $pass, $db);
$consulta = "delete from contacto where id in ($ids)";
$resultado = $conexion->query($consulta);
if ($resultado) {
    echo "<center><h1>Se han eliminado los contacto exitosamente</h1><br />";
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<a href='$url'><input type='button' value='Volver atrás' class='btn btn-success'/></a></center>";
} else {
    echo "Ha ocurrido un error: ".mysqli_error($conexion);
}
mysqli_close($conexion);
?>
