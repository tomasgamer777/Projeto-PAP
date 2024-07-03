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
                            <form id="contactForm" class="contact-form">
                                <input type="text" id="nome" name="nome" placeholder="Nome completo" required>
                                <input type="email" id="email" name="email" placeholder="Email" required>
                                <input type="text" id="assunto" name="assunto" placeholder="Assunto" required>
                                <textarea id="mensagem" name="mensagem" placeholder="Mensagem..." required></textarea>
                                <button type="button" id="enviarMensagem">Enviar mensagem</button>
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
                <address>
                    <p>Av. Salazar 7, 3440-183 Pinheiro de Ázere <br><a href="tel:968987358">(351) 968987358</a> <br> <a href="mailto:sofilepi@gmail.com">sofilepi@gmail.com</a></p> 
                </address> 
                
                <div class="social-links">
                    <a href="www.facebook.com/sflpinheirense/"><i class="fa fa-facebook-square"></i></a>
                    <a href="https://www.youtube.com/@bandamusicaldepinheirodeazere"><i class="fa fa-youtube"></i></a>
                </div>
                <p class="copy">Copyright 2024 Banda Músical de Pinheiro de Azere.</p>
            </div>
        </footer> <!-- .site-footer -->
    </div> <!-- #site-content -->
    
    <script src="js/jquery-1.11.1.min.js"></script>   
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>   
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- SweetAlert2 -->
    
    <script>
    $(document).ready(function() {
        $('#enviarMensagem').on('click', function() {
            var nome = $('#nome').val();
            var email = $('#email').val();
            var assunto = $('#assunto').val();
            var mensagem = $('#mensagem').val();
            
            $.ajax({
                type: 'POST',
                url: '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>',
                data: { nome: nome, email: email, assunto: assunto, mensagem: mensagem },
                success: function(response) {
                    if (response.trim() == 'Mensagem enviada com sucesso!') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sucesso',
                            text: response
                        });
                        // Limpar os campos do formulário após o envio bem-sucedido
                        $('#nome').val('');
                        $('#email').val('');
                        $('#assunto').val('');
                        $('#mensagem').val('');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: response
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Erro ao enviar mensagem: ' + error
                    });
                    console.error('Erro na requisição: ', error);
                }
            });
        });
    });
    </script>
    
</body>
</html>
