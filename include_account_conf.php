<html>
<head> 
<?php include "metaheader.php"; ?>
<style>
.select-wrapper {
    background-color: #fff;
    border-bottom: 1px solid #e6e6e6;
    color: #666;
    cursor: pointer;
    float: left;
    overflow: hidden;
    position: relative;
    width: 100%;
	margin-bottom:20px;
	
}

.select {
    -webkit-appearance: none;
    background-color: #fff;
    border-width: 0;
    box-sizing: border-box;
    cursor: pointer;
    float: left;
    font-size: 0.8em;
    line-height: 2em;
    padding: 0.1em 0.1em;
    width: 100%;
}

.select-icon {
    position: absolute;
    top: .8em;
    right: 1em;
}
</style>
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
Data Sedang di proses, Mohon Tunggu...
</div>
<div id='loadingover' style='display: none;'></div>
<?php include 'koneksi.php'; ?> 
<?php include('account_view.php'); ?> 
<section class="w-section mobile-wrapper">
    <div class="page-content" id="main-stack">
      <div class="w-nav navbar" data-collapse="all" data-animation="over-left" data-duration="400" data-contain="1" data-easing="ease-out-quint" data-no-scroll="1">
        <div class="w-container">
          <div class="wrapper-mask" data-ix="menu-mask"></div>
          <div class="navbar-title">Edit Profile</div>
        </div>
      </div>
      <div class="body">
        <div class="home-content">
          <div class="text-new grey">
<form method="POST" action="operation_account_conf.php" autocomplete="off" onSubmit="showLoading();"> 
<input class="w-input input-form" type="hidden" name="id_userx" data-name="id_userx" value="<?php echo"$id_user"; ?>">
<div> 
<label class="label-form" for="node-10">USERNAME</label> 
<div class="separator-fields"></div>
<input class="w-input input-form" type="text" name="username" data-name="username" required="required" placeholder="Username" value="<?php echo"$username"; ?>">
<div class="separator-fields"></div>
</div>

<div> 
<label class="label-form" for="node-10">PASSWORD</label> 
<div class="separator-fields"></div>
<input class="w-input input-form" type="password" name="password" data-name="password" required="required" placeholder="Password" value="<?php echo"$pass"; ?>"> 
<div class="separator-fields"></div>
</div>
<input class="w-button action-button" name="submit" type="submit" value="SUBMIT" data-wait="Please wait..."> 
<div class="separator-button"></div>
</form>
 </div>
</div>
</div>
</div>
</section> 
<?php include "metabottom.php"; ?>
</body>
</html>