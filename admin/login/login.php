<?php
session_start();

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
                    // Iniciar sessão
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_type'] = $row['tipo'];
                    $_SESSION['last_activity'] = time();

                    // Verificar se o usuário é um administrador (tipo = 4)
                    if ($row['tipo'] == 4) {
                        // Retorna um JSON indicando sucesso
                        echo json_encode(array("success" => true));
                        exit; // Encerra o script para garantir que o redirecionamento funcione corretamente
                    } else {
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

// Função para verificar a sessão do usuário e inatividade
function checkSession() {
    // Verifica se o usuário está logado
    if (!isset($_SESSION['user_id'])) {
        header("Location:login.html");
        exit();
    }

    // Verifica a inatividade
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
        // Sessão expirou, redireciona para login
        session_unset();
        session_destroy();
        header("Location: login.html");
        exit();
    }

    // Atualiza o timestamp da última atividade
    $_SESSION['last_activity'] = time();
}

// Chama a função de verificação de sessão em todas as páginas de admin
checkSession();
?>
