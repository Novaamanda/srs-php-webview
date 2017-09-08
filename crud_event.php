<?php
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password])) // Jika Belum Login Maka otomatis redirect ke halamn login
{
echo "<script>alert('Silahkan Melakukan Login Terlebih Dahulu'); location.href='login.php?page=event';</script>";
	}
	else // Jika Sudah LOGIN maka bisa di akses
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
<body onload="getLocation()"> 
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
  function showLoading() {
    document.getElementById('loadingmsg').style.display = 'block';
    document.getElementById('loadingover').style.display = 'block';
}
</script>
<style type="text/css">
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
display:none;
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


#selectx {
display:none;
}

.select-wrapper2 {
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

.select2 {
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

.select2-icon {
    position: absolute;
    top: .8em;
    right: 1em;
}


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
Mengirim Data, Mohon Tunggu...
</div>
<div id='loadingover' style='display: none;'></div>
<section class="w-section mobile-wrapper">
     
        <div class="home-content">
          <div class="text-new grey">
<?php
$length = 20;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$cookie = $randomString;
?> 
<?php include('account_view.php'); ?>
<?php
//ambil nilai variabel error
if (isset($_GET['des']))
{
   $error=$_GET['des'];
}
else
{
   $error="";
}

?>
<form method="post" action="operation_crudevent.php" enctype="multipart/form-data" autocomplete="off" onSubmit="showLoading();"> 
 <input name="cookiesevent" type="hidden" value="<?php echo $cookie ;?>">
<input name="id_user" type="hidden" value="<?php echo $id_user ;?>">

<div> 
<table width="100%" border="0" bgcolor="#F6F6F6">
  <tr>
    <td><font color="#003366">JENIS KEJADIAN</font></td>
  </tr>
</table>
<div class="separator-fields"></div>
<div class="select-wrapper2">
<select name="id_jeniskejadian" class="select2" required> 
<option value="">Pilih</option>
<?php
 $hasil_db = mysql_query("SELECT * FROM jenis_kejadian");

 while ($data = mysql_fetch_array($hasil_db))
 {
 ?>
       <option value="<?php echo $data['id_jeniskejadian']; ?>"><?php echo $data['nama_kejadian']; ?></option>

<?php
}
?>
</select>
<span class="select-icon entypo-arrow-combo"></span>
</div>
<div class="separator-fields"></div>
</div>


<div> 
<table width="100%" border="0" bgcolor="#F6F6F6">
  <tr>
    <td><font color="#003366">YANG TERLIBAT</font></td>
  </tr>
</table>
<div class="separator-fields"></div>
<?php
 $hasil_db = mysql_query("SELECT * FROM yg_terlibat");
$i = 1;
 while ($data = mysql_fetch_array($hasil_db))
 {
 ?> 
<div class="separator-fields"></div>
<div class="select-wrapper">
<input type="checkbox" name="ygterlibat<?php echo"$i"; ?>" id="<?php echo $data['nama_ygterlibat']; ?>" value="<?php echo $data['id_ygterlibat']; ?>"> <?php echo $data['nama_ygterlibat']; ?>
<?php
$ido = $data['id_jenis_ygterlibat'];
?>
<select name="id_optional_yg_terlibatkan<?php echo"$i"; ?>" class="select"> 
<option value="">Pilih <?php echo $data['nama_ygterlibat']; ?></option>
<?php
$hasil_dbw = mysql_query("SELECT * FROM optional_yg_terlibat where id_jenis_ygterlibat = '$ido'");
 while ($dataww = mysql_fetch_array($hasil_dbw))
 {
 ?>
 <option value="<?php echo $dataww['id_optional_yg_terlibat']; ?>"><?php echo $dataww['optional_jenis_ygterlibat']; ?></option>
<?php
}
?>
</select>

<span class="select-icon entypo-arrow-combo"></span>
</div>
<script>
$('[type="checkbox"][name^="ygterlibat"]').change(function(){
  $(this).nextAll('select').first().toggle(this.checked);
});
</script>	
<?php
$i++;
}
$jumMhs = $i-1;
?>
<input type="hidden" name="n" value="<?php echo $jumMhs ?>" />
</div>


	<div> 
<table width="100%" border="0" bgcolor="#F6F6F6">
  <tr>
    <td><font color="#003366">KERUGIAN</font></td>
  </tr>
</table>
 <div class="select-wrapper">
<div class="separator-fields"></div>
<?php
 $hasil_dbu = mysql_query("SELECT * FROM kerugian");
$k = 1;
 while ($datau = mysql_fetch_array($hasil_dbu))
 {
		 if ($datau['textfieldbaru'] == '1')
		 {
		 $adanihr = $datau['typetextfield'];
		 }
		 else
		 {
		 $adanihr = 'hidden';
		 }
 ?>

        <input type="checkbox" name="kerugian<?php echo"$k"; ?>" id="<?php echo $datau['nama_kerugian']; ?>" value="<?php echo $datau['id_kerugian']; ?>"> <?php echo $datau['nama_kerugian']; ?>
<div class="separator-fields"></div>
		<input name="keterangan_kerugian<?php echo"$k"; ?>" value="" type="<?php echo "$adanihr"; ?>" placeholder="Jumlah <?php echo $datau['nama_kerugian']; ?>" class="w-input input-form" id="selectx">
<script>
$('[type="checkbox"][name^="kerugian"]').change(function(){
  $(this).nextAll('#selectx').first().toggle(this.checked);
});
</script>
<?php
$k++;
}
$jumMhs2 = $k-1;
?>
<input type="hidden" name="n2" value="<?php echo $jumMhs2 ?>" />
</div>
</div>


<div> 
<table width="100%" border="0" bgcolor="#F6F6F6">
  <tr>
    <td><font color="#003366">DESKRIPSI</font></td>
  </tr>
</table>
<textarea cols="40" rows="2" class="w-input input-form" name="deskripsi" placeholder="Harap Diisi" id="deskripsi" required><?php echo "$error"; ?></textarea>
<input type="hidden" name="kode_bandara" value="<?php echo $_SESSION[kode_bandara]; ?>">
<div class="separator-fields"></div>
</div>
<style>
.fileContainer {
    overflow: hidden;
    position: relative;
}

.fileContainer [type=file] {
    cursor: inherit;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: justify;
    top: 0;
}

/* Example stylistic flourishes */

.fileContainer {
    background: #999999;
    border-radius: .2em;
    float: left;
    padding: .7em;
}

.fileContainer [type=file] {
    cursor: pointer;
}
</style>
<label class="label-form" for="full-name-field">Ambil Gambar Incident / Accident ( Take a Photo )</label>
<div class="separator-fields"></div> 
<center>
<label class="fileContainer">
Take a Photo 1
<input id="fileupload-example-1" type="file" name="image" onClick="getLocation()" onChange="PreviewImage();"/>
</label>
<img id="uploadPreview"  style="max-width:100%;height:auto;" />
</center>

<center>
<label class="fileContainer">
Take a Photo 2
<input id="fileupload-example-2" type="file" onClick="getLocation1()" name="image1"  onChange="PreviewImage1();"/>
</label>
<img id="uploadPreview1"  style="max-width:100%;height:auto;" />
</center>

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("fileupload-example-1").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>

<script type="text/javascript">

    function PreviewImage1() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("fileupload-example-2").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview1").src = oFREvent.target.result;
        };
    };

</script>
<br>
<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "<input type='hidden' name='latitude' value=" + position.coords.latitude + 
    "><br><input type='hidden' name='longitude' value= " + position.coords.longitude + ">";
}
</script>

<p id="demo1"></p>

<script>
var x = document.getElementById("demo1");

function getLocation1() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "<input type='hidden' name='latitude' value=" + position.coords.latitude + 
    "><br><input type='hidden' name='longitude' value= " + position.coords.longitude + ">";
}
</script>

<div class="separator-fields"></div>
<input class="w-button action-button" name="submit" type="submit" value="SUBMIT" data-wait="Please wait..."> 
<div class="separator-button"></div>
</form>
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