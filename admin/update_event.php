<?php
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$date = $_POST['date'];
$titulo = $_POST['titulo_1'];
$legenda = $_POST['legenda_1'];

$sql = "UPDATE homepage SET date='$date', titulo_1='$titulo', legenda_1='$legenda' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
