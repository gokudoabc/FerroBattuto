<?php 

$sqlContando = $mySQL->runQuery("SELECT * FROM fer_galeria WHERE idcategoria='".$_GET['id']."' AND status='publicado'");
$rsConta = mysql_fetch_array($sqlContando);
if($rsConta){
$sqlprodutos = $mySQL->runQuery("SELECT * FROM fer_galeria WHERE idcategoria='".$_GET['id']."' AND status='publicado'");
						  while($rsFoto = mysql_fetch_array($sqlprodutos)) {

?>
    <div >  <a href="_imgs/_ups/<?php echo $rsFoto['imagem']; ?>" id="example3" title="<?php echo utf8_encode($rsFoto['nome']); ?>"><img src="imagem.php?flm=_imgs/_ups/<?php echo $rsFoto['imagem']; ?>&tm=160&ct=1&cva=0" class="bordaimg2" height="120" style="border:1px solid #CCC; margin:5px; padding:1px; float:left;"></a></div>
 
						
                        
                        <?php } } else {echo "<span style='color:#fff;'>Nenhuma imagem cadastrada.</span>";}?>
