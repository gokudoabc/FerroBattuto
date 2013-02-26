<?php include ('_includes/head.php');?> 
  <title>Serralheria Ferro Battuto | Produtos Serralheria</title> 
</head>
<body class="home blog"> 
<div id="wrp"> 
  <div id="header"> 
    <div id="headbg"> 
      <h1 class="main"><a href="http://www.ferrobattuto.com.br/">Serralheria Ferro Battuto | Produtos Serralheria</a></h1> 

      <?php include ('_includes/menu.php');?> 

    </div> 
  </div> 

  <div id="inner">
    <div id="pages">
      <h2 class="main" style="margin-left:-110px;">Produtos</h2>
      <p class="main">
        Clique na categoria desejada.
      </p>
      <p class="main">

        <table width="1000" border="0">
          <tr valign="top">
            <td width="300"><ul>

            <?php
                $i=0;
                $sqlmarca = $mySQL->runQuery("SELECT idcategoria,nome,status FROM fer_categorias_galeria WHERE status='publicado' ");
                  while($rsmarca = mysql_fetch_array($sqlmarca)) {
                $i++;
                
                if($i%2){ 
                  ?> 
             <div style="clear:both;"></div>
             <?php } ?>

            <li class="marca_alinhamento" style="*margin-top:0px; *margin-left:5px; margin-top /*\**/:2px;  ">
              <a href="produtos.php?id=<?php echo $rsmarca['idcategoria']; ?>" class="marca">
                <?php echo utf8_encode($rsmarca['nome']); ?>
              </a>
            </li> 

            <li style="list-style:none;">
              <div style="margin-left:0px; width:150px; height:1px; color:#999; border:1px dotted #Ccc;"/></div>
            </li>

             <?php } ?>

            </ul>
            <td width="700">
              <?php if(!$_GET['id']){
                include("_includes/abreGaleriaAleatoria.php"); 
              } else {
                include("_includes/abreGaleriaX.php"); 
              } ?> 
            </td>
          </tr>
        </table>

    </div> <!-- #home --> 
  </div><!--#inner--> 
</div>  <!--baixo-->     
<?php include ('_includes/footer.php');?> 
