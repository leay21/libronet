<?php

include('connection.php');

?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>LIBRERIA GRANFOX</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="../index.html">Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="../Catalogo.html">Catalogo</a></li>
						<li class="nav-item"><a class="nav-link" href="../about.html">Nosotros</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Apartados</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../politica.html">Politicas</a>
								<a class="dropdown-item" href="../admin.html">Administración</a>
								<a class="dropdown-item" href="../galeria.html">Galería Fotos</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="../blog.html">Blog</a></li>
						<li class="nav-item"><a class="nav-link" href="../eventos.html">Eventos</a></li>
						<li class="nav-item active"><a class="nav-link" href="../contact.html">Contacto</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>EDITAR COMENTARIOS</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
    
<table class="table table-dark table-striped">
  <thead>

  </thead>
  <tbody>

  <?php

    $id= $_GET["id"];
    $sql="SELECT * FROM contacto WHERE id='$id'";
    $result = mysqli_query($conexion, $sql);

    while($mostrar = mysqli_fetch_array($result)) {

?>
	<!-- Start Contacto -->
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>CONTACTO</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form action="procesar_editar.php" method="POST">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
                                <input type="hidden" value="<?php echo $mostrar['id']?>" name="id">
									<input type="text" class="form-control" id="nombre" value="<?php echo $mostrar['nombre']?>" name="txtnombre">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
                                <input type="text" class="form-control" id="apellido" value="<?php echo $mostrar['apellido']?>" name="txtapellido">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" id="email" class="form-control" value="<?php echo $mostrar['email']?>" name="txtemail" > 
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" id="tel" class="form-control" value="<?php echo $mostrar['tel']?>" pattern="[0-9]{10}" name="txttel">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group"> 
                                <textarea class="form-control" id="mensaje" rows="4" name="txtmensaje"><?php echo $mostrar['mensaje']; ?></textarea>
									<div class="help-block with-errors"></div>
								</div>
                                <?php
                                    }
                                ?>
								<div class="submit-button text-center">
									<button class="btn btn-common" id="submit" type="submit">Actualizar</button>
									<div class="clearfix"></div> 
									<br>
								</div>
							</div>
						</div>            
					</form>
				</div>
			</div>
		</div>

	<!-- End Contact -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<a href="tel:+529514197937"><i class="fa fa-volume-control-phone"></i></a>
					<div class="overflow-hidden">
						<h4><a href="tel:+529514197937" style="color: white;">Phone</h4></a>
						<p class="lead">
							<a href="tel:+529514197937" style="color: white;">9514197937</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">
			<a href="mailto:yourmail@gmail.com?subject=Asunto del correo&body=Cuerpo del mensaje"><i class="fa fa-envelope"></i></a>
					<div class="overflow-hidden">
						<h4><a href="mailto:yourmail@gmail.com?subject=Asunto del correo&body=Cuerpo del mensaje" style="color: white;">Email</h4></a>
						<p class="lead">
							<a href="mailto:yourmail@gmail.com?subject=Asunto del correo&body=Cuerpo del mensaje" style="color: white;">yourmail@gmail.com</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">
				<a href="https://goo.gl/maps/VCwTLs5QHq3W2WEa7?coh=178573&entry=tt" target="_blank"><i class="fa fa-map-marker"></i></a>
					<div class="overflow-hidden">
						<h4><a href="https://goo.gl/maps/VCwTLs5QHq3W2WEa7?coh=178573&entry=tt" target="_blank" style="color: white;">Location</h4></a>
						<p class="lead">
							<a href="https://goo.gl/maps/VCwTLs5QHq3W2WEa7?coh=178573&entry=tt" target="_blank" style="color: white;"> ESCOM</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>SOBRE NOSOTROS</h3>
					<p class="text-justify">La librería fue fundada en 2022 por Atl Cardoso y Jorge Hernandez con la visión de crear un espacio dedicado a la promoción del conocimiento, el aprendizaje y el acceso a la literatura y recursos educativos. La idea surgió de la pasión compartida por los libros y el deseo de crear un entorno acogedor donde las personas pudieran explorar, descubrir y sumergirse en el mundo de la lectura.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>HORARIO</h3>
					<p><span class="text-color">LUNES: </span>Cerrado</p>
					<p><span class="text-color">MAR-MIE :</span> 9:Am - 10PM</p>
					<p><span class="text-color">JUE-VIE :</span> 9:Am - 10PM</p>
					<p><span class="text-color">SAB-DOM :</span> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>INFORMACION DE CONTACTO</h3>
					<p class="lead"><a href="https://goo.gl/maps/VCwTLs5QHq3W2WEa7?coh=178573&entry=tt" target="_blank">ESCOM</p></a>
					<p class="lead"><a href="tel:+529514197937">+01 2000 800 9999</a></p>
					<p class="lead"><a href="mailto:yourmail@gmail.com?subject=Asunto del correo&body=Cuerpo del mensaje">Email</h4></a></p>
				</div>

				<div class="col-lg-3 col-md-6">
					<h3>SUSCRIBETE</h3>
				<div class="subscribe_form">
					<form class="subscribe_form" onsubmit="showSubscriptionMessage(event)">
					<input name="EMAIL" id="subs-email" class="form_input" placeholder="Correo Electrónico..." type="email">
						<button type="submit" class="submit">SUBSCRIBETE</button>
				<div class="clearfix"></div>
				</form>
				<div id="subscription-message" class="subscription-message hidden"></div>
					</div>
				</div>

					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100003220552651" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="https://twitter.com/Atl1God" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="https://github.com/Dxniel7" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/dxniel_hernandez_/?hl=es" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">Todos los derechos reservados. &copy; 2023 <a href="#">LIBRERIA GRANFOX</a> Hecho por :
					<br> 
					<a href="https://github.com/Dxniel7" target="_blank">Hernandez Vazquez Jorge Daniel</a>
					<br>
					<a href="https://github.com/AtlGod" target="_blank">Cardoso Osorio Atl Yosafat</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	
	<script src="../js/jquery.superslides.min.js"></script>
	<script src="../js/images-loded.min.js"></script>
	<script src="../js/isotope.min.js"></script>
	<script src="../js/baguetteBox.min.js"></script>
	<script src="../js/jquery.mapify.js"></script>
	<script src="../js/form-validator.min.js"></script>
    <script src="../js/contact-form-script.js"></script>
    <script src="../js/custom.js"></script>
	<script src="../js/suscribe.js"></script>
	<script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>
</html>