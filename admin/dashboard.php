<?php
session_start();

// Incluir a função checkAdmin do login.php
require_once __DIR__ . '/login/login.php'; // Ajuste o caminho conforme necessário
checkAdmin();

// Recuperar dados do usuário da sessão
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_photo = $_SESSION['user_photo'];

// Construir o caminho completo da foto do usuário
$user_photo_path = '/admin/users/' . $user_photo;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin menu SFLP
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
  <link href="assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
  <!-- End Google Tag Manager -->
</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
      <a href="dashboard.php" class="simple-text logo-mini">
        AM
      </a>
      <a href="dashboard.php"class="simple-text logo-normal">
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
                        <?php echo htmlspecialchars($user_name); ?>
                        <b class="caret"></b>
                    </span>
                </a>
          <div class="collapse" id="collapseExample">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="sidebar-mini"> P </span>
                  <span class="sidebar-normal"> Perfil </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="sidebar-mini"> EP </span>
                  <span class="sidebar-normal"> Editar Perfil </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="sidebar-mini"> D </span>
                  <span class="sidebar-normal"> Definições </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <ul class="nav">
        <li class="nav-item active ">
          <a class="nav-link" href="dashboard.php">
            <i class="material-icons">dashboard</i>
            <p> Menu Principal </p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" data-toggle="collapse" href="#utilizadores">
            <i class="material-icons">person</i>
            <p> Utilizadores
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="utilizadores">
            <ul class="nav">
              <li class="nav-item ">
                <a class="nav-link" href="users/add_users.php">
                  <i class="material-icons"> person_add_alt </i>
                  <span class="sidebar-normal"> Adicionar Utilizadores </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="users/list_user.php">
                  <i class="material-icons"> list </i>
                  <span class="sidebar-normal"> lista de Utilizadores </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="calendar.php">
            <i class="material-icons">calendar_today</i>
            <p> Calendário </p>
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
                <a class="nav-link" href="edithomepage.php">
                  <i class="material-icons"> house </i>
                  <span class="sidebar-normal"> Página Principal </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="editgalery.php">
                  <i class="material-icons"> collections </i>
                  <span class="sidebar-normal"> Galeria </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="editblog.php">
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
            <a class="navbar-brand" href="dashboard.html">Menu Principal</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">notificações</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Conta
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="">Perfil</a>
                  <a class="dropdown-item" href="#">Definições</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="login/login.html">Terminar sessão</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons"></i>
                    </div>
                    <h4 class="card-title">Global Sales by Top Locations</h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="table-responsive table-sales">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>
                                  <div class="flag">
                                    <img src="assets/img/flags/US.png" </div>
                                </td>
                                <td>USA</td>
                                <td class="text-right">
                                  2.920
                                </td>
                                <td class="text-right">
                                  53.23%
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="flag">
                                    <img src="assets/img/flags/DE.png" </div>
                                </td>
                                <td>Germany</td>
                                <td class="text-right">
                                  1.300
                                </td>
                                <td class="text-right">
                                  20.43%
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="flag">
                                    <img src="assets/img/flags/AU.png" </div>
                                </td>
                                <td>Australia</td>
                                <td class="text-right">
                                  760
                                </td>
                                <td class="text-right">
                                  10.35%
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="flag">
                                    <img src="assets/img/flags/GB.png" </div>
                                </td>
                                <td>United Kingdom</td>
                                <td class="text-right">
                                  690
                                </td>
                                <td class="text-right">
                                  7.87%
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="flag">
                                    <img src="assets/img/flags/RO.png" </div>
                                </td>
                                <td>Romania</td>
                                <td class="text-right">
                                  600
                                </td>
                                <td class="text-right">
                                  5.94%
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="flag">
                                    <img src="assets/img/flags/BR.png" </div>
                                </td>
                                <td>Brasil</td>
                                <td class="text-right">
                                  550
                                </td>
                                <td class="text-right">
                                  4.34%
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                          </div>
                          <div class="col-md-6 ml-auto mr-auto">
                            <div id="worldMap" style="height: 300px;"></div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                        </div>
                        <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card card-chart">
                              <div class="card-header card-header-rose" data-header-animation="true">
                                <div class="ct-chart" id="websiteViewsChart"></div>
                              </div>
                              <div class="card-body">
                                <div class="card-actions">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                                    <i class="material-icons">refresh</i>
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </div>
                                <h4 class="card-title">Website Views</h4>
                                <p class="card-category">Last Campaign Performance</p>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card card-chart">
                              <div class="card-header card-header-success" data-header-animation="true">
                                <div class="ct-chart" id="dailySalesChart"></div>
                              </div>
                              <div class="card-body">
                                <div class="card-actions">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                                    <i class="material-icons">refresh</i>
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </div>
                                <h4 class="card-title">Daily Sales</h4>
                                <p class="card-category">
                                  <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">access_time</i> updated 4 minutes ago
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card card-chart">
                              <div class="card-header card-header-info" data-header-animation="true">
                                <div class="ct-chart" id="completedTasksChart"></div>
                              </div>
                              <div class="card-body">
                                <div class="card-actions">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                                    <i class="material-icons">refresh</i>
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </div>
                                <h4 class="card-title">Completed Tasks</h4>
                                <p class="card-category">Last Campaign Performance</p>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">weekend</i>
                                </div>
                                <p class="card-category">Bookings</p>
                                <h3 class="card-title">184</h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons text-danger">warning</i>
                                  <a href="#pablo">Get More Space...</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">equalizer</i>
                                </div>
                                <p class="card-category">Website Visits</p>
                                <h3 class="card-title">75.521</h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">local_offer</i> Tracked from Google Analytics
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">store</i>
                                </div>
                                <p class="card-category">Revenue</p>
                                <h3 class="card-title">$34,245</h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="fa fa-twitter"></i>
                                </div>
                                <p class="card-category">Followers</p>
                                <h3 class="card-title">+245</h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">update</i> Just Updated
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <h3>Manage Listings</h3>
                        <br>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="#pablo">
                                  <img class="img" src="assets/img/card-2.jpg">
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                  </button>
                                  <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                  </button>
                                </div>
                                <h4 class="card-title">
                                  <a href="#pablo">Cozy 5 Stars Apartment</a>
                                </h4>
                                <div class="card-description">
                                  The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="price">
                                  <h4>$899/night</h4>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons">place</i> Barcelona, Spain</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="#pablo">
                                  <img class="img" src="assets/img/card-3.jpg">
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                  </button>
                                  <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                  </button>
                                </div>
                                <h4 class="card-title">
                                  <a href="#pablo">Office Studio</a>
                                </h4>
                                <div class="card-description">
                                  The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the night life in London, UK.
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="price">
                                  <h4>$1.119/night</h4>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons">place</i> London, UK</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="#pablo">
                                  <img class="img" src="assets/img/card-1.jpg">
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                  </button>
                                  <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                  </button>
                                </div>
                                <h4 class="card-title">
                                  <a href="#pablo">Beautiful Castle</a>
                                </h4>
                                <div class="card-description">
                                  The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Milan.
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="price">
                                  <h4>$459/night</h4>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons">place</i> Milan, Italy</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <footer class="footer">
                    <div class="container-fluid">
                      <nav class="float-left">
                        <ul>
                          <li>
                            <a href="https://www.facebook.com/sflpinheirense?locale=pt_PT">
                              Facebook
                            </a>
                          </li>
                          <li>
                            <a href="https://www.creative-tim.com/license">
                              Licenças
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </footer>
                </div>
              </div>
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
                        <img src="assets/img/sidebar-1.jpg" alt="">
                      </a>
                    </li>
                    <li>
                      <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="assets/img/sidebar-2.jpg" alt="">
                      </a>
                    </li>
                    <li>
                      <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="assets/img/sidebar-3.jpg" alt="">
                      </a>
                    </li>
                    <li>
                      <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="assets/img/sidebar-4.jpg" alt="">
                      </a>
                    </li>
                    
                      <br>
                      <br>
                    </li>
                  </ul>
                </div>
              </div>
              <!--   Core JS Files   -->
              <script src="assets/js/core/jquery.min.js"></script>
              <script src="assets/js/core/popper.min.js"></script>
              <script src="assets/js/core/bootstrap-material-design.min.js"></script>
              <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
              <!-- Plugin for the momentJs  -->
              <script src="assets/js/plugins/moment.min.js"></script>
              <!--  Plugin for Sweet Alert -->
              <script src="assets/js/plugins/sweetalert2.js"></script>
              <!-- Forms Validations Plugin -->
              <script src="assets/js/plugins/jquery.validate.min.js"></script>
              <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
              <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
              <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
              <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
              <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
              <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
              <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
              <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
              <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
              <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
              <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
              <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
              <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
              <script src="assets/js/plugins/fullcalendar.min.js"></script>
              <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
              <script src="assets/js/plugins/jquery-jvectormap.js"></script>
              <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
              <script src="assets/js/plugins/nouislider.min.js"></script>
              <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
              <!-- Library for adding dinamically elements -->
              <script src="assets/js/plugins/arrive.min.js"></script>
              <!--  Google Maps Plugin    -->
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
              <!-- Place this tag in your head or just before your close body tag. -->
              <script async defer src="https://buttons.github.io/buttons.js"></script>
              <!-- Chartist JS -->
              <script src="assets/js/plugins/chartist.min.js"></script>
              <!--  Notifications Plugin    -->
              <script src="assets/js/plugins/bootstrap-notify.js"></script>
              <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
              <script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
              <!-- Material Dashboard DEMO methods, don't include it in your project! -->
              <script src="assets/demo/demo.js"></script>
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
              <script src="assets/demo/jquery.sharrre.js"></script>
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
                  // Javascript method's body can be found in assets/js/demos.js
                  md.initDashboardPageCharts();

                  md.initVectorMap();

                });
              </script>
</body>

</html>