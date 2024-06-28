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
        "user_nome" => $_SESSION['user_nome'],
        "user_sobrenome" => $_SESSION['user_sobrenome'],
        "email" => $_SESSION['user_email'],
        "foto" => $_SESSION['user_photo'],
        "telef" => $_SESSION['telef'],
        "data_nasc" => $_SESSION['data_nasc'],
        "morada" => $_SESSION['morada'],
        "distrito" => $_SESSION['distrito'],
        "cod_postal" => $_SESSION['cod_postal'],
        "nif" => $_SESSION['nif'],

        // Adicione outros campos conforme necessário
    ];

    echo json_encode(["success" => true, "data" => $userInfo]);
    ?>
