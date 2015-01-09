<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="jquery/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="jquery/validate/messages_es.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function descativarChk(id) {
            var chk = document.getElementById(id);
            var nombre = 'nombre'+id;
            nombre = document.getElementById(nombre);
            var apellido = 'apellido'+id;
            apellido = document.getElementById(apellido);
            var numero = 'numero'+id;
            numero = document.getElementById(numero);
            if (chk.checked) {
                nombre.removeAttribute('disabled', '');
                apellido.removeAttribute('disabled', '');
                numero.removeAttribute('disabled', '');

            } else {
                nombre.setAttribute('disabled', '');
                apellido.setAttribute('disabled', '');
                numero.setAttribute('disabled', '');
            }

        }
    </script>
</head>
<body>
    <div id="main">
        <div id="tabla">
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
$bd = "agenda";
$ids = implode(',',$_GET["chkid"]);
$ids = explode(',',$ids);
$cuenta = count($ids);

$conexion = mysqli_connect($servidor, $usuario, $pass, $bd) or die('Imposible conectarse');
$i = 0;
echo "<form role='form' action='update.php' enctype='multipart/form-data' method='get'>";
while ($cuenta > $i) {
    $consulta = "select * from contacto where id=$ids[$i]";
    $resultado = $conexion->query($consulta);
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr><td><input type='checkbox' id='".$fila["id"]."' name='chkid[]' onclick='descativarChk(this.value)' class='chk' value='".$fila["id"]."' checked/></td><td><input type='text' id='nombre".$fila["id"]."' class='form-control' placeholder='".$fila["nombre"]."' maxlength='15' name='txtnombre[]' required/></td><td><input type='text' id='apellido".$fila["id"]."' name='txtapellido[]' class='form-control' placeholder='".$fila["apellido"]."' maxlength='20' /></td><td><input type='text' id='numero".$fila["id"]."' name='txtnumero[]' class='form-control' placeholder='".$fila["numero"]."' number='true' minlength='9' required/></td></tr>";
    }
    $i++;
}
mysqli_close($conexion);
?>
                </tbody>
            </table>
        </div>
        <center><input type='submit' value='Confirmar cambios' class='btn btn-primary' name='btnconfirmar' id='btnconfirmar'/></center>
        </form>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("#formagregar").validate();
    });
</script>
