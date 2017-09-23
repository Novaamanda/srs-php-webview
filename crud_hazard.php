<?php
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password])) // Jika Belum Login Maka otomatis redirect ke halamn login
{
echo "<script>alert('Silahkan Melakukan Login Terlebih Dahulu'); location.href='login.php?page=hazard';</script>";
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

<script type="text/javascript">
  function showLoading() {
    document.getElementById('loadingmsg').style.display = 'block';
    document.getElementById('loadingover').style.display = 'block';
}

var lat;
var longitude;
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

<form method="post" action="operation_crudhazard.php" enctype="multipart/form-data" autocomplete="off" onSubmit="showLoading();"> 
	<input name="cookieshazard" id="cookies" type="text" value="<?php echo $cookie ;?>">
	<input name="id_user" id="iduser" type="text" value="<?php echo $id_user ;?>">

	<div> 
		<table width="100%" border="0" bgcolor="#F6F6F6">
			<tr>
				<td><font color="#003366">TIPE HAZARD</font></td>
			</tr>
		</table>
	<div class="separator-fields"></div>
		<?php
		$hasil_db = mysql_query("SELECT * FROM tipe_hazard");
			while ($data = mysql_fetch_array($hasil_db)){
		?>
		<input type="checkbox" name="typehazard[]" value="<?php echo $data['id_tipehazard']; ?>" id="<?php echo $data['nama_tipehazard']; ?>"> <?php echo $data['nama_tipehazard']; ?> <div class="separator-fields"></div>
		<?php
		}
		?>
		<div class="separator-fields"></div>
	</div>
		
	<div>
		<table width="100%" border="0" bgcolor="#F6F6F6">
			<tr>
				<td><font color="#003366">PENYEBAB HAZARD</font></td>
			</tr>
		</table> 
		<div class="separator-fields"></div>
		<?php include 'koneksi.php';
		$hasil_db = mysql_query("SELECT * FROM penyebab_hazard");
		while ($data = mysql_fetch_array($hasil_db)){
			?>
			<input type="checkbox" name="penyebabhazard[]" value="<?php echo $data['id_penyebabhazard']; ?>" id="<?php echo $data['nama_penyebabhazard']; ?>"> <?php echo $data['nama_penyebabhazard']; ?> <div class="separator-fields"></div>
			<?php
			}
			?>
		<div class="separator-fields"></div>
	</div>
			
	<div>
		<table width="100%" border="0" bgcolor="#F6F6F6">
			<tr>
				<td><font color="#003366">DESKRIPSI</font></td>
			</tr>
		</table>
			<textarea cols="40" rows="2" class="w-input input-form" name="deskripsi" placeholder="Harap Diisi" id="deskripsi" required><?php echo "$error"; ?></textarea>
			<input type="text" name="kode_bandara" id="kodebandara" value="<?php echo $_SESSION[kode_bandara]; ?>">
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

	<label class="label-form" for="full-name-field">Ambil Gambar Hazard ( Take a Photo )</label>
	<div class="separator-fields"></div> 
<center>
<label class="fileContainer">
Take a Photo 1
<input id="fileupload-example-1" type="file" onClick="getLocation()" name="image" onChange="PreviewImage();" />
</label>
<img id="uploadPreview"  style="max-width:100%;height:auto;" />
</center>

<center>
<label class="fileContainer">
Take a Photo 2
<input id="fileupload-example-2" type="file" onClick="getLocation1()" name="image1" onChange="PreviewImage1();" />
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
	lat = position.coords.latitude;
	longitude = position.coords.longitude;
}


</script>



<div class="separator-fields"></div>
<input class="w-button action-button" name="submit" type="button" value="SUBMIT"   onClick="kirimHazard()" data-wait="Please wait..."> 
<div class="separator-button"></div>
</form>
 </div>

        </div>
      </div>
    
  </section>
<?php include "metabottom.php"; ?>

<script type="text/javascript">
      function kirimHazard() {
		  var deskripsi = document.getElementById("deskripsi").value;
		  var image = document.getElementsByName("image").value;
		  var image1 = document.getElementsByName("image1").value;
		  var cookieshazard = document.getElementById("cookies").value;
		  var id_user = document.getElementById("iduser").value;
		  var kode_bandara = document.getElementById("kodebandara").value;
		  var today = new Date();
		  var bulan = today.getMonth()+1;
		  var tahun = today.getFullYear();
		  var jam = today.getHours();
		  var menit = today.getMinutes();
		  var detik = today.getSeconds();
		  var waktu = tahun + "-" + bulan + "-" + today + " " + jam + ":" + menit + ":" + detik; 		  
		  
		  //Start Checkbox typehazard
		  var tmpArrType = [];
		  $('input[name="typehazard[]"]:checked').each(function(){ tmpArrType.push(this.value);}
		  );
		  var objKirimType = {};
		  objKirimType.typehazard = tmpArrType;
		  var jsonType = JSON.stringify(objKirimType);
		  //console.log(jsonType);
		  //console.log(objKirimType);
		  //End Checkbox typehazard
		  
		  //Start Checkbox penyebabhazard
		  var tmpArrPenyebab = [];
		  $('input[name="penyebabhazard[]"]:checked').each(function(){ tmpArrPenyebab.push(this.value);}
		  );
		  var objKirimPenyebab = {};
		  objKirimPenyebab.penyebabhazard = tmpArrPenyebab;
		  var jsonPenyebab = JSON.stringify(objKirimPenyebab);
		  //End Checkbox penyebabhazard
		  
		  
          Android.kirimDataHazard(cookieshazard, id_user, jsonType, jsonPenyebab, deskripsi, kode_bandara, image, image1, lat, longitude, waktu);
      }
    </script>

</body>
</html>
<?php
}
?>