<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="menu1.css">
</head>

<body  style="background:black;">

<?php


$baglan=@mysql_connect("localhost","root","");



if($baglan){
$db_sec=@mysql_select_db("bilgiler",$baglan);

 if($db_sec){
	 if(isset($_POST["kullanici_adi"])){
		  $kullanici_adi=$_POST['kullanici_adi'];
        $esifre=$_POST['esifre'];
		$ysifre=$_POST['ysifre'];
		$ysifre2=$_POST['ysifre2'];
		 if(!empty($kullanici_adi)){
			 $veri=@mysql_query("SELECT *  FROM personel  WHERE  kullanici_adi='$kullanici_adi' ",$baglan); 
		     $db_sifre=@mysql_result($veri,0,"sifre");//sifreyi cektim
			 $db_kullanici_adi=@mysql_result($veri,0,"kullanici_adi");//sifreyi cektim

			 if(strcmp($db_kullanici_adi,$kullanici_adi)==0){
				 if(strcmp($db_sifre,$esifre)==0){
						  if(strcmp($ysifre,$ysifre2)==0 ){
							  if(strcmp($ysifre,"")!=0){
						 $sql=mysql_query("UPDATE personel SET sifre='$ysifre' WHERE sifre='$esifre' AND kullanici_adi='$kullanici_adi'");
					 if($sql){echo '<div class="alert alert-success"style="margin-top:40px;text-align:center;"><strong>Başarıyla Değiştirildi..</strong></div>';}
							  }
							  else{echo '<div class="alert alert-warning"style="margin-top:40px;text-align:center;"><strong>Şifre Kısmı Boş Bırakılamaz</strong></div>';}
						  }
					    else{echo '<div class="alert alert-warning"style="margin-top:40px;text-align:center;"><strong>Yeni Şifrelerinizi Aynı Giriniz..</strong></div>';}
					 
				 }
				 else{echo '<div class="alert alert-danger"style="margin-top:40px;text-align:center;"><strong>Eski Şifrenizi Yanlış Girdiniz.Tekrar Deneyin..</strong></div>';}
			 }
		    else{echo' <div class="alert alert-warning"style="margin-top:40px;text-align:center;"><strong>Girdiğiniz Kullanıcı İsmi  Sistemde Kayıtlı Değil</strong></div>';}
		 }
		 else{	   		 echo' <div class="alert alert-warning"style="margin-top:40px;text-align:center;"><strong>Alanlar Boş Bırakılamaz</strong></div>'; }
	 }
    else{ echo "";}
 
 
}
else {echo "veritabnını seçilemedi";}
}
else{echo "veritabanı baglanılamadı";}

?>


<div class="container"   style="margin-top:100px;">
    <div class="panel " style="background:black;">
      <div class="panel-body" style="border:2px solid black;" >
     <div id="cerceve_duzenle" >
	 
	 <div class="row" >
	 <div class="col-lg-2" ></div>
	 <div class="col-lg-3" ><img class="img-responsive"  src="user3.png"  style="height:120px;"></div>
	 <div class="col-lg-7" ><h2 style="margin-top:40px;margin-left:-20px;">ŞİFRE DEĞİŞTİRME</h2></div>
	 <div class="col-lg-12"><hr  style="border-color:gray;"></hr></div>
	 </div>
	 
	 
	  <div class="row" style="margin-top:90px;">
	  
    <div class="col-lg-3"><a  href="sisteme_giris.php"><img  class="img-responsive"  src="saydam.png" style="height:100px;"></a></div>
     <div class="col-lg-6"><!---->
	      
		  
		  
		   <form  style="padding:20px;margin-bottom:40px;"  method="post" >
     
    <div class="form-group">
     <div  class="row" >
      <div  class="col-sm-2"><label for="email">Kullanıcı Adı:</label></div>
     <div class="col-sm-8">
      <input type="text" class="form-control" name="kullanici_adi"  placeholder="Kullanıcı Adınızı Giriniz"></div>
      <div  class="col-sm-2"></div>
    </div>
   </div>
   
     
    <div class="form-group">
   <div class="row">
      <div class="col-sm-2"><label for="pwd">Eski Şifre:</label></div>
      <div class="col-sm-8"> <input type="password" class="form-control"name="esifre" placeholder="Eski Şifrenizi Giriniz"></div>
      <div  class="col-sm-2"></div>
    </div>
</div>

 <div class="form-group">
   <div class="row">
      <div class="col-sm-2"><label for="pwd">Yeni Şifre:</label></div>
      <div class="col-sm-8"> <input type="password" class="form-control" name="ysifre" placeholder="Yeni Şifrenizi Giriniz"></div>
      <div  class="col-sm-2"></div>
    </div>
</div>
 <div class="form-group">
   <div class="row">
      <div class="col-sm-2"><label for="pwd">Yeni Şifre (2):</label></div>
      <div class="col-sm-8"> <input type="password" class="form-control" name="ysifre2" placeholder="Yeni Şifrenizi Tekrar Giriniz"></div>
      <div  class="col-sm-2"></div>
    </div>
</div>

<div class="row">
   <div  class="col-sm-3"></div>
    <div  class="col-sm-2"><button type="submit" name="gonder"  value="gonder" class="btn btn-default">Onayla</button></div>
    <div  class="col-sm-4"><button type="reset" class="btn btn-default">Temizle</button></div>
   <div  class="col-sm-3"></div>
    
  </form>
	 
	 
	 </div>
	
	 
  </div>
	 
	 
 <div class="col-lg-3" ></div>
	 
	 
	 
     </div>
	 </div>
    </div>
</div>

  
</div>
</div>


</body>