function cargarCursoEst() {
    var curso = document.getElementById("curso").value;
    var inscrito = document.getElementById("inscrito").value;
    var formData = new FormData();
    formData.append('curso', curso);
    formData.append('inscrito', inscrito);
    // Api para mandar y regresar info
    fetch('controller/CursoEstudianteController.php', {
        method: 'POST',
        body: formData
    })
        .then(function (response) {
            // console.log(response);
            return response.text();
        })
        .then(function (body) {
            // console.log(body);
            document.getElementById('resp').innerHTML = body;
        });
}

function enviarRespuestas(formulario) {
    var formData = new FormData(formulario);

    // Obtener el id del formulario
    var idFormulario = formulario.id;

    // Enviar los datos del formulario mediante una solicitud HTTP
    fetch("./controller/EjerciciosEstudiantesController.php", {
        method: "POST",
        body: formData
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            if (body == "Leccion aprobada") {
                cargarCursoEst();
            }
            swal.fire(body);
        })
        .catch(function (error) {
            // Manejar cualquier error que ocurra durante el envío del formulario
            console.error("Error al enviar el formulario ", error);
        });
}

function obtCodigoCRUD(cod, destino, tipo) {
    let codigo = cod
    // Crear un formulario dinámicamente
    var form = document.createElement('form');
    form.method = 'post';
    form.action = destino;
    // Crear el input
    var codigoInput = document.createElement('input');
    codigoInput.type = 'hidden';
    codigoInput.name = 'cod';
    codigoInput.value = codigo;

    var tipoInput = document.createElement('input');
    tipoInput.type = 'hidden';
    tipoInput.name = 'tipo';
    tipoInput.value = tipo;

    form.appendChild(codigoInput);
    form.appendChild(tipoInput);
    // Agregar el formulario al cuerpo del documento
    document.body.appendChild(form);
    // Enviar el formulario
    form.submit();
}

function obtCod(cod, destino) {
    let codigo = cod
    // Crear un formulario dinámicamente
    var form = document.createElement('form');
    form.method = 'post';
    form.action = destino;
    // Crear el input
    var codigoInput = document.createElement('input');
    codigoInput.type = 'hidden';
    codigoInput.name = 'cod';
    codigoInput.value = codigo;

    form.appendChild(codigoInput);
    document.body.appendChild(form);
    // Enviar el formulario
    form.submit();
}

function obtCod2(cod, inscrito, destino) {
    let codigo = cod
    // Crear un formulario dinámicamente
    var form = document.createElement('form');
    form.method = 'post';
    form.action = destino;
    // Crear el input
    var codigoInput = document.createElement('input');
    codigoInput.type = 'hidden';
    codigoInput.name = 'cod';
    codigoInput.value = codigo;

    var inscritoInput = document.createElement('input');
    inscritoInput.type = 'hidden';
    inscritoInput.name = 'inscrito';
    inscritoInput.value = inscrito;

    form.appendChild(codigoInput);
    form.appendChild(inscritoInput);
    document.body.appendChild(form);
    // Enviar el formulario
    form.submit();
}
