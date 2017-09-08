<?php
include "koneksi.php";
$nama = $_POST['nama'];
$email   = $_POST['email'];
$no_tlpn   = $_POST['no_tlpn'];
$id_optional_yg_terlibat   = $_POST['id_optional_yg_terlibat'];
$username   = $_POST['username'];
$password   = base64_encode($_POST['password']);
$kode_bandara   = $_POST['kode_bandara'];
if ($_POST['submit'] == 'SUBMIT') // 1. if 1 --> Jika klik submit
{
	$sqlvvreg=mysql_query("SELECT * FROM user where email = '$email'");
	$rvvreg=mysql_fetch_array($sqlvvreg);
		if($rvvreg) // 2. if 2 --> Jika Alamat Email Sudah ada tidak boleh mendaftar lagi
		{
			?>
			<script>
			window.location='message_id_reg_alredy.php';
			</script>	
			<?php
		}
		
		else // else if 2
		{
		$sqlvvreg2=mysql_query("SELECT * FROM user where username = '$username'");
		$rvvreg2=mysql_fetch_array($sqlvvreg2);
				if($rvvreg2) // 3. if 3 --> Jika username Sudah ada tidak boleh mendaftar lagi
					{
						?>
						<script>
						window.location='message_idusername_reg_alredy.php';
						</script>	
						<?php
					}
					
				else // else if 3
				{
					$query = "insert into user values('','$nama','$email','$no_tlpn','$id_optional_yg_terlibat','$username','$password','$kode_bandara','1','0',now())";
	$sql = mysql_query($query);
										if($sql) // 4. if 4 --> Jika sql running
										{
											?>											 
											 <script>
											 window.location='message_sukses_reg.php';
											</script>	
											
											<?php
										} 
										
										else // else if 4
										{
											?>
											<script>
											 window.location='signup.php';
											</script>	
											<?php
										}
				}
		
		}
	}
		
		
						// else if 1
						else
						{
						?>
						<script>
						window.location='signup.php';
						</script>	
						<?php
						}
?>		 