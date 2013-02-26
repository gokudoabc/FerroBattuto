<?php include("_includes/header.php"); ?>
<div style=" background:url(_img/bg_topo.gif) repeat-x; height:55px;">
	<img src="_img/logo_teste2.png"  width="120"  style="float:left; margin-left:20px; margin-top:10px;" />
	<h1 class="usuario">Bem Vindo, <?php echo $_SESSION["nomeuser"]; ?> | <a href="logout.php" title="Sair">Sair</a></h1>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="14%" valign="top">
<div class="urbangreymenu">
    <h3 class="headerbar">Menu</h3>
    <ul>
    <!--<li><a href="principal.php?type=banner">Banner </a></li>-->
    <!--<li><a href="principal.php?type=noticias">Dicas</a></li>-->
    <!--<li><a href="principal.php?type=empresa">Empresa </a></li>-->
    <!--<li><a href="principal.php?type=servicos">Servi&ccedil;os</a></li>-->
    <!--<li><a href="principal.php?type=installs">Instala&ccedil;&otilde;es</a></li>-->
    <!--<li><a href="principal.php?type=categorias">Categorias Produtos</a></li>-->
    <!--<li><a href="principal.php?type=produtos">Produtos</a></li>-->
    <li><a href="principal.php?type=servicos">Servi&ccedil;os</a></li>
    <li><a href="principal.php?type=rodape">Rodape</a></li>

        <li><a href="principal.php?type=galeria">Produtos - &gt; Imagens</a></li>

    <li><a href="principal.php?type=categorias_galeria"> Produtos -&gt; Categorias</a></li>
    
    </ul>        
</div>
    </td>
    <td width="84%" valign="top" id="carrega_conteudo">
	<?php 
	 
		switch ($_GET['type']) {
			
		
			//Pagina categorias
			case 'categorias_galeria':
			include("categorias_galeria/geral.php");
			break;
		case 'icategorias_galeria':
			include("categorias_galeria/inserir.php");
			break;
		case 'edcategorias_galeria':
			include("categorias_galeria/editar.php");
			break;	
			
			//Pagina categorias
			case 'galeria':
			include("galeria/geral.php");
			break;
		case 'igaleria':
			include("galeria/inserir.php");
			break;
		case 'edgaleria':
			include("galeria/editar.php");
			break;	
			//Paginaempresas
			
				//Pagina categorias
			case 'servicos':
			include("paginas/editar.php");
			break;
		case 'edservicos':
			include("paginas/editar.php");
			break;		
	
					//Pagina categorias
			case 'rodape':
			include("rodape/editar.php");
			break;
		case 'edrodape':
			include("rodape/editar.php");
			break;		
	
			
		default:
			echo "<br/><br/><br/><br/><h3>Home</h3>					
				Ol&aacute; <strong>".$_SESSION["nomeuser"]."</strong>, bem vindo ao painel administrativo.<br />
				Escolha uma das op&ccedil;&otilde;es ao lado 
			
			";
			break;
			
		} 
	?>
</td>
    <td width="2%"></td>
  </tr>
</table>
<div style="text-align:center; margin-bottom:40px;"></div>
<?php include("_includes/footer.php"); ?>