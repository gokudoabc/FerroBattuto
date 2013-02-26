<br/><br/><br/>
<?php $sqlnoticia = $mySQL->runQuery("SELECT * FROM for_profissionais WHERE idprofissional='".$_GET['id']."'");
			$rsnoticia = mysql_fetch_array($sqlnoticia);
															?>
      <form action="usuarios/action.php" method="post" enctype="multipart/form-data" name="form1" id="form1">      
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td colspan="3"><h1><em>Editar Usuario</em>
              <input name="opt" type="hidden" id="opt" value="editar" />
            <input name="idprofissional" type="hidden" id="idprofissional" value="<?php echo $rsnoticia['idprofissional']; ?>" />
            <input name="img_old" type="hidden" id="img_old" value="<?php echo $rsnoticia['imagem']; ?>" />
          </h1></td>
        </tr>        
        <tr>
          <td height="5" colspan="2" align="center" bgcolor="#EFEFEF"></td>
          <td width="56%" rowspan="5" valign="top">
            </td>        
        <tr>
          <td colspan="2" align="center" bgcolor="#EFEFEF"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2">Nome:<br />
              <input name="nome" type="text" id="nome" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['nome']; ?>"/></td>
            </tr>
            <tr>
              <td colspan="2">E-mail:<br />
              <input name="email" type="text" id="email" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['email']; ?>"/></td>
            </tr>
                <tr>
              <td colspan="2">Endereço:<br />
              <input name="endereco" type="text" id="endereco" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['endereco']; ?>"/></td>
            </tr>
                        <tr>
              <td colspan="2">Numero:<br />
              <input name="numero" type="text" id="numero" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['numero']; ?>"/></td>
            </tr>
                        <tr>
              <td colspan="2">Complemento:<br />
              <input name="complemento" type="text" id="complemento" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['complemento']; ?>"/></td>
            </tr>
                        <tr>
              <td colspan="2">Bairro:<br />
              <input name="bairro" type="text" id="bairro" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['bairro']; ?>"/></td>
            </tr>
                                  <tr>
              <td colspan="2">Tipo endereço:<br />
              <?php if($rsnoticia['tipo_endereco'] == 'residencial'){$seleciona = "residencial";} ?>
                    <select name="tipo_endereco" id="tipo2" style="margin-left:3px;"> 
                         <option value="0">--- Selecione ---</option> 
                         <option value="residencial" <?php if($seleciona ="residencial"){ ?>selected="selected" <?php } else { $seleciona2 = "1"; } ?>
>Residencial</option> 
                         <option value="comercial" <?php if($seleciona2 =="1"){ ?>selected="selected" <?php } ?>>Comercial</option> 
                       </select>
              </td>
            </tr>
                      <tr>
              <td colspan="2">Data Nascimento:<br />
              <input name="data_nascimento" type="text" id="data_nascimento" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['data_nascimento']; ?>"/></td>
            </tr>
                                  <tr>
              <td colspan="2">E-mail:<br />
              <input name="email" type="text" id="email" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['email']; ?>"/></td>
            </tr>
                                  <tr>
              <td colspan="2">Telefone:<br />
              <input name="telefone" type="text" id="telefone" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['telefone']; ?>"/></td>
            </tr>
                                  <tr>
              <td colspan="2">Tipo telefone:<br />
              <?php if($rsnoticia['tipo_telefone'] == 'residencial'){$seleciona = "residencial";} ?>
                    <select name="tipo_telefone" id="tipo2" style="margin-left:3px;"> 
                         <option value="0">--- Selecione ---</option> 
                         <option value="residencial" <?php if($seleciona ="residencial"){ ?>selected="selected" <?php } else { $seleciona2 = "1"; } ?>
>Residencial</option> 
                         <option value="comercial" <?php if($seleciona2 =="1"){ ?>selected="selected" <?php } ?>>Comercial</option> 
                       </select>
              </td>
            </tr>

<tr>
              <td colspan="2">Tipo registro:<br />
              <?php if($rsnoticia['tipo_registro'] == 'CRN'){$seleciona = "CRN";} 
			  else  if($rsnoticia['tipo_registro'] == 'COREN'){$seleciona = "COREN";} 
			  else  if($rsnoticia['tipo_registro'] == 'CRM'){$seleciona = "CRM";} 
			  else  if($rsnoticia['tipo_registro'] == 'CREFITO'){$seleciona = "CREFITO";} 
			  else  if($rsnoticia['tipo_registro'] == 'CRO'){$seleciona = "CRO";} 
			  else  if($rsnoticia['tipo_registro'] == 'CRFA'){$seleciona = "CRFA";} 
			  else  if($rsnoticia['tipo_registro'] == 'CRF'){$seleciona = "CRF";} 
			  else  if($rsnoticia['tipo_registro'] == 'CRP'){$seleciona = "CRP";} 
			  else  if($rsnoticia['tipo_registro'] == 'CRBIO'){$seleciona = "CRBIO";} 
			  else  if($rsnoticia['tipo_registro'] == 'CRMV'){$seleciona = "CRMV";} 
			  ?>
                    <select name="tipo_resistro" id="tipo2" style="margin-left:3px;"> 
                     <option value="">--- Selecione ---</option> 
	                   <option <?php if($seleciona ="CRN"){ ?>selected="selected" <?php } ?> value="CRN">CRN</option> 
	                   <option <?php if($seleciona ="COREN"){ ?>selected="selected" <?php } ?> value="COREN">COREN</option> 
	                   <option <?php if($seleciona ="CRM"){ ?>selected="selected" <?php } ?> value="CRM">CRM</option> 
	                   <option <?php if($seleciona ="CREFITO"){ ?>selected="selected" <?php } ?> value="CREFITO">CREFITO</option> 
	                   <option <?php if($seleciona ="CRO"){ ?>selected="selected" <?php } ?> value="CRO">CRO</option> 
	                   <option <?php if($seleciona ="CRFA"){ ?>selected="selected" <?php } ?> value="CRFA">CRFA</option> 
	                   <option <?php if($seleciona ="CRF"){ ?>selected="selected" <?php } ?> value="CRF">CRF</option> 
	                   <option <?php if($seleciona ="CRP"){ ?>selected="selected" <?php } ?> value="CRP">CRP</option> 
	                   <option <?php if($seleciona ="CRBIO"){ ?>selected="selected" <?php } ?> value="CRBIO">CRBIO</option> 
	                   <option <?php if($seleciona ="CRMV"){ ?>selected="selected" <?php } ?> value="CRMV">CRMV</option> 
                                                       </select>
              </td>
            </tr>
      
        <tr>
              <td colspan="2">Restrio:<br />
              <input name="registro" type="text" id="registro" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['registro']; ?>"/></td>
            </tr>
                                  <tr>
              <td colspan="2">Cidade:<br />
              <input name="cidade" type="text" id="cidade" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['cidade']; ?>"/></td>
            </tr>
                                  <tr>
              <td colspan="2">Estado:<br />
              <input name="uf" type="text" id="uf" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['uf']; ?>"/></td>
            </tr>
                                  <tr>
              <td colspan="2">Especialidade:<br />
              <input name="especialidade" type="text" id="especialidade" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['especialidade']; ?>"/></td>
            </tr>
                                  <tr>
              <td colspan="2">Quer receber novidades:<br />
              <input name="autoriza" type="text" id="autoriza" style="border:1px solid #999; width:150px;" size="50" value="<?php echo $rsnoticia['autoriza']; ?>"/></td>
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