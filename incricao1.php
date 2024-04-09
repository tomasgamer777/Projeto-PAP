<?php
$servername = "plesk2.server.highcloudservices.eu";
$username = "tomas";
$password = "!6B0ire55";
$dbname = "banda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("conexão falada: " . $conn->connect_error);
}
echo "conexão feito com sucesso";

//dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$data_nascimento = $_POST['data_nascimento'];
$rua = $_POST['rua'];
$distrito = $_POST['distrito'];
$codigo_postal = $_POST['codigo_postal'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);




$sql = "INSERT INTO users (nome, sobrenome, data_nasc, morada, distrito, cod_postal, email, password, tipo, status)
VALUES ('$nome', '$sobrenome', '$data_nascimento', '$rua', '$distrito', '$codigo_postal', '$email', '$senha', 3, 2)";

if ($conn->query($sql) === TRUE) {
  echo "Inscrição feita com sucesso!";
  header("Location: ./inscricoes.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

