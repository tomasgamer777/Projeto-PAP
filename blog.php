<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Banda Musical de Pinheiro de Ázere</title>
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Loading main css file -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="site-content">
        <header class="site-header">
            <div class="container">
                <a href="index.php" id="branding">
                    <img src="dummy/logo1.png" alt="Site Title">
                    <small class="site-description"></small>
                </a>
                <!-- #branding -->

                <nav class="main-navigation">
                    <button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <li class="menu-item"><a href="index.php">Página Principal</a></li>
                        <li class="menu-item"><a href="about.html">A Banda</a></li>
                        <li class="menu-item"><a href="gallery.php">Galeria</a></li>
                        
                        <li class="menu-item current-menu-item"><a href="blog.php">Blog</a></li>
                        <li class="menu-item"><a href="contact.php">Contacte-nos</a></li>
                    </ul>
                    <!-- .menu -->
                </nav>
                <!-- .main-navigation -->
                <div class="mobile-menu"></div>
            </div>
        </header>
        <!-- .site-header -->

        <main class="main-content">
            <div class="fullwidth-block inner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="content">
                                <h2 class="entry-title">Blog</h2>

                                <?php
                                // Configuração da conexão com o banco de dados
                                $servername = "localhost";
								$username = "tomas";
								$password = "!h01fFw35";
								$dbname = "banda";

                                // Conexão com o banco de dados
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Verifica a conexão
                                if ($conn->connect_error) {
                                    die("Falha na conexão: " . $conn->connect_error);
                                }

                                // Query SQL para buscar posts do blog
                                $sql = "SELECT dia, mes, titulo, descricao, foto FROM blog";
                                $result = $conn->query($sql);

                                // Verifica se há resultados
                                if ($result->num_rows > 0) {
                                    // Itera sobre cada linha do resultado
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="post">';
                                        echo '<div class="entry-date">';
                                        echo '<div class="date">' . htmlspecialchars($row['dia']) . '</div>';
                                        echo '<span class="month">' . htmlspecialchars($row['mes']) . '</span>';
                                        echo '</div>';
                                        echo '<div class="featured-image">';
                                        echo '<img src="' . htmlspecialchars($row['foto']) . '" alt="">';
                                        echo '</div>';
                                        echo '<h2 class="entry-title">' . htmlspecialchars($row['titulo']) . '</a></h2>';
                                        echo '<p>' . htmlspecialchars($row['descricao']) . '</p>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "0 resultados encontrados";
                                }

                                // Fecha a conexão
                                $conn->close();
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .testimonial-section -->

        </main>
        <!-- .main-content -->

        <footer class="site-footer">
            <div class="container">

                <address>
                    <p>Av. Salazar 7, 3440-183 Pinheiro de Ázere <br><a href="tel:968987358">(351) 968987358</a> <br> <a href="mailto:sofilepi@gmail.com">sofilepi@gmail.com</a></p> 
                </address> 

                <div class="social-links">
                    <a href="www.facebook.com/sflpinheirense/"><i class="fa fa-facebook-square"></i></a>
                    <a href="https://www.youtube.com/@bandamusicaldepinheirodeazere"><i class="fa fa-youtube"></i></a>

                <p class="copy">Copyright 2014 Company Name. Designed by Themezy. All right reserved</p>
            </div>
        </footer> <!-- .site-footer -->
    </div> <!-- #site-content -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>

</body>
</html>
