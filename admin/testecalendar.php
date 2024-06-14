<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendário de Eventos</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
// Arquivo config.php
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

// Processamento do formulário para adicionar evento
if (isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];

    // Inserir evento no banco de dados
    $sql = "INSERT INTO events (titulo, data) VALUES ('$titulo', '$data')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>
                Swal.fire({
                  title: "Evento adicionado!",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {
                    location.reload(); // Recarrega a página para mostrar novos eventos
                });
              </script>';
    } else {
        echo "Erro ao adicionar evento: " . $conn->error;
    }
}
?>

<h2>Adicionar Evento</h2>
<form action="calendar.php" method="post">
    <label for="titulo">Título do Evento:</label>
    <input type="text" id="titulo" name="titulo" required><br><br>
    <label for="data">Data do Evento:</label>
    <input type="date" id="data" name="data" required><br><br>
    <button type="submit" name="submit">Adicionar Evento</button>
</form>

<h2>Eventos</h2>

<?php
// Consulta para obter todos os eventos
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        $titulo = $row['titulo'];
        $data = $row['data'];
        
        // Exibe os eventos na lista
        echo "<li>$titulo - $data</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhum evento encontrado.";
}

// Fecha a conexão
$conn->close();
?>

</body>
</html>
