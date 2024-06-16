<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados (substitua com suas credenciais)
	$servername = "localhost";
    $username = "tomas";
    $password = "!h01fFw35";
    $dbname = "banda";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Receber e sanitizar dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $assunto = htmlspecialchars($_POST['assunto']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Preparar e executar a query SQL para inserir na tabela 'noti'
    $sql = "INSERT INTO noti (nome, email, assunto, mensagem) VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem: " . $conn->error;
    }

    // Fechar conexão
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>About Us| Band Template</title>
		<!-- Loading third party fonts -->
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
					<a href="index.php" id="branding">
						<img src="dummy/logo1.png" alt="Site Title">
						<small class="site-description"></small>
					</a> <!-- #branding -->
					
					<nav class="main-navigation">
						<button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">Página Principal</a></li>
							<li class="menu-item"><a href="about.html">A Banda</a></li>
							<li class="menu-item"><a href="gallery.php">Galeria</a></li>
							<li class="menu-item"><a href="download.html">Discografia</a></li>
							<li class="menu-item"><a href="blog.php">Blog</a></li>
							<li class="menu-item current-menu-item"><a href="contact.php">Contacte-nos</a></li>
						</ul> <!-- .menu -->
					</nav> <!-- .main-navigation -->
					<div class="mobile-menu"></div>
				</div>
			</header> <!-- .site-header -->
			
			<main class="main-content">
        <div class="fullwidth-block inner-content">
            <div class="container">
                <h2 class="page-title">Contacte-nos</h2>
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="contact-form">
                            <input type="text" name="nome" placeholder="Nome completo" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="text" name="assunto" placeholder="Assunto" required>
                            <textarea name="mensagem" placeholder="Mensagem..." required></textarea>
                            <input type="submit" name="enviar" value="Enviar mensagem">
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="map-wrapper">
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3040.072649085061!2d-8.117969087972705!3d40.36291345879328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd232013b30112c3%3A0x6b12dd56f148cb3d!2sSociedade%20Filarm%C3%B3nica%20Lealdade%20Pinheirense%20-%20Banda%20musical%20de%20Pinheiro%20de%20%C3%81zere!5e0!3m2!1spt-PT!2spt!4v1716241854855!5m2!1spt-PT!2spt" width="550" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <address>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <strong>Sociedade Filarmónica Lealdade Pinheirense</strong>
                                        <span>Av. Salazar 7, 3440-183 Pinheiro de Ázere</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="mailto:sofilepi@gmail.com">sofilepi@gmail.com</a> <br>
                                        <a href="tel:968987358">+351 968987358</a>
                                    </div>
                                </div>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>	
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>