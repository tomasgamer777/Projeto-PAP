<?php
$servername = "localhost";
$username = "tomas";
$password = "!h01fFw35";
$dbname = "banda";

// Conectando ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhada: " . $conn->connect_error);
}

// Diretórios onde as imagens serão salvas
$target_dir = "galeria/";
$target_dir_resized = "galeria/resized/";
$target_dir_original = "galeria/original/";

// Verifica se os diretórios de uploads existem, se não, cria
if (!is_dir($target_dir_resized)) {
    mkdir($target_dir_resized, 0777, true);
}
if (!is_dir($target_dir_original)) {
    mkdir($target_dir_original, 0777, true);
}

function resize_image($file, $width, $height, $output) {
    list($orig_width, $orig_height) = getimagesize($file);
    $image_p = imagecreatetruecolor($width, $height);
    $image = imagecreatefromjpeg($file);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
    imagejpeg($image_p, $output, 100);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_file_original = $target_dir_original . basename($_FILES["image"]["name"]);
    $target_file_resized_small = $target_dir_resized . "600x300_" . basename($_FILES["image"]["name"]);
    $target_file_resized_large = $target_dir_resized . "1280x860_" . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file_original, PATHINFO_EXTENSION));

    // Verifica se o arquivo é uma imagem real ou uma imagem falsa
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "O ficheiro é uma imagem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "O ficheiro não é uma imagem.";
        $uploadOk = 0;
    }

    // Verifica se o arquivo já existe
    if (file_exists($target_file_original)) {
        echo "Desculpe, o ficheiro já existe.";
        $uploadOk = 0;
    }

    // Verifica o tamanho do arquivo
    if ($_FILES["image"]["size"] > 5000000) { // 5MB
        echo "Desculpe, o seu ficheiro é muito grande.";
        $uploadOk = 0;
    }

    // Permitir certos formatos de arquivo
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verifica se $uploadOk está definido como 0 por algum erro
    if ($uploadOk == 0) {
        echo "Desculpe, o seu ficheiro não foi carregado.";
    // Se tudo estiver ok, tenta fazer o upload do arquivo
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_original)) {
            echo "O ficheiro " . htmlspecialchars(basename($_FILES["image"]["name"])) . " foi carregado.";

            // Redimensiona a imagem e salva as cópias redimensionadas
            resize_image($target_file_original, 600, 300, $target_file_resized_small);
            resize_image($target_file_original, 1280, 860, $target_file_resized_large);

            // Salva a URL das imagens no banco de dados
            $sql = "INSERT INTO galeria (image_url, image_url_small, image_url_large) VALUES ('$target_file_original', '$target_file_resized_small', '$target_file_resized_large')";

            if ($conn->query($sql) === TRUE) {
                echo "URL da imagem salva no banco de dados com sucesso.";
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Desculpe, houve um erro ao carregar o seu ficheiro.";
        }
    }
}

$conn->close();
?>
