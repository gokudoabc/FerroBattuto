 <td width="291" bgcolor="#73150d"><div class="texto2a"><?php $sqlprodutos = $mySQL->runQuery("SELECT * FROM fer_artigo WHERE status='publicado' AND idartigo='".$_GET['id']."'");
						  $rsFoto = mysql_fetch_array($sqlprodutos); ?>

<div style="  margin-top:50px; "><div style="margin-left:40px; *margin-left:40px; *z-index:10; *float:left; position:relative; *margin-top:0px;"><img style="border:1px solid #666; padding:1px;" src="imagem.php?flm=_imgs/_ups/<?php echo $rsFoto['imagem']; ?>&tm=300&ct=1&cva=0" /></div></div>

</div></td>

    <td width="709"  height="425"  bgcolor="#FFFFFF"><div style="  margin-left:-10px; *margin-left:0px;  *margin-top:0px; margin-top:-12px; ">
       <div style="padding-top:35px; *margin-left:0px; padding-left:105px; padding-right:40px;">
    
    <h1 style="color:#a1921b; font-size:20px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; "><?php echo utf8_encode($rsFoto['titulo']); ?></h1>
    <div style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color:#666666; font-size:12px; width:550px; ">
  <?php echo utf8_encode($rsFoto['artigo']); ?>  
	<p>&nbsp;</p>    
	<p><a style="text-decoration:none; padding-right:10px; color:#a1921b;" href="dicas.php" >[ Mais dicas de decoração ]</a></p>    

	</div></td>
