<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Blog | Band Template</title>
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
                        <li class="menu-item"><a href="download.html">Discografia</a></li>
                        <li class="menu-item current-menu-item"><a href="blog.php">Blog</a></li>
                        <li class="menu-item"><a href="contact.html">Contacte-nos</a></li>
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
                <img src="dummy/logo-footer.png" alt="Site Name">

                <address>
                    <p>495 Brainard St. Detroit, MI 48201 <br><a href="tel:354543543">(563) 429 234 890</a> <br> <a href="mailto:info@bandname.com">info@bandname.com</a></p>
                </address>

                <form action="#" class="newsletter-form">
                    <input type="email" placeholder="Enter your email to join newsletter...">
                    <input type="submit" class="button cut-corner" value="Subscribe">
                </form>
                <!-- .newsletter-form -->

                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook-square"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
                <!-- .social-links -->

                <p class="copy">Copyright 2014 Company Name. Designed by Themezy. All right reserved</p>
            </div>
        </footer>
        <!-- .site-footer -->

    </div>
    <!-- #site-content -->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>

</body>
</html>
