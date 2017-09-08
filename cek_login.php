<?php
// Cek Login dan validasi (mengambil semua session yang akan didaftarkan)
include "koneksi.php";
$pass=base64_encode($_POST[password]);
$user=$_POST[username];
$sql=mysql_query("SELECT * FROM user WHERE username='$user' AND password='$pass'");
$level=mysql_num_rows($sql);
$r=mysql_fetch_array($sql);
			if ($r)
			{
				$status = $r[status];
				if($status == 1) // jika status 1 maka statusnya adalah verified
					{
						session_start();
						//waktu sekarang GMT+7
						$waktu=time()+25200;
						//waktu timeout (detik)
						$expired=INF;
						$_SESSION[id_user] = $r[id_user];
						$_SESSION[nama] = $r[nama];
						$_SESSION[email] = $r[email];
						$_SESSION[no_tlpn]= $r[no_tlpn];
						$_SESSION[id_optional_yg_terlibat] = $r[id_optional_yg_terlibat];
						$_SESSION[username]= $r[username];
						$_SESSION[password] = $r[password];
						$_SESSION[kode_bandara]= $r[kode_bandara];
						$_SESSION[level] = $r[level];
						$_SESSION[status]= $r[status];
						//membuat sesi timeout
						$_SESSION['timeout']=$waktu+$expired;
						$access=$_POST['access'];
						if($access=='index')
						{
						header('location:index.php'); 
						}
						else
						{
								if($access == 'hazard')
								{
								header('location:crud_hazard.php');
								}
								if($access == 'event')
								{
								header('location:crud_event.php');
								}
								if($access == 'notif')
								{
								header('location:notification.php');
								}
						}
						
						
					}
					elseif($status == 0) // jika status 0 maka statusnya adalah unverified
					{
					header('location:home.php');
					}
				}
				
				else // Jika tidak semua
				{
				header('location:index.php');
				}	
?>
