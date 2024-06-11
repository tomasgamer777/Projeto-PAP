<?php
// Verificar se o ID do usuário foi fornecido
if (isset($_GET['user_id'])) {
    // Obter o ID do usuário da solicitação GET
    $user_id = $_GET['user_id'];
    
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "tomas";
    $password = "!h01fFw35";
    $dbname = "banda";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta para obter os dados do usuário com base no ID
    $sql = "SELECT user_id, nome, sobrenome, email, telef, morada, tipo, status, data_nasc, distrito, cod_postal, nif, foto FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Se houver resultados, enviar os dados do usuário como JSON
        $row = $result->fetch_assoc();

        // Mapear o status para o togglebutton
        $row['status'] = ($row['status'] == 2) ? "Ativo" : "Inativo";

        echo json_encode($row);
    } else {
        // Se nenhum usuário for encontrado com o ID fornecido, enviar um erro
        echo json_encode(["error" => "Usuário não encontrado"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "ID do usuário não fornecido"]);
}
?>
