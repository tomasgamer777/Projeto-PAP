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
    <label for="Nome">Nome do Utilizador:</label>
    <input type="text" id="Nome" name="Nome">
    <button type="submit" name="submit">Pesquisar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['Nome'];
    echo '<h3>Resultados da Pesquisa</h3>';
    echo 'Utilizador a procurar: ' . $nome . '<br />';
    
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
    
    // Consulta SQL para selecionar o utilizador com base no nome fornecido
    $sql = "SELECT user_id, nome, sobrenome FROM users WHERE nome = '$nome'";
    $result = $conn->query($sql);

    // Verifica se há resultados e exibe na página
    if ($result->num_rows > 0) {
        echo "<h3>Dados deste utilizador</h3>";
        while ($row = $result->fetch_assoc()) {
            echo $row['user_id'] . " - " . $row['nome'] . " - " . $row['sobrenome'] . "<br>";
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
