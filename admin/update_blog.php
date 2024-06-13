<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua com suas próprias credenciais)
    $servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Inicia a sessão para usar variáveis de sessão
    session_start();

    // Obtém os dados do formulário
    $id = $_POST['editId'];
    $dia = $_POST['editDia'];
    $mes = strtoupper($_POST['editMes']); // Transforma o mês em maiúsculo
    $titulo = $_POST['editTitulo'];
    $legenda = $_POST['editLegenda'];

    // Verifica se um novo arquivo de imagem foi enviado
    if ($_FILES['editFoto']['name']) {
        $target_dir = "../dummy/";
        $target_file = $target_dir . basename($_FILES["editFoto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo de imagem é uma imagem real
        $check = getimagesize($_FILES["editFoto"]["tmp_name"]);
        if ($check === false) {
            echo "Erro: O arquivo enviado não é uma imagem válida.";
            $uploadOk = 0;
        }

        // Verifica se o arquivo já existe
        if (file_exists($target_file)) {
            echo "Erro: Já existe um arquivo com este nome.";
            $uploadOk = 0;
        }

        // Limita o tamanho do arquivo de imagem (opcional)
        if ($_FILES["editFoto"]["size"] > 500000) {
            echo "Erro: O arquivo é muito grande.";
            $uploadOk = 0;
        }

        // Permitir apenas certos formatos de arquivo de imagem
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Erro: Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
            $uploadOk = 0;
        }

        // Se tudo estiver correto, tenta fazer o upload da imagem
        if ($uploadOk) {
            if (move_uploaded_file($_FILES["editFoto"]["tmp_name"], $target_file)) {
                // Atualiza o caminho da imagem no banco de dados
                $foto_caminho = "dummy/" . basename($_FILES["editFoto"]["name"]);
                $sql_update = "UPDATE blog SET dia='$dia', mes='$mes', titulo='$titulo', descricao='$legenda', foto='$foto_caminho' WHERE id='$id'";

                if ($conn->query($sql_update) === TRUE) {
                    echo "Registro atualizado com sucesso.";
                } else {
                    echo "Erro ao atualizar o registro: " . $conn->error;
                }

                // Excluir a imagem antiga do servidor (opcional)
                $sql_select_foto_antiga = "SELECT foto FROM blog WHERE id='$id'";
                $result = $conn->query($sql_select_foto_antiga);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $foto_antiga = "../" . $row['foto'];
                    if (file_exists($foto_antiga)) {
                        unlink($foto_antiga);
                    }
                }
            } else {
                echo "Erro ao fazer o upload do arquivo.";
            }
        }
    } else {
        // Caso não tenha sido enviado um novo arquivo de imagem, atualiza apenas os outros campos
        $sql_update = "UPDATE blog SET dia='$dia', mes='$mes', titulo='$titulo', descricao='$legenda' WHERE id='$id'";

        if ($conn->query($sql_update) === TRUE) {
            echo "Registro atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar o registro: " . $conn->error;
        }
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo "Erro: Método de requisição inválido.";
}
?>