$(document).ready(function() {
    // Función para cargar datos
    function loadData() {
        $.ajax({
            url: '/php/mostrarLibros.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // Llamar a la función para mostrar datos
                displayData(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    // Función para mostrar datos en HTML
    function displayData(data) {
        const libros = $('#libros');
        if (data && data.length > 0) {
            data.forEach(function(libro) {
                var productCard = `
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <a href="#" class="product-link mb-2" data-id="${libro.idProducto}">
                        <div class="card resultados">
                            <div class="card-body d-flex flex-column" style="overflow: hidden;">
                                <img src="/images/muestra.jpg" class="card-img-top img-fluid" alt="" style="max-height: 150px;">
                                <h5 class="card-title mt-2" style="font-size: 1rem;">${libro.Descripcion}</h5>
                                <p class="card-text" style="font-size: 0.875rem;">$${libro.Precio_Venta}</p>
                                <div class="row">
                                    <div class="col-sm-6"><button id="agregar" class="btn btn-dark mb-2" data-product-id="${libro.idProducto}"><i class="fa-solid fa-cart-shopping"></i></button></div>
                                    <div class="col-sm-6"><button id="apartar" class="btn btn-warning mb-2" data-product-id="${libro.idProducto}"><i class="fa-solid fa-star"></i></button></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                `;
                libros.append(productCard);
            });
    
            $('.product-link').on('click', function(e) {
                e.preventDefault();
                var id_producto = $(this).data('id');
                localStorage.setItem('selectedProductoId', id_producto);
                window.location.href = 'detalle_producto.php';
            });
        } else {
            productosContainer.append('<p>No se encontraron productos.</p>');
        }
    }

    // Cargar datos al cargar la página
    loadData();
});
