$(document).ready(function() {
    $('#miFormulario').submit(function(e) {
        e.preventDefault();

        // Utiliza AJAX para enviar el formulario sin recargar la página
        $.ajax({
            type: 'POST',
            url: 'tu_script_php.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                // Maneja la respuesta JSON
                response = JSON.parse(response);
                
                // Muestra la alerta según el resultado
                if (response.success) {
                    alert(response.message);
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function() {
                alert("Error al procesar la solicitud.");
            }
        });
    });
});
