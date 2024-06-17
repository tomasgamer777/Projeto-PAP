<?php
session_start();

// Incluir a função checkAdmin do login.php
require_once __DIR__ . '/login/login.php'; // Ajuste o caminho conforme necessário
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
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>ADMIN SFLP</title>
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
              <p> Menu Principal </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#utilizadores">
              <i class="material-icons">person</i>
              <p> Utilizadores <b class="caret"></b></p>
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
          <li class="nav-item active">
            <a class="nav-link" href="calendar.php">
              <i class="material-icons">calendar_today</i>
              <p> Calendário </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="notificacoes.php">
              <i class="material-icons">notifications</i>
              <p> Notificações </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#website">
              <i class="material-icons">public</i>
              <p> Editar Website <b class="caret"></b></p>
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
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Calendário</a>
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
                  <p class="d-lg-none d-md-block">Stats</p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <?php if ($noti_count > 0): ?>
                      <span class="notification"><?php echo $noti_count; ?></span>
                  <?php endif; ?>
                  <p class="d-lg-none d-md-block">Some Actions</p>
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
                  <p class="d-lg-none d-md-block">Conta</p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="">Perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="login/login.html">Terminar sessão</a>
                </div>
              </li>
            </ul>
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
                  <div id="fullCalendar" class="full-calendar"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
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
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>

  <!-- Script para inicializar o FullCalendar -->
  <script>
    $(document).ready(function() {

      // Função para buscar eventos
      var fetchEvents = function(start, end, timezone, callback) {
        // Aqui você deve implementar a lógica para buscar eventos do backend
        // Por exemplo, você pode usar AJAX para chamar um script PHP que retorna os eventos
        // Suponha que você tenha um script PHP para buscar os eventos chamado fetch_events.php

        $.ajax({
          url: 'fetch_events.php',
          dataType: 'json',
          success: function(data) {
            var events = [];
            $(data).each(function() {
              events.push({
                title: $(this).attr('title'),
                start: $(this).attr('start'),
                end: $(this).attr('end')
              });
            });
            callback(events);
          }
        });
      };

      // Configuração inicial do FullCalendar
      $('#fullCalendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        defaultView: 'month', // Visualização padrão do calendário
        editable: true, // Permite arrastar e redimensionar eventos
        droppable: true, // Permite soltar elementos no calendário

        events: fetchEvents, // Função para buscar eventos ao iniciar o calendário

        eventClick: function(event) {
          // Ação ao clicar em um evento
          alert('Evento: ' + event.title);
          // Aqui você pode implementar a lógica para exibir mais detalhes do evento
        },

        eventDrop: function(event, delta, revertFunc) {
          // Ação ao arrastar e soltar um evento
          alert(event.title + ' foi movido para ' + event.start.format());
          // Aqui você pode implementar a lógica para atualizar a posição do evento no backend
        },

        eventResize: function(event, delta, revertFunc) {
          // Ação ao redimensionar um evento
          alert(event.title + ' foi redimensionado');
          // Aqui você pode implementar a lógica para atualizar a duração do evento no backend
        },

        // Idioma do calendário
        locale: 'pt-br'
      });

    });
  </script>
</body>

</html>
