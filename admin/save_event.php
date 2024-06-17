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

// Receber dados do evento via POST
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

// Conectar ao banco de dados
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Preparar a query para inserir ou atualizar o evento
$query = "INSERT INTO events (title, start, end) VALUES ('$title', '$start', '$end')";

if (!mysqli_query($conn, $query)) {
    die("Erro ao adicionar evento: " . mysqli_error($conn));
}

// Fechar conexão com o banco de dados
mysqli_close($conn);

// Retornar sucesso ao FullCalendar
echo json_encode(array('status' => 'success', 'message' => 'Evento adicionado com sucesso.'));
?>