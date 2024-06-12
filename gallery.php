<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Gallery | Band Template</title>
		<!-- Loading third party fonts -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

	<body>
		
		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="index.html" id="branding">
						<img src="dummy/logo1.png" alt="Site Title">
						<small class="site-description"></small>
					</a> <!-- #branding -->
					
					<nav class="main-navigation">
						<button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.html">Página Principal</a></li>
							<li class="menu-item"><a href="about.html">A Banda</a></li>
							<li class="menu-item current-menu-item"><a href="gallery.html">Galeria</a></li>
							<li class="menu-item"><a href="download.html">..</a></li>
							<li class="menu-item"><a href="blog.html">..</a></li>
							<li class="menu-item"><a href="contact.html">Contacte-nos</a></li>
						</ul> <!-- .menu -->
					</nav> <!-- .main-navigation -->
					<div class="mobile-menu"></div>
				</div>
			</header> <!-- .site-header -->
			
			<main class="main-content">
				<div class="fullwidth-block gallery">
				<div class="container">
					<div class="content fullwidth">
						<h2 class="entry-title">Galeria</h2>
						<div class="filter-links filterable-nav">
							<select class="mobile-filter">
								<option value="*">Mostrar tudo</option>
								<option value=".concert">Concertos</option>
								<option value=".band">Banda</option>
								<option value=".stuff">Coisas</option>
							</select>
							<a href="#" class="current" data-filter="*">Mostrar tudo</a>
							<a href="#" data-filter=".concert">Concertos</a>
							<a href="#" data-filter=".band">Banda</a>
							<a href="#" data-filter=".stuff">Coisas</a>
						</div>
						<div class="filterable-items">
							<?php
							$servername = "localhost";
							$username = "tomas";
							$password = "!h01fFw35";
							$dbname = "banda";

							// Criar conexão
							$conn = new mysqli($servername, $username, $password, $dbname);

							// Verificar conexão
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}

							$sql = "SELECT image_url_small, image_url_large, type FROM galeria ORDER BY uploaded_at DESC";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo "<div class='filterable-item " . $row["type"] . "'>
											<a href='" . $row["image_url_large"] . "'><figure><img src='" . $row["image_url_small"] . "' alt='Imagem'></figure></a>
										</div>";
								}
							} else {
								echo "0 resultados";
							}

							$conn->close();
							?>
						</div>
					</div>
				</div>
			</div> <!-- .testimonial-section -->

				
			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<img src="dummy/logo-footer.png" alt="Site Name">
					
					<address>
						<p>Av. Salazar 7, 3440-183 Pinheiro de Ázere <br><a href="tel:968987358">(351) 968987358</a> <br> <a href="mailto:sofilepi@gmail.com">sofilepi@gmail.com</a></p> 
					</address> 
					
					<div class="social-links">
						<a href="#"><i class="fa fa-facebook-square"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
					</div> <!-- .social-links -->
					
					<p class="copy">Copyright 2014 Company Name. Designed by Themezy. All right reserved</p>
				</div>
			</footer> <!-- .site-footer -->

		</div> <!-- #site-content -->

		<script src="js/jquery-1.11.1.min.js"></script>		
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>