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
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">Some Actions</p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Notification 1</a>
                  <a class="dropdown-item" href="#">Notification 2</a>
                  <a class="dropdown-item" href="#">Notification 3</a>
                  <a class="dropdown-item" href="#">Notification 4</a>
                  <a class="dropdown-item" href="#">Notification 5</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">Conta</p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../login/login.html">Terminar sessão</a>
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
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Calendário</h4>
                  <p class="card-category">Agenda de Eventos</p>
                </div>
                <div class="card-body">
                  <div id="calendar"></div>
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
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- FullCalendar JS -->
  <script src='https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.js'></script>
  <!-- FullCalendar translation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.5/locale/pt.js"></script>

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
      events: 'fetch-events.php',
      selectable: true,
      selectHelper: true,
      select: function(startSelect, endSelect) {
        // Adicionar evento
        Swal.fire({
          title: 'Adicionar Evento',
          html:
            '<input id="swal-input1" class="swal2-input" placeholder="Título do Evento">' +
            '<input id="swal-input2" class="swal2-input" placeholder="Data de Início" disabled>',
          focusConfirm: false,
          preConfirm: () => {
            const title = document.getElementById('swal-input1').value;
            const start = moment(startSelect).format('YYYY-MM-DD HH:mm:ss');
            const end = moment(endSelect).format('YYYY-MM-DD HH:mm:ss');
            if (!title) {
              Swal.showValidationMessage('Título do evento é obrigatório');
            }
            return { title, start, end };
          },
          showCancelButton: true,
          confirmButtonText: 'Adicionar',
          cancelButtonText: 'Cancelar',
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: 'add-event.php',
              type: 'POST',
              data: {
                title: result.value.title,
                start: result.value.start,
                end: result.value.end
              },
              success: function(response) {
                Swal.fire({
                  title: 'Sucesso!',
                  text: 'Evento adicionado com sucesso.',
                  icon: 'success',
                  timer: 1500,
                  timerProgressBar: true,
                  showConfirmButton: false
                });
                $('#calendar').fullCalendar('refetchEvents');
              },
              error: function(xhr, status, error) {
                Swal.fire({
                  title: 'Erro!',
                  text: 'Ocorreu um erro ao adicionar o evento.',
                  icon: 'error',
                  confirmButtonText: 'OK'
                });
              }
            });
          }
        });
      },
      editable: true,
      eventDrop: function(event, delta, revertFunc) {
        // Atualizar evento arrastado
        const start = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
        const end = moment(event.end).format('YYYY-MM-DD HH:mm:ss');
        $.ajax({
          url: 'update-event.php',
          type: 'POST',
          data: {
            id: event.id,
            title: event.title,
            start: start,
            end: end
          },
          success: function(response) {
            Swal.fire({
              title: 'Sucesso!',
              text: 'Evento atualizado com sucesso.',
              icon: 'success',
              timer: 1500,
              timerProgressBar: true,
              showConfirmButton: false
            });
          },
          error: function(xhr, status, error) {
            revertFunc();
            Swal.fire({
              title: 'Erro!',
              text: 'Ocorreu um erro ao atualizar o evento.',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          }
        });
      },
      eventClick: function(event) {
        // Editar ou eliminar evento existente
        Swal.fire({
          title: 'Editar ou Eliminar Evento',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Editar',
          cancelButtonText: 'Eliminar',
          showCloseButton: true,
          html: '<input id="swal-input1" class="swal2-input" value="' + event.title + '">' +
                '<input id="swal-input2" class="swal2-input" value="' + moment(event.start).format('YYYY-MM-DD HH:mm:ss') + '" disabled>',
        }).then((result) => {
          if (result.isConfirmed) {
            const title = document.getElementById('swal-input1').value;
            const start = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
            const end = moment(event.end).format('YYYY-MM-DD HH:mm:ss');
            if (!title) {
              Swal.showValidationMessage('Título do evento é obrigatório');
              return false;
            }
            $.ajax({
              url: 'update-event.php',
              type: 'POST',
              data: {
                id: event.id,
                title: title,
                start: start,
                end: end
              },
              success: function(response) {
                Swal.fire({
                  title: 'Sucesso!',
                  text: 'Evento atualizado com sucesso.',
                  icon: 'success',
                  timer: 1500,
                  timerProgressBar: true,
                  showConfirmButton: false
                });
                $('#calendar').fullCalendar('refetchEvents');
              },
              error: function(xhr, status, error) {
                Swal.fire({
                  title: 'Erro!',
                  text: 'Ocorreu um erro ao atualizar o evento.',
                  icon: 'error',
                  confirmButtonText: 'OK'
                });
              }
            });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
              title: 'Eliminar Evento',
              text: 'Tem certeza que deseja eliminar este evento?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Sim, eliminar',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: 'delete-event.php',
                  type: 'POST',
                  data: {
                    id: event.id
                  },
                  success: function(response) {
                    Swal.fire({
                      title: 'Eliminado!',
                      text: 'O evento foi eliminado com sucesso.',
                      icon: 'success',
                      timer: 1500,
                      timerProgressBar: true,
                      showConfirmButton: false
                    });
                    $('#calendar').fullCalendar('refetchEvents');
                  },
                  error: function(xhr, status, error) {
                    Swal.fire({
                      title: 'Erro!',
                      text: 'Ocorreu um erro ao eliminar o evento.',
                      icon: 'error',
                      confirmButtonText: 'OK'
                    });
                  }
                });
              }
            });
          }
        });
      }
    });
  });
</script>

</body>
</html>
