<?php
include "koneksi.php";
$id_userx = $_POST['id_userx'];
//$nama = $_POST['nama'];
//$email   = $_POST['email'];
//$no_tlpn   = $_POST['no_tlpn'];
//$id_optional_yg_terlibat   = $_POST['id_optional_yg_terlibat'];
//$kode_bandara   = $_POST['kode_bandara'];

$username   = $_POST['username'];
$password   = base64_encode($_POST['password']);
if ($_POST['submit'] == 'SUBMIT') // 1. if 1 --> Jika klik submit
{
//$queryupdateakun = "UPDATE user SET nama='$nama' ,email='$email' , no_tlpn='$no_tlpn' ,id_optional_yg_terlibat='$id_optional_yg_terlibat' ,username='$username' ,password='$password' ,kode_bandara='$kode_bandara' where id_user = '$id_userx'";
$queryupdateakun = "UPDATE user SET username='$username' ,password='$password' where id_user = '$id_userx'";
$sqlqueryupdateakun = mysql_query($queryupdateakun);
		if($sqlqueryupdateakun) // 2. if 2 --> Jika Alamat Email Sudah ada tidak boleh mendaftar lagi
		{
			?>
			<script>
			window.location='message_sukses_update_akun.php';
			</script>	
			<?php
		}
		
		else // else if 2
		{
						?>
						<script>
						window.location='account_conf.php';
						</script>	
						<?php

		
		}
	}
		
		
						// else if 1
						else
						{
						?>
						<script>
						window.location='account_conf.php';
						</script>	
						<?php
						}
?>		 