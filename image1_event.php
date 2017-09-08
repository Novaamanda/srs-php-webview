<?php
	$maxsize=2097152000000;
    $format=array('image/jpeg','image/jpg','image/gif','image/png');
    if($_FILES['image']['size']>=$maxsize)
	{
		echo "<script>alert('File Size too large'); location.href='crud_event.php?des=$_POST[deskripsi]';</script>";
    }
    elseif($_FILES['image']['size']==0)
	{
		echo "<script>alert('Invalid File'); location.href='crud_event.php?des=$_POST[deskripsi]';</script>";
    }
    elseif(!in_array($_FILES['image']['type'],$format))
	{
        echo "<script>alert('Format Not Supported.Only .jpeg .jpg .png .gif files are accepted'); location.href='crud_event.php?des=$_POST[deskripsi]';</script>";
     }

        elseif($_FILES['image']['size']<=$maxsize && in_array($_FILES['image']['type'],$format))
		{
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
									 
										if ($image) 
										{
										
											$filename = stripslashes($_FILES['image']['name']);
										
											$extension = getExtension($filename);
											$extension = strtolower($extension);
											
											
									 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
											{
											
												$change='<div class="msgdiv">Unknown Image extension </div> ';
												$errors=1;
											}
											else
											{
									
									 $size=filesize($_FILES['image']['tmp_name']);
									
									if($extension=="jpg" || $extension=="jpeg" )
									{
									$uploadedfile = $_FILES['image']['tmp_name'];
									$src = imagecreatefromjpeg($uploadedfile);
									
									}
									else if($extension=="png")
									{
									$uploadedfile = $_FILES['image']['tmp_name'];
									$src = imagecreatefrompng($uploadedfile);
									
									}
									else if($extension=="gif")
									{
									$uploadedfile = $_FILES['image']['tmp_name'];
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
									
									$filename = "../administrator-srs/SHE/gambarevent/". $_FILES['image']['name'];
									
									imagejpeg($tmp,$filename,100);
									
									imagedestroy($src);
									imagedestroy($tmp);
									}}
									
									}

						$query = "insert into event_report values('$cookievent','$id_user','$_POST[id_jeniskejadian]', '$_POST[deskripsi]','$foto_videox','',now(),'$lat', '$long','$kode_bandara')";
								$sql = mysql_query($query);
										if($sql) // 5. if 5 --> Jika sql running
										{
										
												for($i=1; $i<=$jumMhs; $i++)
												 {
													 $ygterlibat = $_POST['ygterlibat'.$i];
													 $id_optional_yg_terlibatkan = $_POST['id_optional_yg_terlibatkan'.$i];
													 if($ygterlibat != '' and $id_optional_yg_terlibatkan != 0)
													 {
													 mysql_query("insert into tabel_ygterlibat values('$cookievent','$ygterlibat','$id_optional_yg_terlibatkan')");
													 }
													else {}
												}
			 
												for($k=1; $k<=$jumMhs2; $k++) // perulangan untuk array kerugian dan dropdown keterangan kerugian
												 {
												 	$kerugian = $_POST['kerugian'.$k];
													$keterangan_kerugian = $_POST['keterangan_kerugian'.$k];
													if($kerugian != '')
													 {
													mysql_query("insert into tabel_kerugian values('$cookievent','$kerugian','$keterangan_kerugian')");
													 }
													 else {}
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
											 window.location='crud_event.php?des=$_POST[deskripsi]';
											</script>	
											<?php
										}						
							}