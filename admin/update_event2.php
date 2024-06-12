<?php
// Verifica se foi recebido um arquivo
if (isset($_FILES['edit_foto'])) {
    // Configurações para o upload da imagem
    $target_dir = "../dummy/homepage/";
    $target_file = $target_dir . basename($_FILES['edit_foto']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifica se é uma imagem real ou um arquivo fake
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES['edit_foto']['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    // Verifica se o ficheiro já existe
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Verifica o tamanho do ficheiro
    if ($_FILES['edit_foto']['size'] > 500000) {
        $uploadOk = 0;
    }

    // Permite apenas certos formatos de ficheiros
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    // Se houver algum erro, o upload não será feito
    if ($uploadOk == 0) {
        echo "Erro ao fazer upload do ficheiro.";
    } else {
        // Tenta fazer o upload do ficheiro
        if (move_uploaded_file($_FILES['edit_foto']['tmp_name'], $target_file)) {
            // Aqui você pode salvar o caminho completo no banco de dados
            $servername = "localhost";
            $username = "tomas";
            $password = "!h01fFw35";
            $dbname = "banda";

            // Cria conexão
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            // Prepara os dados para inserção no banco de dados
            $id = $_POST['id'];
            $titulo = $_POST['titulo_2'];
            $legenda = $_POST['legenda_2'];
            $foto = "dummy/homepage/" . basename($_FILES['edit_foto']['name']); // Caminho completo da foto

            // SQL para atualizar os dados na tabela
            $sql = "UPDATE homepage SET titulo_2='$titulo', legenda_2='$legenda', foto='$foto' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                // Se a atualização for bem-sucedida
                $response = array("status" => "success");
                echo json_encode($response);
            } else {
                // Se houver um erro na atualização
                $response = array("status" => "error", "message" => $conn->error);
                echo json_encode($response);
            }

            $conn->close();
        } else {
            echo "Erro ao fazer upload do ficheiro.";
        }
    }
} else {
    echo "Ficheiro não foi enviado.";
}
?>
