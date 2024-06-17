<?php
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, start, end FROM events";
$result = $conn->query($sql);

$events = array();

while($row = $result->fetch_assoc()) {
    $e = array();
    $e['id'] = $row['id'];
    $e['title'] = $row['title'];
    $e['start'] = $row['start'];
    $e['end'] = $row['end'];
    array_push($events, $e);
}

$conn->close();

echo json_encode($events);
?>
