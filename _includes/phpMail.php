<?php
ob_start();

//VERIRICA SE ALGO FOI ENVIADO PELO POST
if($_POST) {
$email_reply = "no-reply@cruzeirosbar.com.br";
$return = "no-reply@cruzeirosbar.com.br";

//VARIAVEIS DO FORMULARIO
$nome = $_POST['nome'];
$email = $_POST['email'];
$fone = $_POST['fone'];
$mensagem = $_POST['mensagem'];


//Cabe�alhos do email



$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8\n";
$headers .= "From: Ferro Battuto <no-reply@ferrobattuto.com.br>\n"; // remetente
$assunto="Contato Website";
$mensagem = '
  <b>Contato Website</b> <br>
  -------------------------------------------------------------------- <br> 
  <strong>Nome</strong>:   '.$nome.' <br />
  <strong>Email</strong>:    '.$email.'<br />
    <strong>Telefones</strong>:    '.$fone.'<br />
  <strong>Mensagem</strong>:    '.$mensagem.'<br /> 
';

mail("contato@ferrobattuto.com.br",$assunto,$mensagem,$headers);
//
header("Location:../contato.php?msg=2");
exit;


}
?> 