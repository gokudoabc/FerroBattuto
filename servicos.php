<?php include ('_includes/head.php');?> 
  
    <title>i.i</title> 
</head>
<body class="home blog"> 
<div id="wrp"> 
    <div id="header"> 
        <div id="headbg"> 
        <h1 class="main"><a href="http://www.ferrobattuto.com.br/">Serralheria Ferro Battuto | Servi&ccedil;os Serralheria</a></h1> 
               <?php include ('_includes/menu.php');?> 
    </div> 
</div> 
    <div id="inner">
        <div id="pages">
            <h2 class="main">Servi&ccedil;os</h2>
            <?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM fer_artigo WHERE idartigo='8'");
            $rsnoticia = mysql_fetch_array($sqlnoticia);
            ?>

            <?php echo $rsnoticia['artigo'];?>
           
        </div> <!-- #home --> 
    </div><!--#inner--> 
</div><!--#wrp--> 
  <!--baixo-->     
<?php include ('_includes/footer.php');?> 
