<?php
$maxRows_Dicas = 8;
$pageNum_Dicas = 1;
if (isset($_GET['page'])) {
  $pageNum_Dicas = $_GET['page'];
}
$startRow_Dicas = ($pageNum_Dicas - 1) * $maxRows_Dicas;

$query_Dicas = "SELECT * FROM fer_artigo WHERE status='publicado' ORDER BY idartigo DESC";
$query_limit_Dicas = sprintf("%s LIMIT %d, %d", $query_Dicas, $startRow_Dicas, $maxRows_Dicas);
$sqlprodutos = $mySQL->runQuery($query_limit_Dicas, $BDados) or die(mysql_error());
//$row_Dicas = mysql_fetch_assoc($sqlprodutos);

if (isset($_GET['totalRows_Dicas'])) {
  $totalRows_Dicas = $_GET['totalRows_Dicas'];
} else {
  $all_Dicas = $mySQL->runQuery($query_Dicas);
  $totalRows_Dicas = mysql_num_rows($all_Dicas);
}
$totalPages_Dicas = ceil($totalRows_Dicas/$maxRows_Dicas);
?>

<td width="291" bgcolor="#73150d"><div class="texto2a">
<div style="  margin-top:50px; "><div style="margin-left:40px; *margin-left:40px; *z-index:10; *float:left; position:relative; *margin-top:0px;"><img style="border:1px solid #666;  padding:1px;" src="img/img.jpg" /></div></div>

</div></td>
    <td width="709" height="425" bgcolor="#FFFFFF"><div style="  margin-left:-10px; *margin-left:0px;  margin-top:-12px; ">
    <div style="padding-top:35px; *margin-left:0px; padding-left:105px; padding-right:40px;">
    <?php //$sqlprodutos = $mySQL->runQuery("SELECT * FROM fer_artigo WHERE status='publicado' ORDER BY idartigo DESC");
						  while($rsFoto = mysql_fetch_array($sqlprodutos)){; ?>
    <a href="dicas.php?id=<?php echo $rsFoto['idartigo']; ?>" style="color:#a1921b; font-size:20px;  text-decoration:none; font-weight:bold; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; "><?php echo utf8_encode($rsFoto['titulo']); ?></a>
    <div style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color:#666666; font-size:12px; width:550px; margin-top:-10px; *margin-top:0px;">
 <p> <?php echo utf8_encode($rsFoto['resumo']); ?></p>
    </div>
    <div><img src="img/barra.gif"  style="margin-bottom:13px;  margin-top:3px; *margin-top:10px; *margin-bottom:15px;" /> </div>
    <?php } ?>
	
    
<div class="paginacao" align="center">
<?php
//Paginacao
$adjacents = 7;
$reload = $_SERVER['PHP_SELF'];
if ($totalRows_Dicas>$maxRows_Dicas){
include("pagination3.php");
echo paginate_three($reload, $pageNum_Dicas, $totalPages_Dicas, $adjacents);
}
?>
</div>

</td>