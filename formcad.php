<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./index.css">
	<title>Cadastro de Usuários</title>
</head>
<body>
	
	<form action="cad.php" method="post">
	<h1>Formulário de Cadastro</h1>
		<input type="text" name="nome" id="nome" required placeholder="Nome"><br><br>
		
		<input type="email" name="email" id="email" required placeholder="E-mail"><br><br>
		
		<input type="password" name="senha" id="senha" required placeholder="Senha"><br><br>
		
		<input class="botao" type="submit" value="Enviar">
		<br><br>
		<button class="botao"><a  href="./index.php">Voltar</a></button>
		
	</form>
</body>
</html>