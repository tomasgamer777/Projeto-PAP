<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telef = $_POST['telef'];
    $morada = $_POST['morada'];
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];

    // Atualiza os dados na base de dados
    $sql = "UPDATE users SET nome='$nome', sobrenome='$sobrenome', email='$email', telef='$telef', morada='$morada', tipo='$tipo', status='$status' WHERE user_id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Alterações salvas com sucesso!";
    } else {
        echo "Erro ao salvar alterações: " . $conn->error;
    }
}
$conn->close();
?>
