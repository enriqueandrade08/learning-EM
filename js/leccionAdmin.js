function cargarOpciones() {
    var curso = document.getElementById("curso").value;
    var formData = new FormData();
    formData.append('curso', curso);
    // Api para mandar y regresar info
    fetch('controller/EjerciciosFiltro.php', {
        method: 'POST',
        body: formData
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            document.getElementById('leccion').innerHTML = body;
        });
}