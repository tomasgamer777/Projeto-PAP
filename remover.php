<?php
$nome = $_POST['Nome'];

if (!$nome) {
    echo 'Volte atrás e forneça o nome do utilizador a ser removido.';
    exit;
}

echo 'Utilizador a remover: '.$nome.'<p>';

$servername = "plesk2.server.highcloudservices.eu";
$username = "tomas";
$password = "Pv~i23i20";
$dbname = "comercial";

// Cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na ligação: " . $conn->connect_error);
}

// Consulta SQL para verificar se o utilizador existe antes de removê-lo
$sql = "SELECT * FROM produtos WHERE Nomeproduto = '$nome'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Utilizador encontrado, então remova-o
    $remove = "DELETE FROM produtos WHERE Nomeproduto = '$nome'";
    if ($conn->query($remove) === TRUE) {
        echo 'Utilizador removido com sucesso.';
    } else {
        echo 'Erro ao remover utilizador: ' . $conn->error;
    }
} else {
    echo 'Utilizador não encontrado.';
}

$conn->close();
?>

<p></p>
<a href="admin.html">Voltar à entrada</a>

</body>
</html>
