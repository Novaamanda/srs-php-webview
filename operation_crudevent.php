<?php
ini_set("memory_limit","256M");
// Turn off all error reporting
error_reporting(0);
include "koneksi.php";
$jumMhs = $_POST['n'];
$jumMhs2 = $_POST['n2'];
$foto_videox = $_FILES['image']['name'];
$foto_videox1 = $_FILES['image1']['name'];
$tipe_file = $_FILES['image']['type'];
$tipe_file1 = $_FILES['image1']['type'];
$ukuran_file = $_FILES['image']['size'];
$ukuran_file1 = $_FILES['image1']['size'];
$id_user   = $_POST['id_user'];
$cookievent = $_POST['cookiesevent'];
$kerugian   = $_POST['kerugian'];
$kode_bandara   = $_POST['kode_bandara'];
$lat= $_POST['latitude'];
$long= $_POST['longitude'];
$banyak_kerugian	= count($kerugian);
if ($_POST['submit'] == 'SUBMIT') // 1. if 1 --> Jika klik submit
{
	if($foto_videox && $foto_videox1) // 2. if 2 --> Jika Ada Photo 2 Foto
	{
		include "image1_image2_event.php";
	}
	else if($foto_videox) //3. if 3 --> Jika hanya ada foto 1
	{
		include "image1_event.php";
	}
	else if($foto_videox1)
	{
		include "image2_event.php";
	}
	// end if 2
		else
		{
			$query2 = "insert into event_report values('$cookievent','$id_user','$_POST[id_jeniskejadian]', '$_POST[deskripsi]','','',now(),'$lat', '$long','$kode_bandara')";
						
								$sql2 = mysql_query($query2);
										if($sql2) // 6. if 6 --> Jika sql running
										{
										
												for($i=1; $i<=$jumMhs; $i++) // perulangan untuk array yang terlibat dan dropdown id_optional_ygterlibat
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
										
										else 
										{
											?>
											<script>
											 window.location='crud_event.php?des=$_POST[deskripsi]';
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
		window.location='crud_event.php?des=$_POST[deskripsi]';
		</script>	
		<?php
	}		
?>		 