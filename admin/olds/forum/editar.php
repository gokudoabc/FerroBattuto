<br/><br/><br/>
<?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM  neo_forum WHERE idpost='".$_GET['id']."'");
			$rsnoticia = mysql_fetch_array($sqlnoticia);
															?>
      <form action="forum/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      	 <input name="opt" type="hidden" id="opt" value="editar" />
            <input name="idpost" type="hidden" id="idpost" value="<?php echo $rsnoticia['idpost']; ?>" />
            <input name="img_old" type="hidden" id="img_old" value="<?php echo $rsnoticia['imagem']; ?>" />      
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Editar Discussion Board - Profissionais de sa&uacute;de</em>
           
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
                <td><?php echo $rsnoticia['datacriacao']; ?></td>
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
              <td colspan="2">Paciente:<br />
                <input name="paciente" type="text" id="paciente" style="border:1px solid #999; width:200px;" value="<?php echo $rsnoticia['paciente']; ?>" size="101" maxlength="100"/></td>
            </tr>
                        <tr>
              <td colspan="2">Sexo:<br />
                <input name="sexo" type="text" id="sexo" style="border:1px solid #999; width:200px;" value="<?php echo $rsnoticia['sexo']; ?>" size="101" maxlength="100"/></td>
            </tr>
                        <tr>
              <td colspan="2">Idade:<br />
                <input name="idade" type="text" id="idade" style="border:1px solid #999; width:200px;" value="<?php echo $rsnoticia['idade']; ?>" size="101" maxlength="100"/></td>
            </tr>
            <tr>
              <td colspan="2"><br />Historico:<br />
                <div style="width:670px;">
                  <?php
				$oFCKeditor = new FCKeditor('historico') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $rsnoticia['historico'];
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
                        <tr>
              <td colspan="2"><br />Diagnostico:<br />
                <div style="width:670px;">
                  <?php
				$oFCKeditor = new FCKeditor('diagnostico') ;
				$oFCKeditor->BasePath = '_js/fckeditor/' ;
				$oFCKeditor->Config['SkinPath'] = 'skins/silver/' ;
				$oFCKeditor->Value = $rsnoticia['diagnostico'];
				$oFCKeditor->Create() ;
			?>
                </div></td>
            </tr>
                                <tr>
              <td colspan="2">Cidade:<br />
                <input name="cidade" type="text" id="cidade" style="border:1px solid #999; width:200px;" value="<?php echo $rsnoticia['cidade']; ?>" size="101" maxlength="100"/></td>
            </tr>
                                            <tr>
              <td colspan="2">Médico:<br />
                <input name="medico" type="text" id="medico" style="border:1px solid #999; width:200px;" value="<?php echo $rsnoticia['medico']; ?>" size="101" maxlength="100"/></td>
            </tr>     
            <tr>
              <td colspan="2"><br />Imagem:<br />
            <a href="../_img/_forum/<?php echo $rsnoticia['imagem']; ?>"> <?php echo $rsnoticia['imagem']; ?></a><br />
                <?php if($rsnoticia['imagem']) { ?>
                <input name="imagem_delete" type="checkbox" id="imagem_delete" value="1" />
                <label for="imagem_delete"></label>
Apagar arquivo<br /><?php } ?>
                <input name="imagem" type="file" id="imagem" style="border:1px solid #999; width:500px;" value="<?php echo $rsnoticia['imagem']; ?>" size="81" maxlength="100"/></td>
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