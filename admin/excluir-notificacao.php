<?php
// Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o parâmetro 'id' foi enviado
    if (isset($_POST['id'])) {
        // Conecta ao banco de dados (substitua pelos seus dados de conexão)
        $servername = "localhost";
        $username = "tomas";
        $password = "!h01fFw35";
        $dbname = "banda";
    

        // Cria conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Prepara e executa a query para excluir a notificação
        $id = $_POST['id'];
        $sql = "DELETE FROM noti WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Retorna uma resposta JSON indicando sucesso
            echo json_encode(array("status" => "success"));
        } else {
            // Retorna uma resposta JSON indicando erro
            echo json_encode(array("status" => "error", "message" => "Erro ao excluir notificação."));
        }

        // Fecha a conexão
        $stmt->close();
        $conn->close();
    } else {
        // Se 'id' não foi recebido, retorna uma resposta JSON indicando erro
        echo json_encode(array("status" => "error", "message" => "ID da notificação não fornecido."));
    }
} else {
    // Se a requisição não for POST, retorna uma resposta JSON indicando erro
    echo json_encode(array("status" => "error", "message" => "Método inválido."));
}
?>
