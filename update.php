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
$i = 0;
$cuenta = count(explode(',',$ids));
while ($cuenta>$i) {
    if (!empty($nombre[$i])) {
        $consulta = "update contacto set nombre='$nombre[$i]' where id=$id[$i]";
        echo "Cambio $nombre[$i] realizado<br />";
        $conexion->query($consulta);
    }
    if (!empty($apellido[$i])) {
        $consulta = "update contacto set apellido='$apellido[$i]' where id=$id[$i]";
        echo "Cambio $apellido[$i] realizado<br />";
        $conexion->query($consulta);
    }
    if (!empty($numero[$i])) {
        $consulta = "update contacto set numero=$numero[$i] where id=$id[$i]";
        echo "Cambio $numero[$i] realizado<br />";
        $conexion->query($consulta);
    }
    $i++;
}
mysqli_close($conexion);
/*while ($cuenta>$i) {
if (!empty($nombre[$i])) {
    echo "update contacto set nombre='$nombre[$i]' where id='$id[$i]<br />";
}
if (!empty($apellido[$i])) {
    echo "update contacto set apellido='$apellido[$i]' where id=$id[$i]<br />";
}
if (!empty($numero[$i])) {
    echo "update contacto set numero=$numero[$i] where id=$id[$i]<br />";
}
$i++;
}*/
?>
