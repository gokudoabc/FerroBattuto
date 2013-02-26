<br/><br/><br/>
<?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM for_pais WHERE idartigo='".$_GET['id']."'");
			$rsnoticia = mysql_fetch_array($sqlnoticia);
															?>
      <form action="paraospais/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      	 <input name="opt" type="hidden" id="opt" value="editar" />
            <input name="idartigo" type="hidden" id="idartigo" value="<?php echo $rsnoticia['idartigo']; ?>" />
            <input name="img_old" type="hidden" id="img_old" value="<?php echo $rsnoticia['imagem']; ?>" />      
                        <input name="autor2" type="hidden" id="autor2" value="<?php echo $_SESSION['nomeuser']; ?>" />

      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Editar Pais:</em>
           
          </h1></td>
        </tr>        
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
          <td width="56%" rowspan="5" valign="top">
            <table width="200" border="0" cellspacing="3" cellpadding="3" style="background-color:#d8d8d8; margin-left:20px;">
              <tr>
                <td colspan="3" bgcolor="#666666"><span style="color:#FFF; margin-left:5px;"><strong>Info:</strong></span></td>
              </tr>
              <tr>
                <td width="15" rowspan="7">&nbsp;</td>
                <td height="5" colspan="2"></td>
              </tr>
              <tr>
                <td width="94"><strong style="color:#000;">Id:</strong></td>
                <td width="141"><?php echo $_GET['id']; ?></td>
              </tr>
              <tr>
                <td><strong style="color:#000;">Inserido:</strong></td>
                <td><?php echo $rsnoticia['datainserido']; ?></td>
              </tr>
              <tr>
                <td><strong style="color:#000;">Por:</strong></td>
                <td><?php echo $rsnoticia['autor']; ?></td>
              </tr>
              <tr>
                <td><strong style="color:#000;">Modificado:</strong></td>
                <td><?php echo $rsnoticia['datamodificacao']; ?></td>
              </tr>
              <tr>
                <td><strong style="color:#000;">Por:</strong></td>
                <td><?php echo $rsnoticia['autor2']; ?></td>
              </tr>
              <tr>
                <td height="5" colspan="2"></td>
              </tr>
          </table></td>        
        <tr>
          <td colspan="2" align="center" bgcolor="#EFEFEF"><table width="95%" border="0" align="center" cellpadding="3" cellspacing="3">
            <tr>
              <td colspan="2">Titulo:<br />
                <input name="titulo" type="text" id="titulo" style="border:1px solid #999; width:630px;" value="<?php echo $rsnoticia['titulo']; ?>" size="101" maxlength="100"/></td>
            </tr>
            <tr>
              <td colspan="2"><br />Resumo:<br />
                <div style="width:670px;">
                  <?php
				$oFCKeditor = new FCKeditor('resumo') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $rsnoticia['resumo'];
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
            <tr>
              <td colspan="2"><br />Not&iacute;cia:<br />
                <div style="width:670px;">
                  <?php
				$oFCKeditor = new FCKeditor('artigo') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $rsnoticia['artigo'];
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
            <tr>
              <td colspan="2"><br />Imagem:<br />
                <?php if($rsnoticia['imagem']) { ?><img src="../_imgs/_ups/<?php echo $rsnoticia['imagem']; ?>" alt="" width="70" height="56" border="0"/>
                <input name="imagem_delete" type="checkbox" id="imagem_delete" value="1" />
                <label for="imagem_delete"></label>
Apagar imagem<br /><?php } ?>
                <input name="imagem" type="file" id="imagem" style="border:1px solid #999; width:500px;" value="<?php echo $rsnoticia['titulo']; ?>" size="81" maxlength="100"/></td>
            </tr>
                        <tr>
              <td colspan="2">Ordem:
                <label for="ordem"></label>
                <input name="ordem" type="text" id="ordem" size="5" value="<?php echo $rsnoticia['ordem']; ?>" autocomplete="off"/></td>
            </tr>

            <tr>
              <td colspan="2"><br />Mostrar:
                <input name="status" type="checkbox" id="status" <?php if($rsnoticia['status']=='publicado') { echo 'value="publicado" checked="checked"';} else { echo 'value="publicado"'; } ?>  />
                <label for="status"></label></td>
            </tr>
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