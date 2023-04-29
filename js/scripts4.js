document.getElementById("btnBorrarConfiguracion").addEventListener("click", function() {
    // Enviar una solicitud al servidor para ejecutar el código de eliminación de cookies en PHP
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "eliminar_conf.php", true); // Reemplaza "eliminar_cookies.php" con la ruta a tu archivo PHP
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Manejar la respuesta del servidor si es necesario
                alert("Cookies eliminadas correctamente.")
                //recatga la pagina
                location.reload();
            } else {
                alert("Ha ocurrido un error al intentar eliminar las cookies.");
            }
        }
    };
    xhr.send();
});