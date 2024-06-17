<?php
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$sql = "INSERT INTO events (title, start, end) VALUES ('$title', '$start', '$end')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
