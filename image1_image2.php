<?php
	$maxsize=2097152000000;
    $format=array('image/jpeg','image/jpg','image/gif');
    if($_FILES['image']['size']>=$maxsize){
		echo "<script>alert('File Size too large'); location.href='crud_hazard.php?des=$_POST[deskripsi]';</script>";
    }
	elseif($_FILES['image1']['size']>=$maxsize){
		echo "<script>alert('File Size too large'); location.href='crud_hazard.php?des=$_POST[deskripsi]';</script>";
    }
    elseif($_FILES['image']['size']==0){
		echo "<script>alert('Invalid File'); location.href='crud_hazard.php?des=$_POST[deskripsi]';</script>";
    }
	elseif($_FILES['image1']['size']==0){
		echo "<script>alert('Invalid File'); location.href='crud_hazard.php?des=$_POST[deskripsi]';</script>";
    }
    elseif(!in_array($_FILES['image']['type'],$format)){
        echo "<script>alert('FFormat Not Supported.Only .jpeg .jpg .png .gif files are accepted'); location.href='crud_hazard.php?des=$_POST[deskripsi]';</script>";
        }
	elseif(!in_array($_FILES['image1']['type'],$format)){
        echo "<script>alert('FFormat Not Supported.Only .jpeg .jpg .png .gif files are accepted'); location.href='crud_hazard.php?des=$_POST[deskripsi]';</script>";
        }
        elseif($_FILES['image']['size'] && $_FILES['image1']['size1']<=$maxsize && in_array($_FILES['image']['type'] && $_FILES['image1']['type'],$format))
		{
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
										$image =$_FILES["image"]["name"];
										$uploadedfile = $_FILES['image']['tmp_name'];
										
										$image1 =$_FILES["image1"]["name"];
										$uploadedfile1 = $_FILES['image1']['tmp_name'];
										 
									 
										if ($image && $image1) 
										{
										
											$filename = stripslashes($_FILES['image']['name']);
											$extension = getExtension($filename);
											$extension = strtolower($extension);
											
											$filename1 = stripslashes($_FILES['image1']['name']);
											$extension1 = getExtension($filename1);
											$extension1 = strtolower($extension1);
											
									 if ((($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) && (($extension1 != "jpg") && ($extension1 != "jpeg") && ($extension1 != "png") && ($extension1 != "gif"))) 
											{
											
												$change='<div class="msgdiv">Unknown Image extension </div> ';
												$errors=1;
											}
											else
											{
									
									$size=filesize($_FILES['image']['tmp_name']);
									$size1=filesize($_FILES['image1']['tmp_name']);
									if(($extension=="jpg" || $extension=="jpeg") && ($extension1=="jpg" || $extension1=="jpeg"))
									{
									$uploadedfile = $_FILES['image']['tmp_name'];
									$uploadedfile1 = $_FILES['image1']['tmp_name'];
									$src = imagecreatefromjpeg($uploadedfile);
									$src1 = imagecreatefromjpeg($uploadedfile1);
									
									}
									else if($extension=="png" && $extension=="png")
									{
									$uploadedfile = $_FILES['image']['tmp_name'];
									$uploadedfile1 = $_FILES['image1']['tmp_name'];
									$src = imagecreatefrompng($uploadedfile);
									$src1 = imagecreatefrompng($uploadedfile1);
									
									}
									else if($extension=="gif" && $extension1=="gif")
									{
									$uploadedfile = $_FILES['image']['tmp_name'];
									$uploadedfile1 = $_FILES['image1']['tmp_name'];
									$src = imagecreatefromgif($uploadedfile);
									$src1 = imagecreatefromgif($uploadedfile1);
									
									}
									else 
									{
									$src = imagecreatefromgif($uploadedfile);
									$src1 = imagecreatefromgif($uploadedfile1);
									}
									
									echo $scr;
									echo $scr1;
									
									list($width,$height)=getimagesize($uploadedfile);
									list($width,$height)=getimagesize($uploadedfile1);
									
									
									$newwidth=400;
									$newheight=($height/$width)*$newwidth;
									$tmp=imagecreatetruecolor($newwidth,$newheight);
									$tmp1=imagecreatetruecolor($newwidth,$newheight);
									
									
									imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
									imagecopyresampled($tmp1,$src1,0,0,0,0,$newwidth,$newheight,$width,$height);
									
									$filename = "../administrator-srs/SHE/gambarhazard/". $_FILES['image']['name'];
									$filename1 = "../administrator-srs/SHE/gambarhazard/". $_FILES['image1']['name'];
									
									imagejpeg($tmp,$filename,100);
									imagejpeg($tmp1,$filename1,100);
									
									imagedestroy($src);
									imagedestroy($src1);
									imagedestroy($tmp);
									imagedestroy($tmp1);
									}}
									
									}
						$query = "insert into hazard_report values('$cookihazard','$id_user','$_POST[deskripsi]','$foto_videox','$foto_videox1',now(),'$lat','$long','$kode_bandara')";
						
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
       
	