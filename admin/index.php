<?php include("../_includes/conexao.php");
if($_SESSION["usuario"] && $_SESSION["idadmin"] ){ header("Location:principal.php"); } else {} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="_css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="login">
<div id="login">
<img src="_img/logo.png"  style="margin-left:55px; margin-bottom:25px;" alt="Logo Site" />
<?php if($_GET['msg']) { ?>
<p class="message">	Usu&aacute;rio ou senha incorretos.<br /></p>
<?php } ?>
<form name="loginform" id="loginform" class="loginform" action="login.php" method="post">
  <p>
		<label>Usuario<br />
		<input type="text" name="usuario" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<p>
		<label>Senha<br />

		<input type="password" name="senha" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
	</p>
	
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Entrar" tabindex="100" />
		<input type="hidden" name="testcookie" value="1" />
	</p>

</form>
</div>
<p id="backtoblog"><a href="http://www.artemobile.com.br" title="Are you lost?">Voltar para o site</a></p>
</body>
</html>