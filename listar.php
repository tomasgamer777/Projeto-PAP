<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Utilizador</title>
</head>
<body>

<h2>Pesquisar Utilizador</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="user_id">ID do Utilizador:</label>
    <input type="text" id="user_id" name="user_id">
    <button type="submit">Pesquisar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    echo 'Utilizador a procurar:'.$user_id.'<br />';
    
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
    
    // Consulta SQL para selecionar o utilizador com base no user_id fornecido
    $sql = "SELECT user_id, nome, subrenome FROM users WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    // Verifica se há resultados e exibe na página
    if ($result->num_rows > 0) {
        echo "<h3>Dados deste utilizador</h3>";
        while ($row = $result->fetch_assoc()) {
            echo $row['user_id'] . " - " . $row['nome'] . " - " . $row['subrenome'] . "<br>";
        }
    } else {
        echo "<h3>Utilizador não encontrado</h3>";
    }
    
    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

</body>
</html>
