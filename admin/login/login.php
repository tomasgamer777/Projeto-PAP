<?php
session_start(); // Iniciar sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "tomas";
    $password = "!h01fFw35";
    $dbname = "banda";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Dados do formulário
    $email = $_POST['email'];
    $password_user = $_POST['password'];

    // Consulta SQL para verificar se o usuário e a senha correspondem
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['status'] == 1) {
                echo json_encode(array("success" => false, "message" => "Utilizador desativado."));
            } else {
                if (password_verify($password_user, $row['password'])) {
                    if ($row['tipo'] == 4) {
                        $_SESSION['user_id'] = $row['id']; // Definir a variável de sessão
                        $_SESSION['last_activity'] = time(); // Inicializar a última atividade
                        echo json_encode(array("success" => true));
                        exit;
                    } else {
                        echo json_encode(array("success" => true, "message" => "Login bem sucedido como usuário normal. Não tem permissões de administrador."));
                    }
                } else {
                    echo json_encode(array("success" => false, "message" => "Senha incorreta."));
                }
            }
        } else {
            echo json_encode(array("success" => false, "message" => "Utilizador não encontrado."));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Erro na consulta SQL: " . $conn->error));
    }

    $conn->close();
}
?>
