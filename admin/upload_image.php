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
$target_dir_small = "../dummy/";
$target_dir_large = "../dummy/large-gallery/";

// Verifica se os diretórios de uploads existem, se não, cria
if (!is_dir($target_dir_small)) {
    mkdir($target_dir_small, 0777, true);
}
if (!is_dir($target_dir_large)) {
    mkdir($target_dir_large, 0777, true);
}

function resize_image($file, $width, $height, $output) {
    list($orig_width, $orig_height) = getimagesize($file);
    $image_p = imagecreatetruecolor($width, $height);
    $image = imagecreatefromjpeg($file);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
    imagejpeg($image_p, $output, 100);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $image_name = basename($_FILES["image"]["name"]);
    $target_file_small = $target_dir_small . $image_name;
    $target_file_large = $target_dir_large . $image_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file_small, PATHINFO_EXTENSION));

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
    if (file_exists($target_file_small) || file_exists($target_file_large)) {
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
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_small)) {
            echo "O ficheiro " . htmlspecialchars($image_name) . " foi carregado.";

            // Redimensiona a imagem e salva a cópia redimensionada grande
            resize_image($target_file_small, 1280, 860, $target_file_large);

            // Tipo da imagem (você pode obter isso de um campo de formulário, por exemplo)
            $image_type = $_POST['image_type'];

            // Caminhos relativos para salvar na base de dados
            $image_url_small = "dummy/" . $image_name;
            $image_url_large = "dummy/large-gallery/" . $image_name;

            // Salva a URL das imagens no banco de dados
            $sql = "INSERT INTO galeria (image_url, image_url_small, image_url_large, type) VALUES ('$image_url_small', '$image_url_small', '$image_url_large', '$image_type')";

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
