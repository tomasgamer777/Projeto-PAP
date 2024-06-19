<?php
session_start();

// Definir o cabeçalho de resposta como JSON e desativar exibição de erros
header('Content-Type: application/json');
error_reporting(0);
ini_set('display_errors', 0);

// Função para enviar resposta JSON e encerrar o script
function send_json_response($success, $message) {
    echo json_encode(["success" => $success, "message" => $message]);
    exit;
}

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    send_json_response(false, "Usuário não está logado.");
}

// Conectar ao banco de dados
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    send_json_response(false, "Falha na conexão: " . $conn->connect_error);
}

// Receber os dados do formulário
$nome = $_POST['firstname'] ?? '';
$sobrenome = $_POST['lastname'] ?? '';
$password = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$telef = $_POST['telefone'] ?? '';
$morada = $_POST['rua'] ?? '';
$data_nascimento = $_POST['data_nascimento'] ?? '';
$cod_postal = $_POST['cod_postal'] ?? '';
$nif = $_POST['nif'] ?? '';
$distrito = $_POST['distrito'] ?? '';
$tipo = $_POST['jobb'] ?? '';
$status = 2; // Adicionando status padrão
$profile_picture = null;

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
        // Limpar o nome do arquivo
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Caminho para onde a imagem será movida
        $uploadFileDir = 'fotosperfil/';
        $dest_path = $uploadFileDir . $newFileName;

        if (!move_uploaded_file($fileTmpPath, $dest_path)) {
            send_json_response(false, "Erro ao mover o arquivo de imagem.");
        }
        $profile_picture = $dest_path;
    } else {
        send_json_response(false, "Formato de arquivo não suportado.");
    }
}

// Verificar se os campos obrigatórios estão vazios
if (empty($nome) || empty($sobrenome) || empty($email) || empty($telef) || empty($morada) || empty($data_nascimento) || empty($cod_postal) || empty($nif) || empty($distrito) || empty($password)) {
    send_json_response(false, "Todos os campos devem ser preenchidos.");
}

// Formatar a data de nascimento para o formato Y-m-d (que é o formato aceito pelo MySQL)
$date_parts = explode('/', $data_nascimento);
if (count($date_parts) == 3) {
    $data_nascimento_formatada = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0]; // dd/mm/yyyy to yyyy-mm-dd
} else {
    send_json_response(false, "Formato de data de nascimento inválido.");
}

// Criptografar a senha
$password_hashed = password_hash($password, PASSWORD_BCRYPT);

// Atualizar as informações do usuário no banco de dados
$sql = "INSERT INTO users (nome, sobrenome, email, password, telef, morada, data_nasc, cod_postal, nif, distrito, tipo, status" . ($profile_picture ? ", foto" : "") . ") 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?" . ($profile_picture ? ", ?" : "") . ")";

$stmt = $conn->prepare($sql);

if ($profile_picture) {
    $stmt->bind_param("ssssssssssiss", $nome, $sobrenome, $email, $password_hashed, $telef, $morada, $data_nascimento_formatada, $cod_postal, $nif, $distrito, $tipo, $status, $profile_picture);
} else {
    $stmt->bind_param("ssssssssssis", $nome, $sobrenome, $email, $password_hashed, $telef, $morada, $data_nascimento_formatada, $cod_postal, $nif, $distrito, $tipo, $status);
}

if ($stmt->execute()) {
    send_json_response(true, "Usuário adicionado com sucesso.");
} else {
    send_json_response(false, "Erro ao adicionar usuário: " . $stmt->error);
}

$stmt->close();
$conn->close();
?>
