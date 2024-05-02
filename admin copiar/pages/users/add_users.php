<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "plesk2.server.highcloudservices.eu";
    $username = "tomas";
    $password = "Pv~i23i20";
    $dbname = "banda";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $firstname = $_POST['nome'];
    $lastname = $_POST['sobrenome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rua = $_POST['morada'];
    $telefone = $_POST['telef'];
    $nif = $_POST['nif'];
    $distrito = $_POST['distrito'];

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
