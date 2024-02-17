<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
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
$sql = "INSERT INTO inscrição (Nome, Sobrenome, Data_Nasc, Morada, Distrito, Cod_Postal, Email, Foto_inscri, Password)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $nome, $sobrenome, $data_nascimento, $rua, $distrito, $codigo_postal, $email, $target_file, $senha);

if ($stmt->execute()) {
    echo "Inscrição realizada com sucesso!
    Em 5 segundos será redirecionado para a pagina!";
    // Espera 5 segundos antes de redirecionar
    sleep(5);
    // Redireciona para outro arquivo HTML em outra pasta
    header("Location:C:\Users\tomas\OneDrive\PAP\SITE BANDA\escola.html");
    exit(); // Certifique-se de sair após o redirecionamento
} else {
    echo "Erro: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
