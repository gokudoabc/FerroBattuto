   
<?php include ('_includes/head.php');?> 
  <!--fim topo-->     
    <title>Serralheria Ferro Battuto | Contato Serralheria</title> 
</head>
<body class="home blog"> 
<div id="wrp"> 
<div id="header"> 
	<div id="headbg"> 
<h1 class="main"><a href="http://www.ferrobattuto.com.br/">Serralheria Ferro Battuto | Contato Serralheria</a></h1> 
<?php include ('_includes/menu.php');?> 
	</div> 
</div> 
<div id="inner">
<div id="pages">
<h2 class="main">Contato</h2>
<?php if($_GET['msg']){echo "Mensagem enviada com sucesso, obrigado.<br/><br/>"; } ?>
 <form action="_includes/phpMail.php" name="contato" id="contato" method="post"> 

 

 

            

 

						 <table width="404" border="0" cellpadding="3" cellspacing="5" class="contato"> 

 

                <tr valign="top"> 

                  

                  <td width="85"  align="right" ><span style="color:#381515; font-size:12px;" >Nome</span><span style="color:#ab4d76;">*</span>:</td> 

                  

                  <td width="278" > 

                    

                    <input class="formularios" type="text" name="nome" style="border:1px solid #381515; background:#381515;  color:#e6c655; " id="nome" size="34" /> 

                    

                  </td> 

                  

                </tr> 

                <tr> 

                  <td align="right"  ><span style="color:#381515; font-size:12px;" >E-mail</span><span style="color:#ab4d76;">*</span>:</td> 

                  <td ><input class="formularios" type="text" name="email" style="border:1px solid #381515; background:#381515; color:#e6c655; " id="email" size="34" /></td> 

                </tr> 

                <tr> 

                  <td align="right"  ><span style="color:#381515; font-size:12px;" >Telefone </span>:</td> 

                  <td ><input class="formularios" type="text" name="telefone" style="border:1px solid #381515; background:#381515;  color:#e6c655;" id="telefone" size="34" /></td> 

                </tr> 

					<tr> 

                  

                  <td align="right"  ><span style="color:#381515; font-size:12px;" >Mensagem</span>:<span style="color:#ab4d76;">*</span>:</td> 

                  

                  <td > 

                    

                    <textarea class="formularios" name="mensagem" id="mensagem" style="border:1px solid #381515; width:235px; background:#381515; color:#e6c655;" cols="26" rows="4"></textarea> 

                    

                    </td> 

                  

                </tr> 

 

                <tr> 
					<td ></td> 
					<td align="left" >
                  	<div align="center" style="margin-left:-30px;"> 
						<input class="formularios" type="submit" name="enviar" style="border:1px solid #381515;   " value="Enviar" /> 
                  	</div>
                  	</td> 
              	</tr> 

 

                

 

              </table> 

 

            </form>
        </div> <!-- #home --> 
    </div><!--#inner--> 
</div><!--#wrp--> 
<!--baixo-->     
<?php include ('_includes/footer.php');?> 
