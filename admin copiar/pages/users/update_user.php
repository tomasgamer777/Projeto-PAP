<?php
// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todas as informações necessárias foram recebidas
    if (isset($_POST['user_id']) && isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['telef']) && isset($_POST['morada']) && isset($_POST['tipo']) && isset($_POST['estado']) && isset($_POST['data_nasc']) && isset($_POST['distrito']) && isset($_POST['cod_postal']) && isset($_POST['nif'])) {
        // Obter os dados do formulário
        $user_id = $_POST['user_id'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $telef = $_POST['telef'];
        $morada = $_POST['morada'];
        $tipo = $_POST['tipo'];
        $estado = ($_POST['estado'] == 'on') ? 2 : 1; // Convertendo o estado para 2 (ativo) ou 1 (inativo)
        $data_nasc = $_POST['data_nasc'];
        $distrito = $_POST['distrito'];
        $cod_postal = $_POST['cod_postal'];
        $nif = $_POST['nif'];

        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "tomas";
        $password = "!h01fFw35";
        $dbname = "banda";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Verificar se uma nova imagem de perfil foi enviada
        if (!empty($_FILES['profile_picture']['name'])) {
            // Excluir a foto de perfil antiga do servidor
            $sql_select_foto = "SELECT foto FROM users WHERE user_id = ?";
            $stmt_select_foto = $conn->prepare($sql_select_foto);
            $stmt_select_foto->bind_param("i", $user_id);
            $stmt_select_foto->execute();
            $stmt_select_foto->store_result();

            if ($stmt_select_foto->num_rows > 0) {
                $stmt_select_foto->bind_result($old_photo);
                $stmt_select_foto->fetch();
                unlink("fotosperfil/" . $old_photo); // Excluir a foto de perfil antiga
            }

            // Carregar a nova foto de perfil
            $photo_name = $_FILES['profile_picture']['name'];
            $photo_tmp = $_FILES['profile_picture']['tmp_name'];
            $photo_path = "fotosperfil/" . $photo_name;

            if (move_uploaded_file($photo_tmp, $photo_path)) {
                // Atualizar o nome da foto no banco de dados
                $sql_update_photo = "UPDATE users SET foto = ? WHERE user_id = ?";
                $stmt_update_photo = $conn->prepare($sql_update_photo);
                $stmt_update_photo->bind_param("si", $photo_name, $user_id);
                $stmt_update_photo->execute();
                $stmt_update_photo->close();
            }
        }

        // Preparar e executar a consulta SQL para atualizar as informações do usuário
        $sql = "UPDATE users SET nome=?, sobrenome=?, email=?, telef=?, morada=?, tipo=?, status=?, data_nasc=?, distrito=?, cod_postal=?, nif=? WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssiisssii", $nome, $sobrenome, $email, $telef, $morada, $tipo, $estado, $data_nasc, $distrito, $cod_postal, $nif, $user_id);
        $stmt->execute();

        // Verificar se a atualização foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            // Se a atualização foi bem-sucedida, exibir um alerta de sucesso
            echo '<script>
                    swal({
                        title: "Sucesso!",
                        text: "As informações do usuário foram atualizadas com sucesso.",
                        type: "success",
                        confirmButtonClass: "btn btn-success",
                        buttonsStyling: false
                    }).then(() => {
                        // Redirecionar para a página de lista de usuários após o alerta
                        window.location.href = "lista_utilizadores.php";
                    });
                </script>';
        } else {
            // Se a atualização falhou, exibir um alerta de erro
            echo '<script>
                    swal({
                        title: "Erro",
                        text: "Ocorreu um erro ao tentar atualizar as informações do usuário.",
                        type: "error",
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    });
                </script>';
        }

        // Fechar a conexão com o banco de dados e liberar os recursos
        $stmt->close();
        $conn->close();
    }
}
?>
