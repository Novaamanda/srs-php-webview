<?php
ini_set("memory_limit","256M");
// Turn off all error reporting
//error_reporting(0);
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
	
	//$tmp = $typehazard['typehazard'];
	$tes = json_decode($typehazard);
	$tes2 = json_decode($penyebabhazard);
	//$tes = json_decode($tmp);
	//$tes2 = json_decode($tmp2);
	
	
	
	//$string1 = '{"typehazard":["1","4"]}';
	//$tmpObk = json_decode($string1);
	//$tmpA = new stdClass();
	//$tmpA->typehazard = $tes->typehazard;
	//echo $tmpA->typehazard[0];
	
	
	$query = "insert into hazard_report values('$cookihazard','$id_user','$_POST[deskripsi]','','',now(),'$lat','$long','$kode_bandara')";			
	
	
	$sql = mysql_query($query);
	if($sql) 
	{
		for($i=0; $i<$banyak_typehazard; $i++)
		{
			mysql_query("insert into tabel_tipehazard values('$cookihazard','$tes->typehazard[$i]')");
		}

		for($k=0; $k<$banyak_penyebabhazard; $k++)
		{
			mysql_query("insert into tabel_penyebabhazard values('$cookihazard','$tes2->penyebabhazard[$k]')");
		}

		$obj->pesan = "ok " . $tes->typehazard[0];
		$obj->pesan2 = "ok " . $tes;
		$obj->pesan3 = "ok " . $typehazard;
		echo json_encode($obj);	
	}else{
		$obj->pesan = "no";
		echo json_encode($obj);
	}
?>		 

