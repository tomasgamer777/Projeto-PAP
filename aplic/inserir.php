<?php
    $nome = $_POST['Nome'];
    $telef = $_POST['Telef'];
    $email = $_POST['Email'];
    if(!$nome) {
        echo 'Nome em falta.
        Volte e preencha o nome.';
        exit;
    }
    echo 'Dados recebidos: <br />';
    echo 'Nome: '.$nome.'<br />';
    echo 'Telef:  '.$telef.'<br />';
    echo 'Email: '.$email.'<br />';
    $mysqli =new mysqli('127.0.0.1','root','','pessoal');
    if ($mysqli -> connect_error) {
        echo 'Falha na ligação. </br>';
        echo $mysqli->connect_error;
        exit;
    }
    $insere = $mysqli -> query("insert into contactos values ('".$nome."','".$telef."','".$email."')");
    if($insere == 1) {
        echo "<p> Contacto inserido</p>";
    }
    else {
        echo "<p> Dados não inseridos </p>";
    }
    $mysqli -> close();
?>
<p> <a href="http://localhost/aplic/Entrada.html"> Voltar a entrada </a> </p>