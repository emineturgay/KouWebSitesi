
 <!DOCTYPE html>
<html lang="en">

 <body  "background:gray;">
 
  
 <?php   if(isset($_POST["employee_id"])) { ?>
      <?php
	   
      $connect = mysqli_connect("localhost", "root", "", "bilgiler");
	  mysqli_query($connect,"SET NAMES utf8");
mysqli_query($connect,"SET CHARACTER SET utf8");
mysqli_query($connect,"SET COLLATION_CONNECTION='utf8_general_ci'");
     $metin=$_POST["employee_id"];
	 $metin = explode('.',$metin);
	 $tur=$metin[0];
	 $id=$metin[1];
      if(strcmp($tur,"duy")==0){$query = "SELECT * FROM duyuru  WHERE id= '$id'"; }
	  else  if(strcmp($tur,"etk")==0){$query = "SELECT * FROM etkinlik  WHERE id= '$id'"; }

 //ajax ile donen  id degerimin hangi tabloya ait  olduğunu  id me vermis oldudum isim sayesinde biliyorum  $tur.$id   metni parçalayıp  ona göre id  numaramı ve hangi tabloma ait olduğunu
 //kolaylıkla  buluyorum
      $result = mysqli_query($connect, $query);  
	  ?>
	        <div >  
		   <?php  while($row = mysqli_fetch_array($result))  {?>
		           <div  class="row">
				    <div  class="col-sm-12" style="background:green;color:white;">
			       <h3><?php if(!empty($row["mesaj_baslik"] )) { 
					echo ucwords($row["mesaj_baslik"]);
					  } ?></h3>
					  </div>
					  <div  class="col-sm-12">
			       <p><?php if(!empty($row["mesaj_icerik"] )) { 
					   echo ucwords($row["mesaj_icerik"]);
					  } ?></p>
					  </div>
					 
                         <div  class="col-sm-12">
                         <p >
						  <?php if(!is_null($row["dosya_yol"] )) { ?>
			       <div style="color:gray;">EK:<a style="color:gray;" href="  <?php echo $row["dosya_yol"] ?>">indir</a></div>
			       <?php }  ?>
						 </p>
                     </div>
                       				 
					 
               
                
             
		   <?php } ?>
		   </div>
	
        <?php }  ?>
	  
 </body>
 </html>