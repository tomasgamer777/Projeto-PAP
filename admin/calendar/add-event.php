<?php
// Conexão com o banco de dados
try {
    $pdo = new PDO('mysql:host=localhost;dbname=nome_do_banco_de_dados', 'usuario', 'senha');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$title = $data['title'];
$start = $data['start'];
$end = $data['end'];

try {
    $stmt = $pdo->prepare("INSERT INTO events (title, start, end) VALUES (?, ?, ?)");
    $stmt->execute([$title, $start, $end]);
    echo json_encode(['status' => 'success']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error']);
}
?>
