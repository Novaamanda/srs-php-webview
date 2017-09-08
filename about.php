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
<section class="w-section mobile-wrapper">
    <div class="page-content" id="main-stack">
      <div class="w-nav navbar" data-collapse="all" data-animation="over-left" data-duration="400" data-contain="1" data-easing="ease-out-quint" data-no-scroll="1">
        <div class="w-container">
          <div class="wrapper-mask" data-ix="menu-mask"></div>
          <div class="navbar-title">SRS SAFETY REPORTING SYSTEM</div>
        </div>
      </div>
      <div class="body">
        <div class="home-content">
          <div class="text-new grey">
<div class="logo-login"></div>
<center>Version 1.0</center>
<hr>
<table width="100%" border="0" align="center">
  <tr align="center">
    <td><a class="dark" href="#">Developed by : <br>PT. Angkasa Pura | Airport</a> 
</td>
</tr>
<tr align="center">
    <td>
<hr><a class="dark" href="#">2016 | Team IT | Bandar Udara Internasional Ahmad Yani Semarang</a>
<br>
<a class="dark" href="#">Email : it.srg@ap1.co.id</a>
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