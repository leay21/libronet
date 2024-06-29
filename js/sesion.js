$(document).ready(function() {
    const usuario = localStorage.getItem('usuario');
    const currentPath = window.location.pathname;
    console.log("estoy en este archivo js");
    console.log(usuario);
    console.log(currentPath);
    if (usuario) {
        if (currentPath === '/login.html' || currentPath === '/registro.html' || currentPath === '/index.html') {
            window.location.href = '/sesion/index.html';
        }
    } else {
        // Si no hay token y el usuario no está en la página de inicio de sesión, redirigir al inicio de sesión
        if (currentPath !== '/login.html' && currentPath !== '/index.html' && currentPath !== '/registro.html') {
            window.location.href = '/login.html';
        }
    }
});