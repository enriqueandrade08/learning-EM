function cargarCurso() {
    var curso = document.getElementById("curso").value;
    var formData = new FormData();
    formData.append('curso', curso);
    // Api para mandar y regresar info
    fetch('controller/CursoLeccionesController.php', {
        method: 'POST',
        body: formData
    })
        .then(function (response) {
            console.log(response);
            return response.text();
        })
        .then(function (body) {
            console.log(body);
            document.getElementById('resp').innerHTML = body;
        });
}