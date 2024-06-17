<!DOCTYPE html>
<html lang="pt-br">
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
  <!-- FullCalendar Language -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/pt-br.js'></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
      <!-- Sidebar Content -->
    </div>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <!-- Navbar Content -->
      </nav>
      <div class="content">
        <div class="container-fluid">
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- FullCalendar -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.js'></script>
  <script>
    $(document).ready(function() {
      $('#calendar').fullCalendar({
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
        },
        // Configurações adicionais do calendário
        locale: 'pt-br', // Define o idioma para português brasileiro
        eventRender: function(event, element) {
          element.attr('title', event.title); // Adiciona o título do evento como tooltip
        }
      });
    });
  </script>
</body>
</html>
