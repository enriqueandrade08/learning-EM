function obtCodigo(cod,destino){
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
    // Agregar el formulario al cuerpo del documento
    document.body.appendChild(form);
    // Enviar el formulario
    form.submit();
}