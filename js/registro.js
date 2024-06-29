$(document).ready(function() {
    const validarRegistro = new JustValidate("#registro");
    validarRegistro
    .addField('#nombre', [
        {
            rule: 'required',
            errorMessage: 'Escriba su nombre'
        },
        {
            rule: 'customRegexp',
            value: /^[A-Za-z]+(?: [A-Za-z]+)*$/,
            errorMessage: 'Solo se permiten letras y espacios, y no puede contener solo espacios en blanco',
        }
    ])
    .addField('#apeP', [
        {
            rule: 'required',
            errorMessage: 'Escriba su apellido paterno'
        },
        {
            rule: 'customRegexp',
            value: /^[A-Za-z]+(?: [A-Za-z]+)*$/,
            errorMessage: 'Solo se permiten letras y espacios, y no puede contener solo espacios en blanco',
        }
    ])
    .addField('#apeM', [
        {
            rule: 'required',
            errorMessage: 'Escriba su apellido materno'
        },
        {
            rule: 'customRegexp',
            value: /^[A-Za-z]+(?: [A-Za-z]+)*$/,
            errorMessage: 'Solo se permiten letras y espacios, y no puede contener solo espacios en blanco',
        }
    ])
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
            errorMessage: 'Escriba una contraseña'
        },
        {
            rule: 'password',
            errorMessage: 'La contraseña es de mínimo 8 caracteres, debe contener al menos letras y números'
        }
    ])
    .addField('#calle', [
        {
            rule: 'required',
            errorMessage: 'Escriba una dirección'
        },
    ])
    .addField('#estado', [
        {
            rule: 'required',
            errorMessage: 'Seleccione una opción'
        },
    ])
    .addField('#ciudad', [
        {
            rule: 'required',
            errorMessage: 'Escriba una ciudad válida'
        },
    ])
    .addField('#cp', [
        {
            rule: 'required',
            errorMessage: 'Escriba un código postal válido'
        },
        {
            rule: 'customRegexp',
            value: /^\d{5}$/,
            errorMessage: 'Escriba un código postal válido',
        }
    ])
    .onSuccess((evt)=>{
        //evt.target.submit();
        hacerRegistro();
    });
    function mostrarSuccess() {
        Swal.fire({
            title: "Registro exitoso",
            text: "Ya eres parte de nosotros :)",
            icon: "success"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/index.html';
            }
        });
    }
    function hacerRegistro() {
        const nombre = $('#nombre').val();
        const apellidoP = $('#apeP').val();
        const apellidoM = $('#apeM').val();
        const email = $('#email').val();
        const password = $('#password').val();
        const calle = $('#calle').val();
        const estado = $('#estado').val();
        const ciudad = $('#ciudad').val();
        const cp = $('#cp').val();


        const data = {
            nombre_usuario: nombre,
            email_usuario: email,
            password_usuario: password,
            apellidoP_usuario: apellidoP,
            apellidoM_usuario: apellidoM,
            calle_usuario: calle,
            estado_usuario: estado,
            ciudad_usuario: ciudad,
            cp_usuario: cp
        };

        $.ajax({
            url: '/php/registro.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                console.log(response);
                if (response.status === 200) {
                    mostrarSuccess();
                }else if(response.status == 500) {
                    Swal.fire({
                        title: "Hubo un error en tu registro :(",
                        text: "Ya existe un usuario con esta cuenta de correo",
                        icon: "error"
                    });
                } else {
                    Swal.fire({
                        title: "Hubo un error en tu registro :(",
                        text: "Verifica tus datos he inténtalo de nuevo",
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