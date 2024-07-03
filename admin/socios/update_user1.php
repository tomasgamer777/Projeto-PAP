<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo json_encode(["success" => false, "message" => "Usuário não está logado."]);
    exit;
}

$user_tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : null;
$user_status = isset($_SESSION['status']) ? $_SESSION['status'] : null;

// Verificar se tipo ou status estão nulos
if ($user_tipo === null || $user_status === null) {
    echo json_encode(["success" => false, "message" => "Tipo ou status do usuário não está definido."]);
    exit;
}

// Conectar ao banco de dados
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber os dados do formulário
$user_id = $_POST['user_id'];
$user_nome = $_POST['nome'];
$user_sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$telef = $_POST['telef'];
$morada = $_POST['morada'];
$data_nasc = $_POST['data_nasc'];
$cod_postal = $_POST['cod_postal'];
$nif = $_POST['nif'];
$distrito = $_POST['distrito'];
$profile_picture = null;

// Debugging - Verificar se os dados estão sendo recebidos
error_log("Nome: " . $user_nome);
error_log("Sobrenome: " . $user_sobrenome);

// Verificar se uma nova imagem de perfil foi enviada
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
    $fileName = $_FILES['profile_picture']['name'];
    $fileSize = $_FILES['profile_picture']['size'];
    $fileType = $_FILES['profile_picture']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Verificar se o arquivo é uma imagem válida
    $allowedfileExtensions = ['jpg', 'gif', 'png'];
    if (in_array($fileExtension, $allowedfileExtensions)) {
        // Nome do arquivo único
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Diretório de upload
        $uploadFileDir = '../users/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $profile_picture = $newFileName;
        } else {
            echo json_encode(["success" => false, "message" => "Erro ao mover a imagem de perfil para o diretório de upload."]);
            exit;
        }
    } else {
        echo json_encode(["success" => false, "message" => "Apenas arquivos JPG, GIF e PNG são permitidos."]);
        exit;
    }
}

// Preparar a declaração SQL para atualizar os dados do usuário
$sql = "UPDATE users SET nome=?, sobrenome=?, email=?, telef=?, morada=?, data_nasc=?, cod_postal=?, nif=?, distrito=?, tipo=?, status=?";
$params = [$user_nome, $user_sobrenome, $email, $telef, $morada, $data_nasc, $cod_postal, $nif, $distrito, $user_tipo, $user_status];

if ($profile_picture) {
    $sql .= ", foto=? WHERE user_id=?";
    $params[] = $profile_picture;
    $params[] = $user_id;
} else {
    $sql .= " WHERE user_id=?";
    $params[] = $user_id;
}

// Criação da string de tipos para bind_param
$param_types = str_repeat('s', count($params) - 1) . 'i'; // Tudo como string, exceto o último que é integer (user_id)

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    error_log("Erro na preparação da consulta: " . $conn->error);
    echo json_encode(["success" => false, "message" => "Erro na preparação da consulta: " . $conn->error]);
    exit;
}

// Ligando os parâmetros à declaração preparada
$stmt->bind_param($param_types, ...$params);

// Debugging - Verificar a consulta SQL
error_log("SQL: " . $sql);
error_log("Params: " . implode(", ", $params));

if ($stmt->execute()) {
    // Atualizar os dados da sessão
    $_SESSION['user_nome'] = $user_nome;
    $_SESSION['user_sobrenome'] = $user_sobrenome;
    $_SESSION['user_email'] = $email;
    $_SESSION['telef'] = $telef;
    $_SESSION['morada'] = $morada;
    $_SESSION['data_nascimento'] = $data_nasc;
    $_SESSION['cod_postal'] = $cod_postal;
    $_SESSION['nif'] = $nif;
    $_SESSION['distrito'] = $distrito;
    if ($profile_picture) {
        $_SESSION['user_photo'] = $profile_picture;
    }

    echo json_encode(["success" => true, "message" => "Usuário atualizado com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao atualizar usuário: " . $stmt->error]);
}

$stmt->close();
$conn->close();

?>
