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
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$sql = "UPDATE tbusuario SET nome='$nome', email='$email', senha='$senha' WHERE id=$id";
//var_dump($sql);
//exit();
	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('Usuário atualizado com sucesso');</script>";
	} else {
		echo "Erro ao atualizar usuário: " . mysqli_error($conn);
	}

	// atualizar as informações na sessão
	$_SESSION["nome"] = $nome;
	$_SESSION["email"] = $email;
	$_SESSION["senha"] = $senha;

	// redirecionar de volta para o perfil do usuário
	header("Location: perfil.php");
	exit();
} else {
	// exibir o formulário preenchido com os dados do usuário
	$id = $_SESSION["id"];
	$sql = "SELECT * FROM tbusuario WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$nome = $row['nome'];
	$email = $row['email'];
	$senha = $row['senha'];
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./editar_usuario.css"> 
	<title>Editar cadastro</title>
</head>
<body>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<br>
		<h1>Editar cadastro</h1>
		Nome:
        <input type="text" name="nome" value="<?php echo $nome; ?>">
		<br><br>
		Email:
		<input type="email" name="email" value="<?php echo $email; ?>">
		<br><br>
		Senha:
		<input type="password" name="senha" value="<?php echo $senha; ?>">
		<br><br>
		<input class="botao" type="submit" name="submit" value="Salvar">
	</form>
</body>
</html>
