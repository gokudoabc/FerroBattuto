<div style="padding-top:15px; margin-left:-5px; ">

	<?php 

		$sqlContando = $mySQL->runQuery("SELECT * FROM fer_categorias_galeria WHERE status='publicado'");
		$rsConta = mysql_fetch_array($sqlContando);

		if($rsConta){
			$sqlCategoriasConta = $mySQL->runQuery("SELECT * FROM fer_categorias_galeria WHERE status='publicado'");
			while($rsProcuraUm = mysql_fetch_array($sqlCategoriasConta)){
				$idPuxandoAgora = 	$rsProcuraUm['idcategoria'];
				$sqlprodutos = $mySQL->runQuery("SELECT * FROM fer_galeria WHERE status='publicado' AND idcategoria='$idPuxandoAgora' LIMIT 20");
					while($rsFoto = mysql_fetch_array($sqlprodutos)) {
			
		?>
		<div>  
			<a href="_imgs/_ups/<?php echo $rsFoto['imagem']; ?>" id="example3" title="<?php echo utf8_encode($rsFoto['nome']); ?>">
				<img src="imagem_banner.php?src=_imgs/_ups/<?php echo $rsFoto['imagem']; ?>&w=160&h=120&zc=2" class="bordaimg2" height="120" width="160" style="border:1px solid #CCC; margin:5px; padding:1px; float:left;">
			</a>
		</div>

			<?php 
		} 
	} 
} else {
	echo "Nenhuma imagem cadastrada.";
}?> 

</div>