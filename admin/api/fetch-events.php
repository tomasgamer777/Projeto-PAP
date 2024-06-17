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

// Define a consulta SQL
$sql = "SELECT id, nome AS title, data_inicio AS start, data_fim AS end FROM events";
$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
} else {
    echo "0 resultados";
}

// Fecha a conexão
$conn->close();

// Retorna os eventos como JSON
header('Content-Type: application/json');
echo json_encode($events);
?>
