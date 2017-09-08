<?php
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password])){
echo "<script>alert('Silahkan Melakukan Login Terlebih Dahulu'); location.href='login.php?page=notif';</script>";
	}
	else
	{
	include"conf_expired_session.php";
	?>
<?php include('koneksi.php'); ?>
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
<section class="w-section mobile-wrapper">
    <div class="page-content" id="main-stack">
      <div class="w-nav navbar" data-collapse="all" data-animation="over-left" data-duration="400" data-contain="1" data-easing="ease-out-quint" data-no-scroll="1">
        <div class="w-container">
          <div class="wrapper-mask" data-ix="menu-mask"></div>
          <div class="navbar-title"><?php echo"$nama"; ?></div>
        </div>
      </div>
      <div class="body">
        <div class="home-content">
          <div class="text-new grey">
<table width="100%" border="0" align="center">
  <tr align="center">
    <td>
	<a class="dark" href="#">You Dont Have Notification</a>
	
</td>
</tr>
</table>

<div class="separator-fields"></div>
<div class="separator-fields"></div>
</div>
          </div>
        </div>
      </div>
    </div>

</section> 
<?php include "metabottom.php"; ?>
</body>
</html>
<?php
}
?>