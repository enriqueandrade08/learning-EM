function valCon(event) {
    var c1 = document.getElementById('pass').value;
    var c2 = document.getElementById('pass2').value;

    if (c1 !== c2) {
        Swal.fire("Las contraseñas no coinciden");
        return false;
    }
    return true;

}
