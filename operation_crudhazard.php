<?php
ini_set("memory_limit","256M");
// Turn off all error reporting
error_reporting(0);
include "koneksi.php";
$foto_videox = $_FILES['image']['name'];
$foto_videox1 = $_FILES['image1']['name'];
$tipe_file = $_FILES['image']['type'];
$tipe_file1 = $_FILES['image1']['type'];
$ukuran_file = $_FILES['image']['size'];
$ukuran_file1 = $_FILES['image1']['size'];
$cookihazard = $_POST['cookieshazard'];
$typehazard   = $_POST['typehazard'];
$banyak_typehazard	= count($typehazard);
$penyebabhazard   = $_POST['penyebabhazard'];
$kode_bandara   = $_POST['kode_bandara'];
$id_user   = $_POST['id_user'];
$lat= $_POST['latitude'];
$long= $_POST['longitude'];
$banyak_penyebabhazard	= count($penyebabhazard);
	
if ($_POST['submit'] == 'SUBMIT') // 1. if 1 --> Jika klik submit
{
	if($foto_videox && $foto_videox1) // 2. if 2 --> Jika Ada Photo 2 Foto
	{
		include "image1_image2.php";
	}
	else if($foto_videox) //3. if 3 --> Jika hanya ada foto 1
	{
		include "image1.php";
	}
	else if($foto_videox1)
	{
		include "image2.php";
	}
	
	// end if 2
		else if(!$foto_videox && !$foto_videox1)
		{
			$query = "insert into hazard_report values('$cookihazard','$id_user','$_POST[deskripsi]','','',now(),'$lat','$long','$kode_bandara')";
						
								$sql = mysql_query($query);
										if($sql) 
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
										
										else 
										{
											?>
											<script>
											 window.location='crud_hazard.php?des=$_POST[deskripsi]';
											</script>	
											<?php
										}
		}
	
}
// else if 1
	else
	 {
		?>
		<script>
		window.location='crud_hazard.php?des=$_POST[deskripsi]';
		</script>	
		<?php
	}		
?>		 