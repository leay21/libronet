$(document).ready(function() {
    $('#logout').click(function() {
        Swal.fire({
            title: "¿Desea cerrar sesión?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Cerrar sesión",
            cancelButtonText: "Cancelar"
          }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Has cerrado sesión",
                    text: "Esperamos verte pronto :)",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.removeItem('usuario');
                        window.location.href = '../index.html';
                    }
                });
            }
        });
    });
});
