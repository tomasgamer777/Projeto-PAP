<html>
    <body> <h2> Remover Produto </h2>
    <?php
    $Nome=$_POST['Nome'];
    if(!$Nome)
{
    echo 'Volte atrás e escreva o Produto';
    exit;
}
echo 'Produto a remover: '.$Nome.'<p>';
$mysqli=new mysqli('127.0.0.1','root','','comercial');
if($mysqli-> connect_error) {
    echo 'Falha na ligação. </br>';
    echo $mysqli->connect_error; exit;
}
$resultado =$mysqli-> query ("select * from produtos");
$nr_antes = mysqli_num_rows($resultado);
$remove = "Delete from produtos Where Nomeproduto = '".$Nome."'";
mysqli_query($mysqli ,$remove);
$resultado = $mysqli->query("select * from produtos");
$nr_depois = mysqli_num_rows($resultado);
$removidos = $nr_antes - $nr_depois;
echo 'Nº registos removidos: '.$removidos;
$mysqli->close();
?>
<p></p>
<a href="http://localhost/ficha/Entradaf.html">
                Voltar a entrada </a>
</body>
</html>