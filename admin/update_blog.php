<?php
// Verifica se foi feita uma requisição POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações para o diretório de upload
    $uploadDir = "../dummy/"; // Diretório onde as imagens serão armazenadas
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
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $titulo = $_POST['titulo_1'];
    $legenda = $_POST['legenda_1'];
    $currentFoto = $_POST['foto']; // Caminho atual da foto no banco de dados

    // Verifica se foi enviada uma nova imagem
    if ($_FILES['foto']['name']) {
        // Remove a foto existente se já houver uma
        if ($currentFoto) {
            unlink("../" . $currentFoto); // Remove a foto anterior do diretório
        }

        // Faz o upload da nova foto
        $newPhoto = $_FILES['foto'];
        $newFilename = generateUniqueName($newPhoto['name']);
        $newPhotoPath = uploadFile($newPhoto, $uploadDir, $newFilename);

        if ($newPhotoPath) {
            // Atualiza o caminho da nova foto no banco de dados
            $newPhotoPathInDB = "dummy/" . $newFilename; // Caminho completo da nova foto
            $sql_update = "UPDATE blog SET dia=?, mes=?, titulo=?, descricao=?, foto=? WHERE id=?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("sssssi", $dia, $mes, $titulo, $legenda, $newPhotoPathInDB, $id);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Dados atualizados com sucesso!',
                    'foto' => $newPhotoPathInDB // Retornar o caminho da nova foto para atualização na interface
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
    } else {
        // Se não houver nova imagem, atualiza apenas os outros campos
        $sql_update = "UPDATE blog SET dia=?, mes=?, titulo=?, descricao=? WHERE id=?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ssssi", $dia, $mes, $titulo, $legenda, $id);
        $stmt_update->execute();

        if ($stmt_update->affected_rows > 0) {
            $response = array(
                'status' => 'success',
                'message' => 'Dados atualizados com sucesso!',
                'foto' => $newPhotoPathInDB  // opcional: enviar novos dados de volta
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Nenhum dado foi atualizado.'
            );
        }
        
        // Retorna a resposta JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;

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
