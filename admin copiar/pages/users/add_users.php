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
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$rua = $_POST['rua'];
$telefone = $_POST['telefone'];
$nif = $_POST['nif'];
$distrito = $_POST['distrito'];

// Prepara a consulta SQL
$sql = "INSERT INTO users (firstname, lastname, email, password, rua, telefone, nif, distrito, )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepara a declaração
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Encripta a senha
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Liga os parâmetros
    $stmt->bind_param("sssssssss", $firstname, $lastname, $email, $hashed_password, $rua, $telefone, $nif, $distrito);

    // Executa a declaração
    if ($stmt->execute()) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a declaração
    $stmt->close();
} else {
    echo "Erro na preparação da consulta: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
