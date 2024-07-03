<?php
header('Content-Type: application/json');

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados (substitua com suas credenciais)
	$servername = "localhost";
    $username = "tomas";
    $password = "!h01fFw35";
    $dbname = "banda";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die(json_encode(["success" => false, "message" => "Falha na conexão: " . $conn->connect_error]));
    }

    // Receber e sanitizar dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $assunto = htmlspecialchars($_POST['assunto']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Preparar e executar a query SQL para inserir na tabela 'noti'
    $sql = "INSERT INTO noti (nome, email, assunto, mensagem) VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao enviar mensagem: " . $conn->error]);
    }

    // Fechar conexão
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Método inválido"]);
}
?>
