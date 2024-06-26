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
    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->
</head>
<style>
    .hero {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .slider {
        width: 100%;
    }

    .slides {
        display: flex;
        padding: 0;
        margin: 0;
        list-style: none;
        overflow: hidden;
    }

    .slides li {
        position: relative;
        min-width: 100%;
        box-sizing: border-box;
    }

    .lazy-bg {
        background-size: cover;
        background-position: center center;
        width: 100%;
        height: 100vh; /* Ajuste a altura conforme necessário */
        background-repeat: no-repeat;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .slides li {
            height: 50vh; /* Ajuste para dispositivos móveis */
        }
    }
</style>

<body class="header-collapse">
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
                        <li class="menu-item current-menu-item"><a href="index.php">Página Principal</a></li>
                        <li class="menu-item"><a href="about.html">A Banda</a></li>
                        <li class="menu-item"><a href="gallery.php">Galeria</a></li>
                        
                        <li class="menu-item"><a href="blog.php">Blog</a></li>
                        <li class="menu-item"><a href="contact.php">Contacte-nos</a></li>
                    </ul> <!-- .menu -->
                </nav> <!-- .main-navigation -->
                <div class="mobile-menu"></div>
            </div>
        </header> <!-- .site-header -->

        <div class="hero">
            <div class="slider">
                <ul class="slides">
                    <li class="lazy-bg" data-background="dummy/slide-1.jpg">
                        <div class="container">
                            <h2 class="slide-title">&nbsp</h2>
                            <h3 class="slide-subtitle">&nbsp</h3>
                            <p class="slide-desc">&nbsp <br>&nbsp</p>
                        </div>
                    </li>
                    <li class="lazy-bg" data-background="dummy/slide-2.jpg">
                        <div class="container">
                            <h2 class="slide-title">&nbsp</h2>
                            <h3 class="slide-subtitle">&nbsp</h3>
                            <p class="slide-desc">&nbsp <br>&nbsp</p>
                        </div>
                    </li>
                    <li class="lazy-bg" data-background="dummy/slide-3.jpg">
                        <div class="container">
                            <h2 class="slide-title">&nbsp</h2>
                            <h3 class="slide-subtitle">&nbsp</h3>
                            <p class="slide-desc">&nbsp <br>&nbsp</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <main class="main-content">
            
            <div class="fullwidth-block upcoming-event-section" data-bg-color="#191919">
                <div class="container">
                    <header class="section-header">
                        <h2 class="section-title">Últimos eventos onde a banda esteve presente</h2>

                        <div class="event-nav">
                            <a class="prev" id="event-prev" href="#"><i class="fa fa-caret-left"></i></a>
                            <a class="next" id="event-next" href="#"><i class="fa fa-caret-right"></i></a>
                        </div> <!-- .event-nav -->

                    </header> <!-- .section-header -->
                    <?php
                    $servername = "localhost";
                    $username = "tomas";
                    $password = "!h01fFw35";
                    $dbname = "banda";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT dia, mes, titulo_1, legenda_1 FROM homepage WHERE dia IS NOT NULL";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<div class="event-carousel">';
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="event">';
                            echo '<div class="entry-date">';
                            echo '<div class="date">' . $row["dia"] . '</div>';
                            echo '<span class="month">' . $row["mes"] . '</span>';
                            echo '</div>';
                            echo '<h2 class="entry-title"><a href="#">' . $row["titulo_1"] . '</a></h2>';
                            echo '<p>' . $row["legenda_1"] . '</p>';
                            echo '</div> <!-- .event -->';
                        }
                        echo '</div> <!-- .event-carousel -->';
                    } else {
                        echo "<p>Nenhum evento encontrado.</p>";
                    }
                    $conn->close();
                    ?>
                </div> <!-- .container -->
            </div> <!-- .upcoming-event-section -->

            <?php
            $servername = "localhost";
            $username = "tomas";
            $password = "!h01fFw35";
            $dbname = "banda";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT foto, titulo_2, legenda_2 FROM homepage WHERE titulo_2 IS NOT NULL";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<div class="fullwidth-block why-chooseus-section">';
                echo '<div class="container">';
                echo '<h2 class="section-title">Eventos importantes em que a banda participou</h2>';
                echo '<div class="row">';

                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="feature">';
                    echo '<figure class="cut-corner">';
                    echo '<img src="' . $row["foto"] . '" alt="">';
                    echo '</figure>';
                    echo '<h3 class="feature-title">' . $row["titulo_2"] . '</h3>';
                    echo '<p>' . $row["legenda_2"] . '</p>';
                    echo '</div> <!-- .feature -->';
                    echo '</div>';
                }

                echo '</div>';
                echo '</div> <!-- .container -->';
                echo '</div> <!-- .why-chooseus-section -->';
            } else {
                echo "<p>Nenhum evento importante encontrado.</p>";
            }

            $conn->close();
            ?>
        </main> <!-- .main-content -->

        <footer class="site-footer">
            <div class="container">

                <address>
                    <p>Av. Salazar 7, 3440-183 Pinheiro de Ázere <br><a href="tel:968987358">(351) 968987358</a> <br> <a href="mailto:sofilepi@gmail.com">sofilepi@gmail.com</a></p> 
                </address> 

                <div class="social-links">
                    <a href="www.facebook.com/sflpinheirense/"><i class="fa fa-facebook-square"></i></a>
                    <a href="https://www.youtube.com/@bandamusicaldepinheirodeazere"><i class="fa fa-youtube"></i></a>

                <p class="copy">Copyright 2024 Banda Músical de Pinheiro de Azere.</p>
            </div>
        </footer> <!-- .site-footer -->
    </div> <!-- #site-content -->

    <script src="js/jquery-1.11.1.min.js"></script>      
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lazyBgElements = document.querySelectorAll('.lazy-bg');
            lazyBgElements.forEach(function(element) {
                var backgroundImage = element.getAttribute('data-background');
                element.style.backgroundImage = 'url(' + backgroundImage + ')';
            });
        });
    </script>
</body>
</html>
