<!DOCTYPE html >

<html>
<head>
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 <style>
 .panel#mesaj_kutu1{
	background:lightblue;
	border:2px solid gray;
	padding:20px;
	background:-webkit-radial-gradient(circle,lightblue,gray);
	background:-moz-radial-gradient(circle,lightblue,gray);
	background:radial-gradient(circle,lightblue,gray);
}
.panel#mesaj_kutu2{
	background:lightblue;
	border:2px solid gray;
	padding:20px;
	background:-webkit-radial-gradient(circle,lightblue,gray);
	background:-moz-radial-gradient(circle,lightblue,gray);
	background:radial-gradient(circle,lightblue,gray);
}
 </style>
</head>

<body  style="background:gray;">
<?php
$baglan=@mysql_connect("localhost","root","");
$db_sec=@mysql_select_db("bilgiler",$baglan);
session_start();
 if($db_sec){
if(isset($_POST['baslik'])&&isset($_POST['icerik'])){
	    $baslik=$_POST['baslik'];
        $icerik=$_POST['icerik'];
		$islem_turu=$_SESSION["islem_turu"];
        $kullanici_adi   = $_SESSION["kullanici_adi"];
		$kaynak=$_FILES['dosya']['tmp_name'];
        $gecici_isim=$_FILES['dosya']['name'];
        $boyut=$_FILES['dosya']['size'];
       $turu=$_FILES['dosya']['type'];
       $uzanti=substr($gecici_isim,strpos($gecici_isim,'.')+1 );
       $yeni_ad=substr(uniqid(md5(rand())),0,15).'.'.$uzanti;
       $hedef="dosya/";
       $yol=$hedef.$yeni_ad;
	if(empty($baslik) || empty($icerik)){
       echo' <div class="alert alert-warning"style="margin-top:40px;text-align:center;"><strong>içerik veya başlık  boş bırakılamaz</strong></div>';
	}
	else{
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'");
if(strcmp($islem_turu,"duyuru")==0){
	if(@move_uploaded_file($kaynak,$yol)){
		$sql=mysql_query("INSERT INTO  duyuru(kullanici_adi,mesaj_baslik,mesaj_icerik,dosya_yol,dosya_tur) VALUES('$kullanici_adi','$baslik','$icerik','$yol','$turu')");
	}
	 else{$sql=mysql_query("INSERT INTO  duyuru(kullanici_adi,mesaj_baslik,mesaj_icerik) VALUES('$kullanici_adi','$baslik','$icerik')");}
	
	}
else if(strcmp($islem_turu,"etkinlik")==0){
if(@move_uploaded_file($kaynak,$yol)){
		$sql=mysql_query("INSERT INTO  etkinlik(kullanici_adi,mesaj_baslik,mesaj_icerik,dosya_yol,dosya_tur) VALUES('$kullanici_adi','$baslik','$icerik','$yol','$turu')");
	}
	 else{$sql=mysql_query("INSERT INTO  etkinlik(kullanici_adi,mesaj_baslik,mesaj_icerik) VALUES('$kullanici_adi','$baslik','$icerik')");}
	
}
else{echo "islem_turu seçilemedi!";}
if($sql){
	 echo' <div class="alert alert-success"style="margin-top:40px;text-align:center;"><strong>Gönderiniz  Başarılı Bir Şekilde Paylaşılmıştır</strong></div>';
}
$baslik="";
$icerik="";
 }
   
	}
	
}
else  echo "veritabanı seçilemedi!<br>";
?>
<div class="container"   style="margin-top:100px;">
<div class="panel" id="mesaj_kutu1" > 
 <div  class="panel-body"  >
<div  class="row" >
 <div  class="col-sm-4"><img class="img-responsive" src="mesaj.png" style="margin-top:50px;"></div>
 <div  class="col-sm-6" id="mesaj_kutu2">
 
 <form  action="baglan.php" enctype="multipart/form-data" method="post"  >
       
    <div class="form-group">
     <div  class="row">
      <div  class="col-sm-2"><label for="email">Baslik:</label></div>
     <div class="col-sm-6" >
      <input type="text" class="form-control" name="baslik" id="baslik" placeholder="Konu Baslığı:"></div>
      <div  class="col-sm-4"></div>
    </div>
   </div>
   
     
    <div class="form-group">
   <div class="row">
      <div class="col-sm-2"><label for="textarea">İçerik:</label></div>
      <div class="col-sm-6"> <textarea  class="form-control"  rows="10"  cols="40"  name="icerik" id="icerik"> </textarea> </div>
      <div  class="col-sm-4"></div>
    </div>
</div>
 
 
     <div class="row">
	 <div  class="col-sm-12" style="margin-top:30px;text-align:center;"> 
	 <div class = "form-group" >
   <input type = "file" id = "inputfile" name="dosya"  style="text-align:center;">
   </div>
   
   </div>
	 </div>
	 
     <div class="row">
    
    <div  class="col-sm-6" style="text-align:center;"><button type="submit" class="btn btn-default">Gönder</button></div>
     <div  class="col-sm-6"><button type="submit" class="btn btn-default"><a href="sisteme_giris.php">Çıkış</a></button></div>
	 
</div>
  </form>
 <div  class="col-sm-4"></div>
 </div>

 </div>
 </div>
 </div>
 </div>
<body>
</html>