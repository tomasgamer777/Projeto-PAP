<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua pelas suas configurações)
    $servername = "plesk2.server.highcloudservices.eu";
    $username = "tomas";
    $password = "Pv~i23i20";
    $dbname = "banda";

    // Dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta SQL para verificar se o usuário e a senha correspondem
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row['status'] == 1) {
            // Usuário está desativado, exibe mensagem de erro
            echo "<script>demo.showSwal('auto-close');</script>";
        } elseif (password_verify($password, $row['password'])) {
            // Verificar se o usuário é um administrador (tipo = 1)
            if ($row['tipo'] == 1) {
                // Redirecionamento para o dashboard
                header("Location: dashboard.html");
                exit; // Encerra o script para garantir que o redirecionamento funcione corretamente
            } else {
                echo "Login bem sucedido como usuário normal. Não tem permissões de administrador.";
                // Faça o redirecionamento para a página de usuário normal ou outras ações necessárias aqui
            }
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
}
?>
