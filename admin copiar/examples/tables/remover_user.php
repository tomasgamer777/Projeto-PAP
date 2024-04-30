<?php
// Verifica se foi enviado o ID do utilizador via POST
if (isset($_POST['user_id'])) {
    // Conexão com o banco de dados
    $servername = "plesk2.server.highcloudservices.eu";
    $username = "tomas";
    $password = "Pv~i23i20";
    $dbname = "banda";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Obtém o ID do utilizador enviado via POST
    $userId = $_POST['user_id'];

    // Prepara a query SQL para remover o utilizador
    $sql = "DELETE FROM users WHERE user_id = $userId";

    if ($conn->query($sql) === TRUE) {
        echo "Utilizador removido com sucesso!";
    } else {
        echo "Erro ao remover o utilizador: " . $conn->error;
    }

    // Fecha a conexão com a base de dados
    $conn->close();
} else {
    echo "ID do utilizador não especificado.";
}
?>
