<?php
$user_id = $_POST['user_id'];

if (!$user_id) {
    echo 'Volte atrás e forneça o ID do utilizador.';
    exit;
}

echo 'Utilizador a remover: '.$user_id.'<p>';

$servername = "plesk2.server.highcloudservices.eu";
$username = "tomas";
$password = "Pv~i23i20";
$dbname = "banda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na ligação: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $remove = "DELETE FROM users WHERE user_id = '$user_id'";
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
