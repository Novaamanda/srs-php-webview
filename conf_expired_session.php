<?php
//waktu sekarang GMT+7
	$waktu=time()+25200;
	//waktu timeout (detik)
	$expired=INF;
	$sekarangnih = $_SESSION['timeout'];
	if($waktu < $_SESSION['timeout'])
	{
	//hapus sesi timeout yang lama ,buat sesi timeout yang baru
	unset($_SESSION['timeout']);
	$_SESSION['timeout']=$waktu+$expired;
	//disini konten untuk user atau admin yang berhasil login
	}
	else{
	session_destroy();
	}

?>