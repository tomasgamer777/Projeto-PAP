<?php
session_start();

// Incluir a função checkAdmin do login.php
require_once __DIR__ . '/../login/login.php'; // Ajuste o caminho conforme necessário
checkAdmin();

if ($_SESSION['tipo'] == 3){
  header("Location: " . '/admin/socios/dashboard_socios.php');
} else if ($_SESSION['tipo'] == 2){
  header("Location: " . '/admin/musicos/dashboard_musicos.php');
}

// Recuperar dados do usuário da sessão
$user_nome = $_SESSION['user_nome'];
$user_sobrenome = $_SESSION['user_sobrenome'];
$user_email = $_SESSION['user_email'];
$user_foto = $_SESSION['user_photo'];

$user_name1 = $user_nome . ' ' . $user_sobrenome;

// Construir o caminho completo da foto do usuário
$user_photo_path = '/admin/users/' . $user_foto;
?>




<!DOCTYPE html>
<html lang="en">

<head>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ADMIN SFLP
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
  <!--  Social tags      -->
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, material design, material dashboard bootstrap 4 dashboard">
  <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Material Dashboard PRO by Creative Tim">
  <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
  <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim">
  <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="http://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html" />
  <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg" />
  <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design." />
  <meta property="og:site_name" content="Creative Tim" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="../assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  
</head>
<script>
    $(document).ready(function() {
        $("#data_nascimento").datepicker({
            dateFormat: "dd/mm/yy"
        });
    });
</script>
<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="../dashboard.php" class="simple-text logo-mini">
          AM
        </a>
        <a href="../dashboard.php"class="simple-text logo-normal">
          ADMIN
        </a>
      </div>
      <div class="sidebar-wrapper">
      <div class="user">
            <div class="photo">
                <img src="<?php echo htmlspecialchars($user_photo_path); ?>" alt="Foto do utilizador" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        <?php echo htmlspecialchars($user_name1); ?>
                        <b class="caret"></b>
                    </span>
                </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="edit_user1.php">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Editar Perfil </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="../dashboard.php">
              <i class="material-icons">dashboard</i>
              <p> Menu Principal </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#formsExamples">
              <i class="material-icons">person</i>
              <p> Utilizadores
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="formsExamples">
              <ul class="nav">
                <li class="nav-item active ">
                  <a class="nav-link" href="add_users.php">
                    <i class="material-icons"> person_add_alt </i>
                    <span class="sidebar-normal"> Adicionar Utilizador </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="list_user.php">
                    <i class="material-icons"> list </i>
                    <span class="sidebar-normal"> lista de Utilizadores </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../calendar.php">
              <i class="material-icons">calendar_today</i>
              <p> Calendário </p>
            </a>
          </li>
          <li class="nav-item ">
          <a class="nav-link" href="../notificacoes.php">
            <i class="material-icons">notifications</i>
            <p> Notificações </p>
          </a>
        </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#website">
              <i class="material-icons">public</i>
              <p> Editar Website
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="website">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../edithomepage.php">
                    <i class="material-icons"> house </i>
                    <span class="sidebar-normal"> Página Principal </span>
                  </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="../editgalery.php">
                    <i class="material-icons"> collections </i>
                    <span class="sidebar-normal"> Galeria </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../editblog.php">
                    <i class="material-icons"> newspaper </i>
                    <span class="sidebar-normal"> Blog </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="">Adicionar Utilizador</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="../dashboard.php">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Conta
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="edit_user1.php">Perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../login/login.html">Terminar sessão</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
<div class="content">
<div class="container-fluid">
  <div class="col-md-8 col-12 mr-auto ml-auto">
      <!--      Wizard container        -->
      <div class="wizard-container">
          <div class="card card-wizard" data-color="rose" id="wizardProfile">
            <form id="userForm" method="POST" enctype="multipart/form-data">
                  <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                  <div class="card-header text-center">
                      <h3 class="card-title">
                          Personaliza o Utilizador
                      </h3>
                  </div>
                  <div class="wizard-navigation">
                      <ul class="nav nav-pills">
                          <li class="nav-item">
                              <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                  Informações Básicas
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                                  Sobre
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                  Função
                              </a>
                          </li>
                      </ul>
                  </div>
                  <div class="card-body">
                      <div class="tab-content">
                              <div class="tab-pane active" id="about">
                                <h5 class="info-text"> Informações Básicas</h5>
                                <div class="row justify-content-center">
                                  <div class="col-sm-4">
                                    <div class="picture-container">
                                      <div class="picture">
                                        <img src="../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                        <input type="file" id="wizard-picture" name="profile_picture" accept="image/jpeg, image/png, image/gif" onchange="resizeImage(event)">
                                      </div>
                                      <h6 class="description">Foto de Perfil</h6>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="input-group form-control-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                              </span>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInput1" class="bmd-label-floating">Primeiro Nome</label>
                                              <input type="text" class="form-control" id="exampleInput1" name="firstname" required>
                                          </div>
                                      </div>
                                      <div class="input-group form-control-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">record_voice_over</i>
                                              </span>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInput11" class="bmd-label-floating">Sobrenome</label>
                                              <input type="text" class="form-control" id="exampleInput11" name="lastname" required>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-10 mt-3">
                                      <div class="input-group form-control-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">email</i>
                                              </span>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInput1" class="bmd-label-floating">Email </label>
                                              <input type="email" class="form-control" id="exampleemail" name="email" required>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-10 mt-3">
                                      <div class="input-group form-control-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">password</i>
                                              </span>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInput1" class="bmd-label-floating">Password </label>
                                              <input type="password" class="form-control" id="examplepassword" name="password" required>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane" id="account">
    <h5 class="info-text">Qual é a função do Utilizador?</h5>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                <!-- Opção existente para Admin -->
                <div class="col-sm-4">
                    <div class="choice" data-toggle="wizard-radio">
                        <input type="radio" name="jobb" value="4" id="admin">
                        <div class="icon">
                            <i class="material-icons">admin_panel_settings</i>
                        </div>
                        <h6>Admin</h6>
                    </div>
                </div>

                <!-- Opção existente para Músico -->
                <div class="col-sm-4">
                    <div class="choice" data-toggle="wizard-radio">
                        <input type="radio" name="jobb" value="2" id="musico">
                        <div class="icon">
                            <i class="material-icons">piano</i>
                        </div>
                        <h6>Músico</h6>
                    </div>
                </div>

                <!-- Opção existente para Sócio -->
                <div class="col-sm-4">
                    <div class="choice" data-toggle="wizard-radio">
                        <input type="radio" name="jobb" value="3" id="socio">
                        <div class="icon">
                            <i class="material-icons">payments</i>
                        </div>
                        <h6>Sócio</h6>
                    </div>
                </div>

                <!-- Nova opção para Aluno com código 1 -->
                <div class="col-sm-4">
                    <div class="choice" data-toggle="wizard-radio">
                        <input type="radio" name="jobb" value="1" id="aluno">
                        <div class="icon">
                            <i class="material-icons">school</i>
                        </div>
                        <h6>Aluno</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                        <style>
                          .error-message {
                              color: red;
                              display: none;
                          }
                      </style>
                        <div class="tab-pane" id="address">
                          <div class="row justify-content-center">
                              <div class="col-sm-12">
                                  <h5 class="info-text">Mais informações sobre o Utilizador</h5>
                              </div>
                              <div class="col-sm-7">
                                  <div class="form-group">
                                      <label>Data de Nascimento</label>
                                      <input type="text" class="form-control datepicker" id="data_nascimento" name="data_nascimento">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <div class="form-group">
                                      <label>Código Postal</label>
                                      <input type="text" class="form-control" name="cod_postal">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <div class="form-group">
                                      <label>Rua</label>
                                      <input type="text" class="form-control" name="rua">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="form-group">
                                  <label>Telefone</label>
                                  <input type="text" class="form-control" id="telefone" name="telefone" maxlength="9" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="form-group">
                                  <label>NIF</label>
                                  <input type="text" class="form-control" id="nif" name="nif" maxlength="9" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                </div>
                              </div>
                              
                              <div class="col-sm-5">
                                  <div class="form-group select-wizard">
                                      <label>Distrito</label>
                                      <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Single Select" name="distrito">
                                          <option value="Aveiro">Aveiro</option>
                                          <option value="Beja">Beja</option>
                                          <option value="Braga">Braga</option>
                                          <option value="Bragança">Bragança</option>
                                          <option value="Castelo Branco">Castelo Branco</option>
                                          <option value="Coimbra">Coimbra</option>
                                          <option value="Évora">Évora</option>
                                          <option value="Faro">Faro</option>
                                          <option value="Guarda">Guarda</option>
                                          <option value="Leiria">Leiria</option>
                                          <option value="Lisboa">Lisboa</option>
                                          <option value="Portalegre">Portalegre</option>
                                          <option value="Porto">Porto</option>
                                          <option value="Setúbal">Setúbal</option>
                                          <option value="Viana do Castelo">Viana do Castelo</option>
                                          <option value="Vila Real">Vila Real</option>
                                          <option value="Viseu">Viseu</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="mr-auto">
                      <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Voltar">
                    </div>
                    <div class="ml-auto">
                      <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Proximo">
                      <button type="button" class="btn btn-finish btn-fill btn-rose btn-wd" id="btnAddUser">Adicionar</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </form>
              </div>
            </div>
            <!-- wizard container -->
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function() {
    $('#btnAddUser').on('click', function() {
        console.log("Botão de adicionar clicado"); 
        var fileInput = $('#wizard-picture')[0];
        var file = fileInput.files[0];

        // Verifica se o arquivo é uma imagem
        if (file && !file.type.startsWith('image/')) {
            Swal.fire({
                title: "Erro!",
                text: "Por favor, envie um arquivo de imagem.",
                icon: "error",
                confirmButtonClass: "btn btn-danger",
                buttonsStyling: false
            });
            return;
        }

        var formData = new FormData($('#userForm')[0]);

        $.ajax({
            url: 'add_users1.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json', // Espera uma resposta JSON do servidor
            success: function(response) {
                // Verifica a resposta do servidor
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    }).then(function() {
                        // Redireciona ou realiza outras ações após o sucesso
                        window.location.href = 'add_users.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Erro ao enviar o formulário: ' + errorThrown,
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>




  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Filtros do Menu</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Fundo do menu</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="ml-auto mr-auto">
              <span class="badge filter badge-black active" data-background-color="black"></span>
              <span class="badge filter badge-white" data-background-color="white"></span>
              <span class="badge filter badge-red" data-background-color="red"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger">
            <p>Mini Menu</p>
            <label class="ml-auto">
              <div class="togglebutton switch-sidebar-mini">
                <label>
                  <input type="checkbox">
                  <span class="toggle"></span>
                </label>
              </div>
            </label>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger">
            <p>Imagem no menu</p>
            <label class="switch-mini ml-auto">
              <div class="togglebutton switch-sidebar-image">
                <label>
                  <input type="checkbox" checked="">
                  <span class="toggle"></span>
                </label>
              </div>
            </label>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Fundos</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>



  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

  <script>
    function resizeImage(event) {
      const file = event.target.files[0];
      const reader = new FileReader();
  
      reader.onload = function(e) {
        const img = new Image();
        img.src = e.target.result;
  
        img.onload = function() {
          const canvas = document.createElement('canvas');
          const ctx = canvas.getContext('2d');
  
          const maxDimension = 320;
          let width = img.width;
          let height = img.height;
  
          if (width > height) {
            if (width > maxDimension) {
              height *= maxDimension / width;
              width = maxDimension;
            }
          } else {
            if (height > maxDimension) {
              width *= maxDimension / height;
              height = maxDimension;
            }
          }
  
          canvas.width = width;
          canvas.height = height;
  
          ctx.drawImage(img, 0, 0, width, height);
  
          canvas.toBlob(function(blob) {
            const resizedFile = new File([blob], file.name, {
              type: file.type,
              lastModified: Date.now()
            });
  
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(resizedFile);
            document.getElementById('wizard-picture').files = dataTransfer.files;
          }, file.type);
        }
      }
      reader.readAsDataURL(file);
    }
  </script>

  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <!-- Sharrre libray -->
  <script src="../assets/demo/jquery.sharrre.js"></script>
  <script>
    $(document).ready(function() {


      $('#facebook').sharrre({
        share: {
          facebook: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('facebook');
        },
        template: '<i class="fab fa-facebook-f"></i> Facebook',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      $('#google').sharrre({
        share: {
          googlePlus: true
        },
        enableCounter: false,
        enableHover: false,
        enableTracking: true,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('googlePlus');
        },
        template: '<i class="fab fa-google-plus"></i> Google',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      $('#twitter').sharrre({
        share: {
          twitter: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        buttons: {
          twitter: {
            via: 'CreativeTim'
          }
        },
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('twitter');
        },
        template: '<i class="fab fa-twitter"></i> Twitter',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });


      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-46172202-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();

      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script>
    $(document).ready(function() {
      // Initialise the wizard
      demo.initMaterialWizard();
      setTimeout(function() {
        $('.card.card-wizard').addClass('active');
      }, 600);
    });
  </script>
  <script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      md.initFormExtendedDatetimepickers();
      if ($('.slider').length != 0) {
        md.initSliders();
      }
    });




    
  </script>



</body>

</html>