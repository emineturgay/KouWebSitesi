<DOCTYPE html>
<html>
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<link rel="stylesheet" href="menu1.css">-->
  
    
  
</head>
<body  style="background:gray;">
<?php


 $baglan=@mysql_connect("localhost","root","");
$kullanici_adi=$_POST['kullanici_adi'];
$sifre=$_POST['sifre'];
$islem_turu=$_POST['islem_turu'];
session_start();
$_SESSION['kullanici_adi']=$kullanici_adi;
$_SESSION['islem_turu']=$islem_turu;
// ve degiskenleri kaydedelim

if($baglan){
	$db_sec=@mysql_select_db("bilgiler",$baglan);
	if($db_sec){
		mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'");
		$veri=@mysql_query("SELECT *  FROM personel  WHERE  kullanici_adi='$kullanici_adi' ",$baglan);
		 $db_ad=@mysql_result($veri,0,"kullanici_adi");
		  $db_isim=@mysql_result($veri,0,"personel_isim");
		   $db_soyisim=@mysql_result($veri,0,"kullanici_adi");
		  $db_sifre=@mysql_result($veri,0,"sifre");
		 if(!$db_ad){
				echo ' 
					<div  class="panel" style="background:gray;">
					<div  class="panel-body" style="margin-top:90px;">
					<div  class="row" >
					<div  class="col-sm-2"></div>
					
					<div  class="col-sm-8" style="background:-webkit-radial-gradient(circle,#9999FF,gray);
	                       background:-moz-radial-gradient(circle,#9999FF,gray);
	                       background:radial-gradient(circle,#9999FF,gray);">
					 <div class="row">
					 <div class="col-sm-4" ><img id="anahtar" class="img-responsive" src="key3.png" style="-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);transform:rotate(45deg);"></div>
					 <div  class="col-sm-4  id="border" ><div class="alert alert-warning" style="margin-top:120px;text-align:center;"><strong>Kullanici ismi yanlış</strong></div></div>
					 <div  class="col-sm-4" ></div>
					 </div>
					</div>
					
					<div  class="col-sm-2"></div>
					</div>
					
					</div>
					</div>';
					header("refresh:3;url=sisteme_giris.php");
                    die("");

			 }
			else{
				if(strcmp($db_sifre,$sifre)==0){
				 mysql_close();
				 header ("Location:baglan.php");
				}
				else{
					
					echo ' 
					<div  class="panel" style="background:gray;">
					<div  class="panel-body" style="margin-top:90px;">
					<div  class="row" >
					<div  class="col-sm-2"></div>
					
					<div  class="col-sm-8" style="background:-webkit-radial-gradient(circle,#9999FF,gray); 
	                       background:-moz-radial-gradient(circle,#9999FF,gray);
	                       background:radial-gradient(circle,#9999FF,gray);">
					 <div class="row">
					 <div class="col-sm-4" ><img id="anahtar" class="img-responsive" src="key3.png" style="-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);transform:rotate(45deg);"></div>
					 <div  class="col-sm-4  id="border" ><div class="alert alert-warning" style="margin-top:120px;text-align:center;"><strong>Şİfre yanlış</strong></div></div>
					 <div  class="col-sm-4" ></div>
					 </div>
					</div>
					
					<div  class="col-sm-2"></div>
					</div>
					
					</div>
					</div>
					';
header("refresh:3;url=sisteme_giris.php");
die("");

				}
			}
	    
		
	}
}
  else{
	die("baglantı sağlanamadı");
} 
   
					


		
?>
</body>
</html>