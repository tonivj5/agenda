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
