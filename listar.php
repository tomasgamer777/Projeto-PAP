<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Utilizadores</title>
</head>
<body>

<h2>Listar Utilizadores</h2>

<?php
$servername = "plesk2.server.highcloudservices.eu";
$username = "tomas";
$password = "Pv~i23i20";
$dbname = "banda";

// Cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("conexão falada: " . $conn->connect_error);
}

// Consulta SQL para selecionar todos os utilizadores
$sql = "SELECT user_id, nome, sobrenome FROM users";
$result = $conn->query($sql);

// Verifica se há resultados e exibe na página
if ($result->num_rows > 0) {
    echo "<h3>Utilizadores Encontrados</h3>";
    while ($row = $result->fetch_assoc()) {
        echo $row['user_id'] . " - " . $row['nome'] . " - " . $row['sobrenome'] . "<br>";
    }
} else {
    echo "<h3>Nenhum utilizador encontrado</h3>";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

<p></p>
<a href="admin.html">Voltar à entrada</a>

</body>
</html>
