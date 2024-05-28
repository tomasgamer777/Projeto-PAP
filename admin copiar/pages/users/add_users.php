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
$data_nascimento = $conn->real_escape_string($_POST[data_nascimento])
$rua = $conn->real_escape_string($_POST['rua']);
$telefone = $conn->real_escape_string($_POST['telefone']);
$nif = $conn->real_escape_string($_POST['nif']);
$distrito = $conn->real_escape_string($_POST['distrito']);

// Encripta a senha
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Prepara a consulta SQL
$sql = "INSERT INTO users (nome, sobrenome, email, password, morada, telef, nif, distrito, data_nasc) 
        VALUES ('$firstname', '$lastname', '$email', '$hashed_password', '$rua', '$telefone', '$nif', '$distrito', '$data_nascimento')";

// Executa a consulta
if ($conn->query($sql) === TRUE) {
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fecha a conexão
$conn->close();
?>