<html>
<head> 
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
            <?php
			include "koneksi.php";
			$sqlvv=mysql_query("SELECT * FROM message_center WHERE lokasi_message = 'home04'");
			$rvv=mysql_fetch_array($sqlvv);
			$body_message = $rvv['body_message'];
			$message = $rvv['message'];
			?>
			<font color="#FF0000"> <?php echo "$message"; ?> </font>
			<div class="separator-fields"></div>
            <p class="description-new larger">
			<?php echo "$body_message"; ?>
			</p>
			<div class="separator-button"></div><a class="w-button action-button" href="signup.php">Coba Daftar Lagi</a>
            <div class="separator-fields"></div>
			<div class="separator-button"></div><a class="w-button action-button" href="login.php">Login</a>
            <div class="separator-fields"></div>
			<div class="separator-button"></div><a class="w-button action-button" href="#">Lupa Password</a>
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