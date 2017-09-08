<?php
$maxsize=2097152000000;
    $format=array('image/jpeg','image/jpg','image/gif');
    if($_FILES['image1']['size']>=$maxsize){
		echo "<script>alert('File Size too large'); location.href='crud_hazard.php?des=$_POST[deskripsi]';</script>";
    }
    elseif($_FILES['image1']['size']==0){
		echo "<script>alert('Invalid File'); location.href='crud_hazard.php?des=$_POST[deskripsi]';</script>";
    }
    elseif(!in_array($_FILES['image1']['type'],$format)){
        echo "<script>alert('FFormat Not Supported.Only .jpeg .jpg .png .gif files are accepted'); location.href='crud_hazard.php?des=$_POST[deskripsi]';</script>";
        }

        elseif($_FILES['image1']['size']<=$maxsize && in_array($_FILES['image1']['type'],$format)){
            //
									$change="";
									$abc="";
									 function getExtension($str) {
											 $i = strrpos($str,".");
											 if (!$i) { return ""; }
											 $l = strlen($str) - $i;
											 $ext = substr($str,$i+1,$l);
											 return $ext;
									 }
									  
									 if($_SERVER["REQUEST_METHOD"] == "POST")
									 {
										$image =$_FILES["image1"]["name"];
										$uploadedfile = $_FILES['image1']['tmp_name'];
										 
									 
										if ($image) 
										{
										
											$filename = stripslashes($_FILES['image1']['name']);
										
											$extension = getExtension($filename);
											$extension = strtolower($extension);
											
											
									 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
											{
											
												$change='<div class="msgdiv">Unknown Image extension </div> ';
												$errors=1;
											}
											else
											{
									
									 $size=filesize($_FILES['image1']['tmp_name']);
									
									if($extension=="jpg" || $extension=="jpeg" )
									{
									$uploadedfile = $_FILES['image1']['tmp_name'];
									$src = imagecreatefromjpeg($uploadedfile);
									
									}
									else if($extension=="png")
									{
									$uploadedfile = $_FILES['image1']['tmp_name'];
									$src = imagecreatefrompng($uploadedfile);
									
									}
									else if($extension=="gif")
									{
									$uploadedfile = $_FILES['image1']['tmp_name'];
									$src = imagecreatefromgif($uploadedfile);
									
									}
									else 
									{
									$src = imagecreatefromgif($uploadedfile);
									}
									
									echo $scr;
									
									list($width,$height)=getimagesize($uploadedfile);
									
									
									$newwidth=400;
									$newheight=($height/$width)*$newwidth;
									$tmp=imagecreatetruecolor($newwidth,$newheight);
									
									
									imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
									
									$filename = "../administrator-srs/SHE/gambarhazard/". $_FILES['image1']['name'];
									
									imagejpeg($tmp,$filename,100);
									
									imagedestroy($src);
									imagedestroy($tmp);
									}}
									
									}
						$query = "insert into hazard_report values('$cookihazard','$id_user','$_POST[deskripsi]','','$foto_videox1',now(),'$lat','$long','$kode_bandara')";
						
								$sql = mysql_query($query);
										if($sql) // 5. if 5 --> Jika sql running
										{
										
												for($i=0; $i<$banyak_typehazard; $i++)
												 {
													mysql_query("insert into tabel_tipehazard values('$cookihazard','$typehazard[$i]')");
												}
			 
													 for($k=0; $k<$banyak_penyebabhazard; $k++)
												{
													mysql_query("insert into tabel_penyebabhazard values('$cookihazard','$penyebabhazard[$k]')");
												}
											 ?>
											 
											 <script>
											 window.location='message_sukses_hazard.php';
											</script>	
											
											<?php
										} 
										
										else // else if 5
										{
											?>
											<script>
											 window.location='crud_hazard.php?des=$_POST[deskripsi]';
											</script>	
											<?php
										}
		//
            }
       
	