<?php ob_start(); include("../_includes/conexao.php"); include("_includes/permissao.php"); include("_includes/funcoes.php"); include("_includes/define.php"); include_once("_js/fckeditor/fckeditor.php"); ?> 
<?php header("Content-Type: text/html; charset=ISO-8859-1",true); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $tituloadmin; ?></title>
<link href="_css/style.css" rel="stylesheet" type="text/css" />
<link href="_css/paginate.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="_js/jquery-1.3.2.js"/></script>
<script type="text/javascript" src="_js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="_js/funcoes.js"></script>
		<script type="text/javascript" src="_js/jquery-ui-1.7.2.custom.min.js"></script> 
		<script type="text/javascript" src="_js/calendario.js"></script> 
		<link rel="stylesheet" type=text/css href="_css/jquery-ui-1.7.2.custom.css" /> 
</head>
<body>
<!--Inicio div master-->
<div id="master">