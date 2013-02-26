<?php
//pasta onde esta a imagem (parametros sao passados por URL)
$imagem = @$_GET["src"];
$dw = @$_GET["w"];
$dh = @$_GET["h"];
$qa = @$_GET["zc"];
$formato = @$_GET["ct"];
$curvas = @$_GET["cva"];
$sextensao = "jpg";

 $imagem=str_replace("%20"," ",$imagem);

 $img = imagecreatefromjpeg($imagem); 

 $w = @imagesx($img);
 $h = @imagesy($img);

 if($formato=="1")
 {
  //width=w
  //x=dw
  if($w>$h)
  {
   $new_width=$dw;
   $new_height=(($dw*$h)/$w);
   settype ($new_height, "integer");
  }
  else if($w<$h)
  {
   $new_width=(($dh*$w)/$h);
   $new_height=$dh;
   settype($new_width, "integer");
  }
  else
  {
   $new_width = $dw;
   $new_height = $dh;
  }
  $dw = $new_width;
  $dh = $new_height;

  $tmp_img = imagecreatetruecolor($new_width, $new_height);

  $tmp_img = imagecreatetruecolor($dw, $dh);
  imagecolorallocate($tmp_img,255,255,255);
  $c  = imagecolorallocate($tmp_img,255,255,255);
  for ($i=0;$i<=$dh;$i++) { imageline($tmp_img,0,$i,$dw,$i,$c); }

  //imagecolorallocate($img,255,255,255);
  @imagecopyresampled($tmp_img,$img,0,0,0,0,$new_width,$new_height,$w,$h);
  //imagecopyresized($tmp_img,$img,0,0,0,0,$new_width,$new_height,$w,$h);
  $img=$tmp_img;
 }
 else
 {
  $im = $img;
  $w1 = $w / $dw;
  if ($dh == 0)
  {
   $h1 = $w1;
   $hei = $h / $w1;
  }
  else
  {
   $h1 = $h / $dh;
  }
  $min = min($w1,$h1);

  $xt = $min * $dw;
  $x1 = ($w - $xt) / 2;
  $x2 = $w - $x1;

  $yt = $min * $dh;
  $y1 = ($h - $yt) / 2;
  $y2 = $h - $y1;

  $x1 = (int) $x1;
  $x2 = (int) $x2;
  $y1 = (int) $y1;
  $y2 = (int) $y2;

  $im2 = imagecreatetruecolor($dw,$dh);
  $img = NULL;

  $img = imagecreatetruecolor($dw, $dh);
  imagecolorallocate($img,255,255,255);
  $c  = imagecolorallocate($img,255,255,255);
  for ($i=0;$i<=$dh;$i++) { imageline($img,0,$i,$dw,$i,$c); }

  imagecopyresampled($img,$im,0,0,$x1,$y1,$dw,$dh,$x2-$x1,$y2-$y1);
 }

 if($curvas==true)
 {
  $path="";
  if(@file_exists("imagizer1.png")) { $path=""; }
  $insertfile_id = imageCreateFromPNG($path."imagizer1.png");
  imageCopy($img,$insertfile_id,0,0,0,0,8,8);
  $insertfile_id = imageCreateFromPNG($path."imagizer2.png");
  imageCopy($img,$insertfile_id,$dw-8,0,0,0,8,8);
  $insertfile_id = imageCreateFromPNG($path."imagizer3.png");
  imageCopy($img,$insertfile_id,0,$dh-8,0,0,8,8);
  $insertfile_id = imageCreateFromPNG($path."imagizer4.png");
  imageCopy($img,$insertfile_id,$dw-8,$dh-8,0,0,8,8);
 }

 header('Content-type: image/jpg'); 
 
 imagejpeg($img,"",90);

return @imagecopy($sourceres,$insertfile_id,$dest_x,$dest_y,0,0,$insertfile_width,$insertfile_height);
?>