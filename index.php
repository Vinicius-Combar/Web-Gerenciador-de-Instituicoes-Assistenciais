<?php 
session_start();
if(isset($_SESSION['usuario']))
{
	header("Location:home.php");	
}
if ($_SERVER['REQUEST_METHOD']==='POST')
{
	$conexao = mysqli_connect("localhost","root","","wegia");
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password=hash("sha512", $password);
	$query="SELECT * FROM USUARIO";
	if($resposta=mysqli_query($conexao,$query)){
		foreach ($resposta as $linha) {
			$usuario=$linha['Usuario'];
			$senha=$linha['Senha'];
			$permissao=$linha['Permissao'];
			if($username==$usuario)
			{
				if($password==$senha){
					session_start();
					$_SESSION['usuario']=$username;
					$_SESSION['permissao']=$permissao;
					header("Location:home.php");

				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WEGIA</title>
	<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
	<header>

			<div id="img">
				<img src="Koala.jpg">
			</div>
			<div id="form">
				<form action="#" method="POST">
					<label for="username">Insira o seu login: </label><input type="text" name="username">
					<label for="password">Insira a sua senha: </label><input type="password" name="password">
					<input type="submit" name="Acessar">
				</form>
			</div>
			<ul>
				<li>Login</li>
				<li>Cadastro</li>
				<li>Manual</li>
				<li>Sobre</li>
			</ul>
	</header>
</body>
</html>