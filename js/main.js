function addCamposPass(){
    const pasw = addInput('col-md-6','pass1', 'Contraseña Nueva', 'password', 'Contraseña Nueva');
    const pasw2 = addInput('col-md-6','pass2', 'Confirmar Contraseña', 'password', 'Confirmar Contraseña');

    document.getElementById("btnCon").disabled = true;

    let resp = document.getElementById("divPass");
    resp.innerHTML = pasw + pasw2;
}

function addInput(classDiv, name, dLabel, type, place){
    return `
    <div class="${classDiv}">
        <label for="${name}" class="form-label">${dLabel}</label>  
        <input type="${type}" class="form-control" placeholder="${place}" name="${name}" id="${name}">
    </div>`;
}

function valCon(event) {
    var pass1 = document.getElementById("pass1");
    var pass2 = document.getElementById("pass2");

    if (pass1 && pass2) {
        var pass1Value = pass1.value;
        var pass2Value = pass2.value;
        // Verificar si las contraseñas coinciden
        if (pass1Value !== pass2Value) {
            event.preventDefault();
            Swal.fire("Las contraseñas no coinciden");
        } else if (pass1Value.trim() === "") {
            // Verificar si la contraseña no está vacía
            event.preventDefault();
            Swal.fire("La contraseña no puede estar vacía");
        } else {
            document.getElementById("fperfil").submit();
        }
    } else {
        document.getElementById("fperfil").submit();
    }
}