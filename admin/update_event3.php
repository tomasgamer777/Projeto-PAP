<?php
// Verifica se foi feita uma requisição POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações para o diretório de upload
    $uploadDir = "../dummy/homepage/"; // Diretório onde as imagens serão armazenadas
    $allowedExtensions = array("jpg", "jpeg", "png"); // Extensões de arquivo permitidas

    // Função para gerar nome único para o arquivo
    function generateUniqueName($filename) {
        $pathinfo = pathinfo($filename);
        $basename = $pathinfo['filename']; // Nome do arquivo sem extensão
        $extension = $pathinfo['extension']; // Extensão do arquivo
        $uniqueName = $basename . '_' . uniqid() . '.' . $extension; // Nome único
        return $uniqueName;
    }

    // Função para mover o arquivo para o diretório de upload
    function uploadFile($file, $uploadDir, $newFilename) {
        $filename = $file['name'];
        $tempName = $file['tmp_name'];
        $targetFile = $uploadDir . $newFilename;

        if (move_uploaded_file($tempName, $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }

    // Conexão com o banco de dados (substitua com suas credenciais)
    $servername = "localhost";
    $username = "tomas";
    $password = "!h01fFw35";
    $dbname = "banda";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Obtem os dados do formulário
    $id = $_POST['id'];

    // Verifica se foi enviada uma nova imagem
    if ($_FILES['edit_foto1']['name']) {
        // Remove a foto existente se já houver uma
        $sql_select = "SELECT header FROM homepage WHERE id = ?";
        $stmt_select = $conn->prepare($sql_select);
        $stmt_select->bind_param("i", $id);
        $stmt_select->execute();
        $stmt_select->bind_result($existingPhoto);
        $stmt_select->fetch();
        $stmt_select->close();

        if ($existingPhoto) {
            unlink($uploadDir . $existingPhoto); // Remove a foto anterior do diretório
        }

        // Faz o upload da nova foto
        $newPhoto = $_FILES['edit_foto1'];
        $newFilename = 'slide_' . generateUniqueName($newPhoto['name']);
        $newPhotoPath = uploadFile($newPhoto, $uploadDir, $newFilename);

        if ($newPhotoPath) {
            // Atualiza o caminho da nova foto no banco de dados
            $newPhotoPathInDB = "dummy/homepage/" . $newFilename; // Caminho completo da nova foto
            $sql_update = "UPDATE homepage SET header = ? WHERE id = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("sssi", $newPhotoPathInDB, $id);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Dados atualizados com sucesso!'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Nenhum dado foi atualizado.'
                );
            }

            $stmt_update->close();
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Erro ao fazer upload da imagem.'
            );
        }
    }

    // Fecha a conexão com o banco de dados e retorna a resposta em formato JSON
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
} else {
    // Se a requisição não for do tipo POST, retorna um erro
    http_response_code(405); // Método não permitido
    echo json_encode(array('status' => 'error', 'message' => 'Método não permitido.'));
    exit;
}
?>
