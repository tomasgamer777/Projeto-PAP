<?php
session_start();

// Função para verificar se o usuário está logado e é administrador
function checkAdmin() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login.html'); // Caminho relativo para a página de login
        exit;
    }

    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 4) {
        header('Location: ../no_permission.php'); // Caminho relativo para a página de permissão negada
        exit;
    }

    // Verificar inatividade
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) { // 300 segundos = 5 minutos
        session_unset();
        session_destroy();
        header('Location: login.html'); // Caminho relativo para a página de login
        exit;
    }

    $_SESSION['last_activity'] = time(); // Atualizar tempo da última atividade
}

// Verificar se o formulário foi enviado
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
    $password_user = $_POST['password']; // Usar uma variável diferente para a senha fornecida pelo usuário

    // Consulta SQL para verificar se o usuário e a senha correspondem
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['status'] == 1) {
                // Usuário está desativado, retorna uma mensagem de erro
                echo json_encode(array("success" => false, "message" => "Utilizador desativado."));
            } else {
                // Verificar se a senha fornecida pelo usuário corresponde à senha armazenada no banco de dados
                if (password_verify($password_user, $row['password'])) {
                    // Definir variáveis de sessão
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_type'] = $row['tipo'];
                    $_SESSION['last_activity'] = time();
                    $_SESSION['user_name'] = $row['name']; // Nome do usuário
                    $_SESSION['user_email'] = $row['email']; // Email do usuário
                    $_SESSION['user_photo'] = $row['photo']; // URL da foto do usuário

                    // Verificar se o usuário é um administrador (tipo = 4)
                    if ($row['tipo'] == 4) {
                        // Retorna um JSON indicando sucesso
                        echo json_encode(array("success" => true));
                        exit; // Encerra o script para garantir que o redirecionamento funcione corretamente
                    } else {
                        // Retorna um JSON indicando sucesso
                        echo json_encode(array("success" => true, "message" => "Login bem sucedido como usuário normal. Não tem permissões de administrador."));
                    }
                } else {
                    // Retorna uma mensagem de erro
                    echo json_encode(array("success" => false, "message" => "Senha incorreta."));
                }
            }
        } else {
            // Retorna uma mensagem de erro
            echo json_encode(array("success" => false, "message" => "Utilizador não encontrado."));
        }
    } else {
        // Retorna uma mensagem de erro
        echo json_encode(array("success" => false, "message" => "Erro na consulta SQL: " . $conn->error));
    }

    $conn->close();
}
?>
