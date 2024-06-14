<?php
// salvar_evento.php

// Verifica se os dados foram recebidos corretamente
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Método não permitido
    exit('Método não permitido');
}
// Conecta ao banco de dados (substitua com suas configurações)
$conn = new mysqli('localhost', 'usuario', 'senha', 'nome_do_banco');
if ($conn->connect_error) {
    http_response_code(500); // Erro interno do servidor
    exit('Erro na conexão com o banco de dados: ' . $conn->connect_error);
}

// Recebe e sanitiza os dados do evento
$title = isset($_POST['title']) ? $conn->real_escape_string($_POST['title']) : '';
$start = isset($_POST['start']) ? $_POST['start'] : '';
$end = isset($_POST['end']) ? $_POST['end'] : '';

// Prepara e executa a consulta SQL para inserir o evento na base de dados
$sql = "INSERT INTO eventos (title, start, end) VALUES ('$title', '$start', '$end')";
if ($conn->query($sql) === TRUE) {
    http_response_code(200); // OK
    echo "Evento salvo com sucesso!";
} else {
    http_response_code(500); // Erro interno do servidor
    echo "Erro ao salvar evento: " . $conn->error;
}

$conn->close();
?>