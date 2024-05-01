<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados (substitua as informações de conexão conforme necessário)
    $servername = "plesk2.server.highcloudservices.eu";
    $username = "tomas";
    $password = "Pv~i23i20";
    $dbname = "banda";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Obtém os valores do formulário
    $firstname = $_POST['nome'];
    $lastname = $_POST['sobrenome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rua = $_POST['morada'];
    $telefone = $_POST['telef'];
    $nif = $_POST['nif'];
    $distrito = $_POST['distrito'];

    // Prepara e executa a consulta SQL para inserir os dados
    $sql = "INSERT INTO users (nome, sobrenome, email, password, morada, telef, nif, distrito)
    VALUES ('$firstname', '$lastname', '$email', '$password', '$rua', '$telefone', '$nif', '$distrito')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    $conn->close();
}
?>
