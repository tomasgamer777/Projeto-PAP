<?php
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Busca eventos do banco de dados
$sql = "SELECT id, title, start, end FROM events";
$result = $conn->query($sql);

$events = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $row['start'],
            'end' => $row['end']
        ];
    }
}

$conn->close();

echo json_encode($events);
?>
