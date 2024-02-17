<?php
$servername = "plesk2.server.highcloudservices.eu";
$username = "tomas";
$password = "!6B0ire55";
$dbname = "banda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("conexão falada: " . $conn->connect_error);
}
echo "conexão feito com sucesso";

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


$sql = "INSERT INTO inscricao (Nome, Sobrenome, Data_Nasc, Morada, Distrito, Cod_Postal, Email, Foto_inscri, Password)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($conn->query($sql) === TRUE) {
  echo "Inscrição feita com sucesso!";
  header("Location: ./escola.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

