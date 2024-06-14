<?php
// eventos.php

header('Content-Type: application/json');

// Conecta ao banco de dados
$conn = new mysqli('localhost', 'usuario', 'senha', 'nome_do_banco');
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro na conexão com o banco de dados: ' . $conn->connect_error]);
    exit();
}

// Define o intervalo de datas para filtrar os eventos
$start = isset($_GET['start']) ? $conn->real_escape_string($_GET['start']) : '';
$end = isset($_GET['end']) ? $conn->real_escape_string($_GET['end']) : '';

// Consulta para buscar eventos no intervalo de datas especificado
$sql = "SELECT id, title, start, end FROM eventos WHERE start >= '$start' AND end <= '$end'";
$result = $conn->query($sql);

$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $row['start'],
            'end' => $row['end']
        ];
    }
}

echo json_encode($events);
$conn->close();
?>
