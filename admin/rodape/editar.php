<br/><br/><br/>
<?php $idAberto = $_SESSION['id']; ?>
<?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM fer_artigo WHERE idartigo='34'");
			$rsnoticia = mysql_fetch_array($sqlnoticia);
															?>
      <form action="rodape/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      	 <input name="opt" type="hidden" id="opt" value="editar" />
            <input name="img_old" type="hidden" id="img_old" value="<?php echo $rsnoticia['imagem']; ?>" />      
            <input name="idVai" type="hidden" id="idVai" value="34" />      

      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Editar Pagina </em>
           
          </h1></td>
        </tr>        
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
          <td width="56%" rowspan="5" valign="top">
            <table width="200" border="0" cellspacing="3" cellpadding="3" style="background-color:#d8d8d8; margin-left:20px;">

             
          </table></td>        
        <tr>
          <td colspan="2" align="center" bgcolor="#EFEFEF"><table width="95%" border="0" align="center" cellpadding="3" cellspacing="3">
           
           <!--  <tr>
              <td colspan="2">Titulo:<br />
                <input name="titulo" type="text" id="titulo" style="border:1px solid #999; width:630px;" value="<?php echo $rsnoticia['titulo']; ?>" size="101" maxlength="100"/></td>
            </tr> --> <tr>
            
              <td colspan="2"><br />Conteudo:<br />
                <div style="width:670px; ">
                  <?php
				$oFCKeditor = new FCKeditor('artigo') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $rsnoticia['artigo'];
				$oFCKeditor->Width    = 670; 
				$oFCKeditor->Height   = 650; 				
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
           <!-- <tr>
              <td colspan="2"><br />Imagem:<br />
                <?php if($rsnoticia['imagem']) { ?><img src="../_imgs/_ups/<?php echo $rsnoticia['imagem']; ?>" alt="" width="70" height="56" border="0"/>
                <input name="imagem_delete" type="checkbox" id="imagem_delete" value="1" />
                <label for="imagem_delete"></label>
Apagar imagem<br /><?php } ?>
                <input name="imagem" type="file" id="imagem" style="border:1px solid #999; width:500px;" value="<?php echo $rsnoticia['titulo']; ?>" size="81" maxlength="100"/></td>
            </tr> -->
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="alterar" id="alterar" value="Alterar" />
                <input type="submit" name="bnt_excluir" id="bnt_excluir" value="Lixeira" /></td>
            </tr>
          </table></td>
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
        <tr>
         
        </table>
      <br />
      <br/>
</form>