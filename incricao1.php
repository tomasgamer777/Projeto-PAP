<?php

// Conexão com o banco de dados
$servername = "plesk2.server.highcloudservices.eu";
$username = "tomas";
$password = "!6B0ire55";
$dbname = "banda";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebendo os dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$data_nascimento = $_POST['data_nascimento'];
$rua = $_POST['rua'];
$distrito = $_POST['distrito'];
$codigo_postal = $_POST['codigo_postal'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Encriptação da senha

// Processando o upload da foto
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

// Inserindo os dados na base de dados
$sql = "INSERT INTO inscricao (Nome, Sobrenome, Data_Nasc, Morada, Distrito, Cod_Postal, Email, Foto_inscri, Password)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $nome, $sobrenome, $data_nascimento, $rua, $distrito, $codigo_postal, $email, $target_file, $senha);



$stmt->close();
$conn->close();
?>