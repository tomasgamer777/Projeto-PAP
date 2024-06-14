<?php
// eventos.php

header('Content-Type: application/json');

$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
