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
<section class="w-section mobile-wrapper"> 
<div class="page-content" id="main-stack"> 
<div class="w-nav navbar" data-collapse="all" data-animation="over-left" data-duration="400" data-contain="1" data-easing="ease-out-quint" data-no-scroll="1"> 
<div class="w-container"> 
<div class="wrapper-mask" data-ix="menu-mask"></div>
<div class="navbar-title">SIGNUP / FORM REGISTRASI</div> 
</div>
</div>
<div class="body padding">
<div class="w-form">
<form method="POST" action="operation_signup.php" autocomplete="off" onSubmit="showLoading();"> 
<div class="separator-button-input"></div>

<div> 
<label class="label-form" for="node-10">NAMA LENGKAP</label> 
<div class="separator-fields"></div>
<input class="w-input input-form" type="text" name="nama" data-name="nama" required="required" placeholder="Nama Lengkap"> 
<div class="separator-fields"></div>
</div>


<div> 
<label class="label-form" for="node-10">EMAIL</label> 
<div class="separator-fields"></div>
<input class="w-input input-form" type="email" name="email" data-name="email" required="required" placeholder="Alamat Email"> 
<div class="separator-fields"></div>
</div>


<div> 
<label class="label-form" for="node-10">NO TLPN / HP</label> 
<div class="separator-fields"></div>
<input class="w-input input-form" type="tel" name="no_tlpn" data-name="no_tlpn" required="required" placeholder="No telphon/hp">  
<div class="separator-fields"></div>
</div>


<div> 
<label class="label-form" for="node-10">PERUSAHAAN</label> 
<div class="separator-fields"></div>
<div class="select-wrapper">
<select name="id_optional_yg_terlibat" class="select" required> 
<option value="">Pilih</option>
<?php include 'koneksi.php';
 $hasil_db = mysql_query("SELECT * FROM optional_yg_terlibat where id_jenis_ygterlibat = '3'");

 while ($data = mysql_fetch_array($hasil_db))
 {
 ?>
        <option value="<?php echo $data['id_optional_yg_terlibat']; ?>"><?php echo $data['optional_jenis_ygterlibat']; ?></option>
<?php
}
?>
</select>
<span class="select-icon entypo-arrow-combo"></span>
</div>
<div class="separator-fields"></div>
</div>


<div> 
<label class="label-form" for="node-10">USERNAME</label> 
<div class="separator-fields"></div>
<input class="w-input input-form" type="text" name="username" data-name="username" required="required" placeholder="Username">
<div class="separator-fields"></div>
</div>

<div> 
<label class="label-form" for="node-10">PASSWORD</label> 
<div class="separator-fields"></div>
<input class="w-input input-form" type="text" name="password" data-name="password" required="required" placeholder="Password"> 
<div class="separator-fields"></div>
</div>

<div> 
<label class="label-form" for="node-10">BANDARA</label> 
<div class="separator-fields"></div>
<div class="select-wrapper">
<select name="kode_bandara" class="select" required> 
<option value="">Pilih</option>
<?php include 'koneksi.php';
 $hasil_dbb = mysql_query("SELECT * FROM bandara");

 while ($datab = mysql_fetch_array($hasil_dbb))
 {
 ?>
        <option value="<?php echo $datab['kode_bandara']; ?>"><?php echo $datab['kode_bandara']; ?> (<?php echo $datab['bandara']; ?>)</option>
<?php
}
?>
</select>
</div>
<div class="separator-fields"></div>
</div>

<div class="separator-fields"></div>
<input class="w-button action-button" name="submit" type="submit" value="SUBMIT" data-wait="Please wait..."> 
<div class="separator-button"></div>
<a class="dark" href="login.php">Apakah Anda Sudah Memiliki Akun?? <strong class="w-button">Login</strong></a> 
<a class="dark" href="tel:0247608735"><strong>Help ?</strong></a>
</form>
</div>
</div>
</div>
</div>
</section> 
<?php include "metabottom.php"; ?>
</body>
</html>