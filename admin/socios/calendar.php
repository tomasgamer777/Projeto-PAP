<?php
session_start();

// Incluir a função checkAdmin do login.php
require_once __DIR__ . '/../login/login.php'; // Ajuste o caminho conforme necessário
checkAdmin();

// Recuperar dados do usuário da sessão
$user_name = $_SESSION['user_name'];
$user_surname = $_SESSION['user_surname'];
$user_email = $_SESSION['user_email'];
$user_photo = $_SESSION['user_photo'];

$user_name1 = $user_name . $user_surname;

// Construir o caminho completo da foto do usuário
$user_photo_path = '/admin/users/' . $user_photo;
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Menu Sócios</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />

  <!-- FullCalendar CSS -->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.css' rel='stylesheet' />
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.print.min.css' rel='stylesheet' media='print' />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">AM</a>
        <a href="dashboard.php" class="simple-text logo-normal">ADMIN</a>
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
                  <a class="nav-link" href="#">
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
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">dashboard</i>
              <p> Pagamento de Quotas </p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="calendar.php">
              <i class="material-icons">calendar_today</i>
              <p> Calendário </p>
            </a>
          </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="calendar.php">Calendário</a>
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
                <a class="nav-link" href="dashboard.php">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <?php if ($noti_count > 0): ?>
                      <span class="notification"><?php echo $noti_count; ?></span>
                  <?php endif; ?>
                  <p class="d-lg-none d-md-block">
                      Some Actions
                  </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="notificacoes.php">
                      Notificações:   
                      <?php if ($noti_count > 0): ?>
                          <span class="badge badge-info"><?php echo $noti_count; ?></span>
                      <?php endif; ?>
                  </a>
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
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="login/login.html">Terminar sessão</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">calendar_today</i>
                  </div>
                  <h4 class="card-title">Calendário</h4>
                </div>
                <div class="card-body">
                  <div id='calendar'></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core JS Files -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="assets/js/plugins/moment.min.js"></script>

  <!-- FullCalendar JS -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/locale/pt.js'></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      locale: 'pt',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      eventLimit: true,
      events: '../fetch-events.php',
      selectable: true,
      selectHelper: true,

      editable: false,
      
    });
  });
</script>

</body>
</html>
