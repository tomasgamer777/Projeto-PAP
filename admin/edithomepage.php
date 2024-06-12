<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard PRO by Creative Tim
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
        <a href="dashboard.html" class="simple-text logo-mini">
          AM
        </a>
        <a href="dashboard.html" class="simple-text logo-normal">
          ADMIN
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="assets/img/faces/avatar.jpg" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                Tomás Calçada
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
          <li class="nav-item  ">
            <a class="nav-link" href="dashboard.html">
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
                  <a class="nav-link" href="pusers/add_users.html">
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
            <a class="nav-link" href="calendar.html">
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
                <li class="nav-item active">
                  <a class="nav-link" href="edithomepage.html">
                    <i class="material-icons"> house </i>
                    <span class="sidebar-normal"> Página Principal </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="editgalery.php">
                    <i class="material-icons"> collections </i>
                    <span class="sidebar-normal"> Galeria </span>
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
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Página Principal</a>
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
                <input type="text" value="" class="form-control" placeholder="Procurar...">
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
                  <p class="d-lg-none d-md-block">Stats</p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">Some Actions</p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">settings</i>
                  <p class="d-lg-none d-md-block">Settings</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Lista das últimas saídas</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Data</th>
                                            <th>Título</th>
                                            <th>Legenda</th>
                                            <th class="disabled-sorting text-right">Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>Data</th>
                                            <th>Título</th>
                                            <th>Legenda</th>
                                            <th class="text-right">Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    // Conexão com o banco de dados
                                    $servername = "localhost";
                                    $username = "tomas";
                                    $password = "!h01fFw35";
                                    $dbname = "banda";
    
                                    $conn = new mysqli($servername, $username, $password, $dbname);
    
                                    // Verifica a conexão
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
    
                                    $sql = "SELECT id, date, titulo_1, legenda_1 FROM homepage WHERE date IS NOT NULL";
                                    $result = $conn->query($sql);
    
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["date"] . "</td>";
                                            echo "<td>" . $row["titulo_1"] . "</td>";
                                            echo "<td>" . $row["legenda_1"] . "</td>";
                                            echo '<td class="text-right">
                                                     <button class="btn btn-link btn-warning btn-just-icon edit" data-toggle="modal" data-target="#editModal" data-id="' . $row["id"] . '" data-date="' . $row["date"] . '" data-titulo="' . $row["titulo_1"] . '" data-legenda="' . $row["legenda_1"] . '"><i class="material-icons">edit</i></button>
                                                  </td>';
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>Nenhum resultado encontrado.</td></tr>";
                                    }
                                    $conn->close();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!-- end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        </div>
    </div>

    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title">Lista de Eventos (Segunda Datatable)</h4>
            </div>
            <div class="card-body">
                <div class="toolbar">
                    <!-- Aqui você pode adicionar botões/ações adicionais para a barra de ferramentas -->
                </div>
                <div class="material-datatables">
                    <table id="datatables2" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <!-- Cabeçalho da Segunda Datatable -->
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Foto</th>
                                <th>Título</th>
                                <th>Legenda</th>
                                <th class="disabled-sorting text-right">Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Foto</th>
                                <th>Título</th>
                                <th>Legenda</th>
                                <th class="text-right">Ações</th>
                            </tr>
                        </tfoot>
                        <!-- Corpo da Segunda Datatable -->
                        <tbody>
                            <?php
                            // Conexão com o banco de dados
                            $servername = "localhost";
                            $username = "tomas";
                            $password = "!h01fFw35";
                            $dbname = "banda";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verifica a conexão
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT id, titulo_2, legenda_2, foto FROM homepage WHERE titulo_2 IS NOT NULL";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td><img src='../" . $row["foto"] . "' class='img-thumbnail' style='max-width:100px; max-height:100px;'></td>";
                                    echo "<td>" . $row["titulo_2"] . "</td>";
                                    echo "<td>" . $row["legenda_2"] . "</td>";
                                    echo '<td class="text-right">
                                             <button class="btn btn-link btn-warning btn-just-icon edit2" data-toggle="modal" data-target="#editModal2" 
                                                data-id="' . $row["id"] . '" 
                                                data-foto="' . $row["foto"] . '" 
                                                data-titulo2="' . $row["titulo_2"] . '" 
                                                data-legenda2="' . $row["legenda_2"] . '">
                                                <i class="material-icons">edit</i>
                                             </button>
                                          </td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Nenhum resultado encontrado.</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fim da Segunda Datatable e Modal de Edição -->
</div>
</div>

<!-- Modal de Edição (Segunda Datatable) -->
<div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="editModal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal2Label">Editar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm2">
            <div class="modal-body">
                <input type="hidden" id="edit_id" name="edit_id">
                <div class="form-group">
                    <label for="edit_foto">Foto</label>
                    <input type="file" class="form-control-file" id="edit_foto" name="edit_foto">
                    <img id="preview_edit_foto" src="#" alt="Pré-visualização da Imagem" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                </div>
                <div class="form-group">
                    <label for="edit_titulo">Título</label>
                    <input type="text" class="form-control" id="edit_titulo" name="edit_titulo" required>
                </div>
                <div class="form-group">
                    <label for="edit_legenda">Legenda</label>
                    <input type="text" class="form-control" id="edit_legenda" name="edit_legenda" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="saveChanges2">Salvar Alterações</button>
            </div>
        </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Função para pré-visualização da imagem
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_edit_foto').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Inicialização da DataTable
        $('#datatables2').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
            }
        });

        // Abrir o modal de edição ao clicar no botão de edição
        $(document).on('click', '.edit2', function () {
            var id = $(this).data('id');
            var foto = $(this).data('foto');
            var titulo = $(this).data('titulo2'); // Ajustado para 'titulo2'
            var legenda = $(this).data('legenda2'); // Ajustado para 'legenda2'

            // Atribuir os valores aos campos do modal
            $('#edit_id').val(id);
            $('#edit_titulo').val(titulo);
            $('#edit_legenda').val(legenda);

            // Pré-visualização da imagem atual
            $('#preview_edit_foto').attr('src', '../dummy/homepage/' + foto);

            $('#editModal2').modal('show');
        });

        // Pré-visualização da imagem ao selecionar um arquivo
        $("#edit_foto").change(function () {
            readURL(this);
        });

        // Processamento do formulário de edição via AJAX
        $('#saveChanges2').click(function () {
            var id = $('#edit_id').val();
            var titulo = $('#edit_titulo').val();
            var legenda = $('#edit_legenda').val();
            var formData = new FormData();

            // Adicionar dados ao FormData
            formData.append('id', id);
            formData.append('titulo_2', titulo); // Ajustado para 'titulo_2'
            formData.append('legenda_2', legenda); // Ajustado para 'legenda_2'

            // Verificar se foi selecionada uma nova imagem
            var fileInput = $('#edit_foto')[0];
            if (fileInput.files.length > 0) {
                formData.append('foto', fileInput.files[0]);
            }

            // Requisição AJAX para atualização dos dados
            $.ajax({
                url: 'update_event2.php',
                type: 'POST',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status == 'success') {
                        // Mostrar um alerta de sucesso
                        Swal.fire({
                            icon: 'success',
                            title: 'Sucesso!',
                            text: 'Evento atualizado com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            // Fechar o modal de edição
                            $('#editModal2').modal('hide');
                            // Recarregar a página para atualizar a datatable
                            location.reload(true);
                        });
                    } else {
                        // Mostrar um alerta de erro com animação
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: 'Erro ao atualizar o evento: ' + response.message,
                            showClass: {
                                popup: 'animate__animated animate__shakeX'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Mostrar um alerta de erro com animação
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: 'Erro ao atualizar o evento: ' + error,
                        showClass: {
                            popup: 'animate__animated animate__shakeX'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                }
            });
        });
    });
</script>


   <!-- Inclua SweetAlert no seu HTML -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Inclua SweetAlert no seu HTML -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Inclua SweetAlert no seu HTML -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Modal de Edição -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editId" name="id">
                    <div class="form-group">
                        <label for="editDate">Data <small class="text-muted">(dia e mês)</small></label>
                        <input type="text" class="form-control text-uppercase" id="editDate" name="date" placeholder="DD-MM">
                    </div>
                    <div class="form-group">
                        <label for="editTitulo">Título</label>
                        <input type="text" class="form-control" id="editTitulo" name="titulo_1">
                    </div>
                    <div class="form-group">
                        <label for="editLegenda">Legenda</label>
                        <input type="text" class="form-control" id="editLegenda" name="legenda_1">
                    </div>
                    <button type="button" class="btn btn-primary" id="saveChanges">Salvar Mudanças</button>
                </form>
            </div>
        </div>
    </div>
</div>




<style>
    .text-uppercase {
        text-transform: uppercase;
    }
</style>


    <!-- Inclua o JS necessário aqui (jQuery, Bootstrap etc.) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que disparou o modal
        var id = button.data('id');
        var date = button.data('date');
        var titulo = button.data('titulo');
        var legenda = button.data('legenda');

        var modal = $(this);
        modal.find('#editId').val(id);
        modal.find('#editDate').val(date);
        modal.find('#editTitulo').val(titulo);
        modal.find('#editLegenda').val(legenda);
    });

    $('#saveChanges').on('click', function () {
        var form = $('#editForm');
        // Transformando a data para maiúsculas antes de enviar
        var dateInput = $('#editDate');
        dateInput.val(dateInput.val().toUpperCase());

        $.ajax({
            type: "POST",
            url: "update_event.php", // Arquivo PHP para processar a atualização
            data: form.serialize(),
            success: function (response) {
                // Mostrar um alerta de sucesso com animação
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: 'Evento atualizado com sucesso!',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }).then(() => {
                    // Recarregar a página após o fechamento do modal
                    $('#editModal').modal('hide');
                    setTimeout(function() {
                        location.reload(true); // Forçar recarregar a página do servidor
                    }, 500); // Aguardar 500ms antes de recarregar
                });
            },
            error: function (xhr, status, error) {
                // Mostrar um alerta de erro com animação
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Erro ao atualizar o evento: ' + error,
                    showClass: {
                        popup: 'animate__animated animate__shakeX'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            }
        });
    });
</script>






    
      
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
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinput  -->
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
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




  <script>


    $(document).ready(function () {
      $().ready(function () {
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

        $('.fixed-plugin a').click(function (event) {
          // Alex if we click on switch, prevent the page from scrolling, otherwise let it go
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function () {
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

        $('.fixed-plugin .background-color .badge').click(function () {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function () {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function () {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function () {
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

        $('.switch-sidebar-image input').change(function () {
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

        $('.switch-sidebar-mini input').change(function () {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function () {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function () {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function () {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>
