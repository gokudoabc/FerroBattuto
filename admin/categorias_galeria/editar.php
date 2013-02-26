<br/><br/><br/>
<?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM fer_categorias_galeria WHERE idcategoria='".$_GET['id']."'");
			$rsnoticia = mysql_fetch_array($sqlnoticia);
															?>
      <form action="categorias_galeria/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      	 <input name="opt" type="hidden" id="opt" value="editar" />
            <input name="idcategoria" type="hidden" id="idcategoria" value="<?php echo $rsnoticia['idcategoria']; ?>" />

      <table width="800" border="0" cellspacing="0" cellpadding="4" align="left">
        <tr>
          <td colspan="3"><h1><em>Editar Projetos - Categoria</em>
           
          </h1></td>
        </tr>        
        <tr>
          <td height="5" colspan="2" align="left" bgcolor="#EFEFEF"></td>
          <td width="7%" rowspan="5" valign="top">
            </td>        
        <tr>
          <td colspan="2" align="left" bgcolor="#EFEFEF"><table width="700" border="0" align="center" cellpadding="3" cellspacing="3">
            <tr>
              <td colspan="2">Titulo:<br />
                <input name="nome" type="text" id="nome" style="border:1px solid #999; width:630px;" value="<?php echo $rsnoticia['nome']; ?>" size="80" maxlength="100"/></td>
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