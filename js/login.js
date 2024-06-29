$(document).ready(function() {
    const validarLogin = new JustValidate("#login");
    validarLogin
        .addField('#email', [
            {
                rule: 'required',
                errorMessage: 'Escriba su correo electrónico'
            },
            {
                rule: 'email',
                errorMessage: 'Escriba un correo válido'
            }
        ])
        .addField('#password', [
            {
                rule: 'required',
                errorMessage: 'Escriba su contraseña'
            }
        ])
        .onSuccess((evt)=>{
            hacerLogin();
        });

    function mostrarSuccess() {
        Swal.fire({
            title: "Has iniciado sesión :)",
            icon: "success"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/index.html';
            }
        });
    }

    function hacerLogin() {
        const email = $('#email').val();
        const password = $('#password').val();

        const data = {
            email_usuario: email,
            password_usuario: password
        };

        $.ajax({
            url: '/php/login.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                console.log(response);
                // Manejar la respuesta aquí
                if (response.status === 200) {
                    localStorage.setItem('usuario', response.usuario);
                    mostrarSuccess();
                } else {
                    Swal.fire({
                        title: "Hubo un error en tu inicio de sesión :(",
                        text: response.message,
                        icon: "error"
                    });
                }
            },
            error: function(error) {
                
                console.error('Error:', error);
            }
        });
    }
});