<?php
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password])){
include "login.php";
	}
	else
	{
	include"conf_expired_session.php";
	?>
<?php 
include('koneksi.php'); 
$kode_bandara = $_SESSION['kode_bandara'];
?>
<html>
<head>
<?php
if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) ) {
    ob_start( "ob_gzhandler" );
}
else {
    ob_start();
}
?> 
<?php include "metaheader.php"; ?>
</head>
<body>
<?php include('account_view.php'); ?> 
        <div class="w-container">
          <div class="wrapper-mask" data-ix="menu-mask"></div>
          <div class="navbar-title">SRS SAFETY REPORTING SYSTEM</div>
        </div>
      <div class="body">
        <div class="home-content">
          <div class="text-new grey">
<img src="images/logo-ap1-new.png">
<table width="100%" border="0" align="center">
<tr align="center">
    <td>
<a class="dark" href="#"><font size="-1" color="#666666"><?php echo"$bandara ($kode_bandara)"; ?></font></a>
</td>
  </tr>
  <tr align="center">
    <td><a class="dark" href="#"><font size="-3" color="#999999"><?php echo"Welcome $nama"; ?></font></a> 
</td>
</tr>

</table>

<div class="separator-fields"></div>
<div class="separator-fields"></div>
<a class="w-button action-button" href="crud_hazard.php"><center>Hazard Report</center></a>
<div class="separator-fields"></div>
<a class="w-button action-button" href="crud_event.php"><center>Event Report</center></a>
<div class="separator-fields"></div>
<a href="logout.php">Logout</a>

		</div>
</div>
</div>
<?php include "metabottom.php"; ?>
</body>
</html>
<?php
}
?>