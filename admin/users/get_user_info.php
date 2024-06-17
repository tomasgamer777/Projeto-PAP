<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo json_encode(["success" => false, "message" => "Usuário não está logado."]);
    exit;
}

// Dados do usuário da sessão
$userInfo = [
    "user_id" => $_SESSION['user_id'],
    "nome" => $_SESSION['user_name'],
    "sobrenome" => $_SESSION['user_surname'],
    "email" => $_SESSION['user_email'],
    "foto" => $_SESSION['user_photo'],
    // Adicione outros campos conforme necessário
];

echo json_encode(["success" => true, "data" => $userInfo]);
?>
