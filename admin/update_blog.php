<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtendo os dados do formulário
$id = $_POST['id'];
$dia = $_POST['dia'];
$mes = strtoupper($_POST['mes']); // Garantir que o mês esteja em maiúsculas
$titulo = $_POST['titulo_1'];
$legenda = $_POST['legenda_1'];

// Função para redimensionar a imagem
function resizeImage($file, $width, $height, $output) {
    list($original_width, $original_height) = getimagesize($file);

    $src = imagecreatefromstring(file_get_contents($file));
    $dst = imagecreatetruecolor($width, $height);

    // Manter a transparência para PNG e GIF
    if (exif_imagetype($file) == IMAGETYPE_PNG) {
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
        $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
        imagefilledrectangle($dst, 0, 0, $width, $height, $transparent);
    } elseif (exif_imagetype($file) == IMAGETYPE_GIF) {
        $transparent_index = imagecolortransparent($src);
        if ($transparent_index >= 0) {
            $transparent_color = imagecolorsforindex($src, $transparent_index);
            $transparent_index = imagecolorallocate($dst, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
            imagefill($dst, 0, 0, $transparent_index);
            imagecolortransparent($dst, $transparent_index);
        }
    }

    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $original_width, $original_height);
    imagejpeg($dst, $output, 90); // Salvar a imagem redimensionada como JPEG com qualidade 90

    imagedestroy($src);
    imagedestroy($dst);
}

// Tratamento da imagem
if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $target_dir = "../dummy/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar se é uma imagem real ou falsa
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
        // Verificar se o arquivo já existe
        if (file_exists($target_file)) {
            echo json_encode(["error" => "Desculpe, o arquivo já existe."]);
            exit;
        }
        // Verificar o tamanho do arquivo
        if ($_FILES["foto"]["size"] > 5000000) { // 5MB de limite
            echo json_encode(["error" => "Desculpe, o seu arquivo é muito grande."]);
            exit;
        }
        // Permitir certos formatos de arquivo
        if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
            echo json_encode(["error" => "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos."]);
            exit;
        }
        // Tentar redimensionar e mover o arquivo para o diretório de destino
        $resized_file = $target_dir . 'resized_' . basename($_FILES["foto"]["name"]);
        resizeImage($_FILES["foto"]["tmp_name"], 600, 300, $resized_file);
        if (file_exists($resized_file)) {
            $foto = "dummy/" . 'resized_' . basename($_FILES["foto"]["name"]);
        } else {
            echo json_encode(["error" => "Desculpe, houve um erro ao enviar seu arquivo."]);
            exit;
        }
    } else {
        echo json_encode(["error" => "Arquivo não é uma imagem."]);
        exit;
    }
} else {
    // Se nenhuma nova foto foi enviada, mantenha a foto existente
    $foto = $_POST['foto'];
}

// Atualizar a entrada no banco de dados
$sql = "UPDATE blog SET dia=?, mes=?, titulo=?, descricao=?, foto=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $dia, $mes, $titulo, $legenda, $foto, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => "Evento atualizado com sucesso."]);
} else {
    echo json_encode(["error" => "Erro ao atualizar o evento: " . $conn->error]);
}

$stmt->close();
$conn->close();
?>
