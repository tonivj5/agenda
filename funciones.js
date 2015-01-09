/* INDEX */
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
/* PREUPDATE */
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
