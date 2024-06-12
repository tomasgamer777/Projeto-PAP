<?php
// Definição das credenciais de conexão com o banco de dados
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Conexão falhada: " . $conn->connect_error);
}

// Verificação se o ID da imagem foi fornecido
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Obtém a URL da imagem para excluir os arquivos
    $sql = "SELECT image_url_small, image_url_large FROM galeria WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Verifica se a imagem foi encontrada no banco de dados
    if ($row) {
        // Exclui os arquivos do servidor
        if (file_exists('../' . $row['image_url_small'])) {
            unlink('../' . $row['image_url_small']);
        }
        if (file_exists('../' . $row['image_url_large'])) {
            unlink('../' . $row['image_url_large']);
        }

        // Exclui a entrada do banco de dados
        $sql = "DELETE FROM galeria WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Imagem excluída com sucesso.";
        } else {
            echo "Erro ao excluir imagem: " . $conn->error;
        }
    } else {
        // Resposta de erro se a imagem não for encontrada
        echo "Imagem não encontrada.";
    }
} else {
    // Resposta de erro se o ID da imagem não for fornecido
    echo "ID da imagem não fornecido.";
}

// Fechar conexão com o banco de dados
$conn->close();
?>
