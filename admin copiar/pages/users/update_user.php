<?php
// Verifica se a requisição foi feita usando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "tomas";
    $password = "!h01fFw35";
    $dbname = "banda";
    // Cria uma conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Recupera os dados do formulário
    $user_id = $_POST['user_id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $morada = $_POST['morada'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $distrito = $_POST['distrito'];
    $codigo_postal = $_POST['codigo_postal'];
    $nif = $_POST['nif'];
    // Continue recuperando os outros campos do formulário conforme necessário

    // Query SQL para atualizar o utilizador no banco de dados
    $sql = "UPDATE users SET nome='$nome', sobrenome='$sobrenome', morada='$morada', telefone='$telefone', data_nasc='$data_nascimento', distrito= '$distrito', cod_postal='$codigo_postal', nif='$nif' WHERE user_id=$user_id";

    if ($conn->query($sql) === TRUE) {
        echo "Utilizador atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o utilizador: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
