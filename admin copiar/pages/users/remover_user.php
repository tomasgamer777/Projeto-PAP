<?php
// Verifica se foi enviado o ID do utilizador via POST
if (isset($_POST['user_id'])) {
    // Mensagem de depuração
    echo "User ID: " . $_POST['user_id'] . "<br>";

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

    // Mensagem de depuração
    echo "Deleting user with ID: " . $userId . "<br>";

    // Prepara a query SQL para remover o utilizador
    $sql = "DELETE FROM users WHERE user_id = $userId";

    if ($conn->query($sql) === TRUE) {
        // Responde com um JSON indicando sucesso
        echo json_encode(array("success" => true));
    } else {
        // Responde com um JSON indicando erro
        echo json_encode(array("success" => false, "error" => "Erro ao remover o utilizador: " . $conn->error));
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Responde com um JSON indicando erro de parâmetros
    echo json_encode(array("success" => false, "error" => "ID do utilizador não especificado."));
}
?>
