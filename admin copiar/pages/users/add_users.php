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
    die("Connection failed: " . $conn->connect_error);
}

// Captura os dados do formulário
$firstname = $conn->real_escape_string($_POST['firstname']);
$lastname = $conn->real_escape_string($_POST['lastname']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$data_nascimento = $conn->real_escape_string($_POST[data_nascimento]);
$rua = $conn->real_escape_string($_POST['rua']);
$telefone = $conn->real_escape_string($_POST['telefone']);
$nif = $conn->real_escape_string($_POST['nif']);
$distrito = $conn->real_escape_string($_POST['distrito']);
$jobb = $conn->real_escape_string($_POST['jobb']);
$status = 2;

// Encripta a senha
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Lida com o upload da foto de perfil
$target_dir = "fotosperfil/";
$target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Verifica se o arquivo é uma imagem real
$check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    echo "Arquivo não é uma imagem.";
    $uploadOk = 0;
}

// Verifica se o arquivo já existe
if (file_exists($target_file)) {
    echo "O arquivo já existe.";
    $uploadOk = 0;
}

// Verifica o tamanho do arquivo
if ($_FILES["profile_picture"]["size"] > 500000) {
    echo "Desculpe, o arquivo é muito grande.";
    $uploadOk = 0;
}

// Permite certos formatos de arquivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
    $uploadOk = 0;
}

// Verifica se $uploadOk está definido como 0 por algum erro
if ($uploadOk == 0) {
    echo "Desculpe, seu arquivo não foi carregado.";
// Se tudo estiver ok, tenta fazer o upload do arquivo
} else {
    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        echo "O arquivo ". htmlspecialchars(basename($_FILES["profile_picture"]["name"])). " foi carregado.";
    } else {
        echo "Desculpe, houve um erro ao carregar seu arquivo.";
    }
}

// Prepara a consulta SQL
$sql = "INSERT INTO users (nome, sobrenome, email, password, morada, telef, nif, distrito, data_nasc, tipo, status, foto) 
        VALUES ('$firstname', '$lastname', '$email', '$hashed_password', '$rua', '$telefone', '$nif', '$distrito', '$data_nascimento', '$jobb', '$status', '$target_file')";

// Executa a consulta
if ($conn->query($sql) === TRUE) {
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fecha a conexão
$conn->close();
?>