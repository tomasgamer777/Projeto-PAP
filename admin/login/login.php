<?php
session_start();

function checkAdmin() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: /admin/login/login.html'); // Caminho relativo para a página de login
        exit;
    }

    // Verificar inatividade
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) { // 300 segundos = 5 minutos
        session_unset();
        session_destroy();
        header('Location: /admin/login/login.html'); // Caminho relativo para a página de login
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
                    $_SESSION['tipo'] = $row['tipo']; // Usar 'tipo' para consistência
                    $_SESSION['last_activity'] = time();
                    $_SESSION['user_nome'] = $row['nome']; // Nome do usuário
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['telef'] = $row['telef'];
                    $_SESSION['data_nasc'] = $row['data_nasc'];
                    $_SESSION['morada'] = $row['morada'];
                    $_SESSION['distrito'] = $row['distrito'];
                    $_SESSION['cod_postal'] = $row['cod_postal'];
                    $_SESSION['user_sobrenome'] = $row['sobrenome'];
                    $_SESSION['nif'] = $row['nif'];
                    $_SESSION['status'] = $row['status'];
                    $_SESSION['user_email'] = $row['email']; // Email do usuário
                    $_SESSION['user_photo'] = $row['foto']; // URL da foto do usuário

                    // Verificar o tipo de usuário e redirecionar adequadamente
                    if ($row['tipo'] == 4) {
                        // Retorna um JSON indicando sucesso
                        echo json_encode(array("success" => true));
                        exit; // Encerra o script para garantir que o redirecionamento funcione corretamente
                    } else if ($row['tipo'] == 3) {
                        // Retorna um JSON indicando sucesso, mas redireciona para o dashboard de sócios
                        echo json_encode(array("success" => true, "redirect" => "/admin/socios/dashboard_socios.php"));
                        exit; // Encerra o script para garantir que o redirecionamento funcione corretamente
                    } 
                    else if ($row['tipo'] == 2) {
                        echo json_encode(array("success" => true, "redirect" => "/admin/musicos/dashboard_musicos.php"));
                        exit; 
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
