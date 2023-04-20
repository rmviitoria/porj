<?php
// verificar se o usuário está logado
session_start();

if (!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}

// conectar-se ao banco de dados
include("config.php");

// verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// atualizar os dados do usuário no banco de dados
	$id = $_SESSION["id"];
	$recado = $_POST['recado'];
	$data = $_POST['data'];

	$sql = "UPDATE tbusuario SET recado='$recado', data='$data' WHERE id=$id";
//var_dump($sql);
//exit();
	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('Recado atualizado com sucesso');</script>";
	} else {
		echo "Erro ao atualizar recado: " . mysqli_error($conn);
	}

	// atualizar as informações na sessão
	$_SESSION["recado"] = $recado;
	$_SESSION["data"] = $data;

	// redirecionar de volta para o perfil do usuário
	header("Location: portal.php");
	exit();
} else {
	// exibir o formulário preenchido com os dados do usuário
	$id = $_SESSION["id"];
	$sql = "SELECT * FROM tbusuario WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$recado = $row['recado'];
	$data = $row['data'];
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./editar_recado.css"> 
	<title>Editar cadastro</title>
</head>
<body>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<br>
		<h1>EDITAR RECADO</h1>
		<h2>RECADO</h2>
    <textarea name="recado" id="recado" cols="30" rows="10"></textarea>
		<br><br>
		<h2>Data:</h2>
		<input type="text" name="data" value="<?php echo $data; ?>" placeholder="Data:">
		<br><br>
		<input class="botao" type="submit" name="submit" value="Salvar">
        <br>
        <br>
        <button class="botao"><a href="./portal.php">Cancelar</a></button>
	</form>
</body>
</html>