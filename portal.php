<?php
  session_start();
  if(empty($_SESSION)){
    echo"<script> alert('entrei'); </script>"; 
    echo"<script> location.href='index.php'; </script>"; 
  }
/*
  include("config.php");
  $recado = mysqli_real_escape_string($conn, $_POST['recado']);
  $data = mysqli_real_escape_string($conn, $_POST['data']);
var_dump($recado);
exit;
 $query = "INSERT INTO tbrecado (recado, data) VALUES ('$recado','$data')";
 $resultado = mysqli_query($conn,$query);

 // Verifica se houve erro na inserção
if (!$resultado) {
  die("Erro ao inserir os dados no MySQL: " . mysqli_error($conexao));
}

// Fecha a conexão com o MySQL
mysqli_close($conn);
*/
  ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="./portal.css"> 
    <title>Portal - Usuário Identificado</title>
</head>

<body>
    <h1>PORTAL DO ASSINANTE</h1>
    <?php
        echo " Olá," . $_SESSION["nome"];
        echo " Seu e-mail é: " . $_SESSION["email"];
        
       echo"<h3>Quer sair do sistema? <a href='logout.php'>[SAIR] </a></h3>";
       echo"<h3>Gostaria de editar seu perfil? <a href='perfil.php'>[EDITAR] </a></h3>";
       echo"<h3>Gostaria de adicionar recado? <a href='form_recado.php'>[Adicionar] </a></h3>";
    ?>


 	<h1>Lista de Recados</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Recado</th>
			<th>Data</th>
			<th>Ação</th>
		</tr>
		<?php
        include("config.php");
         $sql = "select * from tbrecado";
         $result = $conn->query($sql) or die($conn->error);
		// aqui você deve incluir um script PHP que consulta o banco de dados e retorna a lista de usuários em um loop
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['recado'] . "</td>";
			echo "<td>" . $row['data'] . "</td>";
			echo "<td><a href='editar_recado.php?id=" . $row['id'] . "'>Editar</a> | <a href='excluir_recado.php?id=" . $row['id'] . "'>Excluir</a></td>";
			echo "</tr>";
		}
		?>

	</table>
  <br>
	<a href="form_recado.php">Adicionar novo Recado</a>

<!--
if(empty($_POST)||(empty($_POST["recado"])||(empty($_POST["data"])))){
  //echo"<script> location.href='index.php'; </script>"; 
}

$recado = $_POST["recado"];
$data = $_POST["data"];
echo"<div class='container'>";

for ($i = 1; $i <= $recado; $i++) {
echo"</div>";    
echo"<div class='recado'>";
    echo "<h2>ID :" . str_pad($i , 4 , '0' , STR_PAD_LEFT)."</h2>";
    echo "<p> Recado: " . $recado."</p>" ;
    echo "<p>Data do sorteio: " . $data."</p>" ;
echo"</div>";    
}

echo"</div>";
*/
?>  -->
</body>

</html>
