<?php
// Configurações da base de dados
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Captura os dados do formulário
$firstname = $conn->real_escape_string($_POST['firstname']);
$lastname = $conn->real_escape_string($_POST['lastname']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$data_parts = explode('/', $data_nascimento);
$data_nascimento_formatada = $data_parts[2] . '-' . $data_parts[1] . '-' . $data_parts[0];
$rua = $conn->real_escape_string($_POST['rua']);
$telefone = $conn->real_escape_string($_POST['telefone']);
$nif = $conn->real_escape_string($_POST['nif']);
$distrito = $conn->real_escape_string($_POST['distrito']);
$jobb = $conn->real_escape_string($_POST['jobb']);
$status = 2;

// Lida com o upload da imagem
$profile_picture = '';
if(isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0){
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $file_type = mime_content_type($_FILES['profile_picture']['tmp_name']);

    if(in_array($file_type, $allowed_types)) {
        $target_dir = "fotosperfil/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $profile_picture = $target_file;
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao fazer upload da imagem."]);
            exit;
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Por favor, envie um arquivo de imagem válido (jpeg, png, gif)."]);
        exit;
    }
}

// Encripta a senha
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Prepara a consulta SQL
$sql = "INSERT INTO users (nome, sobrenome, email, password, morada, telef, nif, distrito, data_nasc, tipo, status, foto) 
        VALUES ('$firstname', '$lastname', '$email', '$hashed_password', '$rua', '$telefone', '$nif', '$distrito', '$data_nascimento', '$jobb', '$status', '$profile_picture')";

// Executa a consulta
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Novo registro criado com sucesso"]);
} else {
    echo json_encode(["status" => "error", "message" => "Erro: " . $sql . "<br>" . $conn->error]);
}

// Fecha a conexão
$conn->close();
?>
