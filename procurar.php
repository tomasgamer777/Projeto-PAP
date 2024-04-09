<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['Nome'];
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
    $sql = "SELECT user_id, nome, subrenome FROM users WHERE nome = '$nome'";
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
<p></p>
<a href="index.html">Voltar à entrada</a>
