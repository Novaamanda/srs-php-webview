<html>
<head> 
<?php include "metaheader.php"; ?>
</head>
<body> 
<script type="text/javascript">
  function showLoading() {
    document.getElementById('loadingmsg').style.display = 'block';
    document.getElementById('loadingover').style.display = 'block';
}
</script>
<style type="text/css">
      #loadingmsg {
      color: black;
      background: #fff; 
      position: fixed;
      z-index: 100;
	  top : 50%;
	  width:100%; /* dimensi lebar */
  text-align:center; /* posisi di tengah secara horizontal */
      }
      #loadingover {
      background: black;
      z-index: 99;
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
      filter: alpha(opacity=80);
      -moz-opacity: 0.8;
      -khtml-opacity: 0.8;
      opacity: 0.8;
    }
</style>
<div id='loadingmsg' style='display: none;' align="center">
SRS SYSTEM Login, Mohon Tunggu...
</div>
<div id='loadingover' style='display: none;'></div> 


        <div class="w-container">
          <div class="wrapper-mask" data-ix="menu-mask"></div>
          <div class="navbar-title">SRS SAFETY REPORTING SYSTEM</div>
        </div>

      <div class="body">
        <div class="home-content">
          <div class="text-new grey">
<img src="images/logo-ap1-new.png">
<div class="separator-button-input"></div>
<?php $log = $_GET['log']; ?>
<form method="POST" action="cek_login.php" autocomplete="off" onSubmit="showLoading();"> 
<div> 
<input type="hidden" name="access" data-name="access" value="<?php echo"$log"; ?>"> 
<label class="label-form" for="email-field">USERNAME</label> 
<input class="w-input input-form" type="name" name="username" data-name="username" required="required" placeholder="Username"> 
<div class="separator-fields"></div>
</div>
<div> 
<label class="label-form" for="email">PASSWORD</label> 
<div class="block-input-combined"> 
<input class="w-input input-form left" type="password" name="password" data-name="password" required="required" placeholder="Password">
<!-- <a class="right-input-link" href="#">Lupa Password</a> -->
</div>
<div class="separator-button-input"></div>
</div>
<input class="w-button action-button" type="submit" value="Sign In" data-wait="Please wait..."> 
<div class="separator-button"></div>
<a class="dark" href="signup.php" data-load="1">Apakah Anda Sudah Memiliki Akun? <strong class="w-button">Daftar</strong></a> 
<a class="dark" href="tel:0247608735"><strong>Help ?</strong></a>
</form> 

		</div>
</div>
</div>
<?php include "metabottom.php"; ?>
</body>
</html>