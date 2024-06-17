<?php
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

// Estabelece a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Query para buscar eventos no banco de dados
$query = "SELECT id, title, start, end FROM events";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Erro ao buscar eventos: " . mysqli_error($conn));
}

// Array para armazenar os eventos
$events = array();

// Converter resultados em formato JSON compatível com FullCalendar
while ($row = mysqli_fetch_assoc($result)) {
    $events[] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'start' => $row['start'],
        'end' => $row['end']
    );
}

// Fechar conexão com o banco de dados
mysqli_close($conn);

// Retornar eventos como JSON
echo json_encode($events);
?>
