<?php
// verificar se o usuário está logado
session_start();

if (!isset($_SESSION["id"])) {
	header("Location: login.php");
	exit();
}

// conectar-se ao banco de dados
include("config.php");

// verificar se o usuário confirmou a exclusão
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST["confirmacao"] == "sim") {
		// excluir o usuário do banco de dados
		$id = $_SESSION["id"];
		$sql = "DELETE FROM tbusuario WHERE id=$id";

		if (mysqli_query($conn, $sql)) {
			// encerrar a sessão
			session_destroy();
			echo "Usuário excluído com sucesso.";
		} else {
			echo "Erro ao excluir usuário: " . mysqli_error($conn);
		}

		exit();
	}
}

// exibir a mensagem de confirmação
?>

<!DOCTYPE html>
<html>
<head>
	<title>Excluir cadastro</title>
	<link rel="stylesheet" href="./excluir_usuario.css">
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h1>Excluir cadastro</h1>
	<p>Tem certeza que deseja excluir sua conta?</p>
		<input type="radio" name="confirmacao" value="sim">Sim<br>
		<input type="radio" name="confirmacao" value="nao" checked>Não<br>
		<br>
		<input class="botao" type="submit" name="submit" value="Excluir">
		<br><br>
		<button class="botao"><a  href="./index.php" >Voltar</a></button>
	</form>
</body>
</html>