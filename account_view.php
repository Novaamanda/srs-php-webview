<?php
// Mengambil Semua nilai di tabel user jika session login ON
include "koneksi.php";
$sqlac=mysql_query("SELECT * FROM user,bandara WHERE id_user = $_SESSION[id_user] and user.kode_bandara = bandara.kode_bandara");
$rac=mysql_fetch_array($sqlac);

if ($rac)
	{
	$id_user = $rac['id_user'];
	$nama = $rac['nama'];
	$email = $rac['email'];
	$no_tlpn = $rac['no_tlpn'];
	$id_optional_yg_terlibat = $rac['id_optional_yg_terlibat'];
	$username = $rac['username'];
	$password = $rac['password'];
	$pass=base64_decode($rac['password']);
	$kode_bandara = $rac['kode_bandara'];
	$bandara = $rac['bandara'];
	$level = $rac['level'];
	$status = $rac['status'];
	}
else{}
?>
