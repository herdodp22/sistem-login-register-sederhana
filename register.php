<?php 
require_once 'init.php';

//validasi register

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	$username1 = mysqli_real_escape_string($koneksi,$username);
	$password1 = mysqli_real_escape_string($koneksi,$password);

			$cekdata = "SELECT * FROM id_user WHERE username = '$username1'";
			$hubungkancekdata = mysqli_query($koneksi, $cekdata);

			if(mysqli_num_rows($hubungkancekdata)>0){

				echo "username yang dimasukkan sudah ada";

			}else{
		
				if(!empty(trim($username)) and !empty(trim($password))){
				$registerdata = "INSERT INTO id_user set username = '$username1', password = '$password1'";
				mysqli_query($koneksi, $registerdata);
				header("location:index.php");
				
				}else{
					echo "tidak boleh kosong";
				}
			}
	}



require_once 'header.php';
 ?>


<form method="POST" action="register.php">
	<table>
		<tr>
			<td><label for="user">username</label></td>
			<td><input type="text" name="username" id="user"></td>
		</tr>

		<tr>
			<td><label for="pass">password</label></td>
			<td><input type="password" name="password" id="pass"></td>
		</tr>

		<tr>
			<td><input type="submit" name="submit" value="register"></td>
		</tr>
	</table>
</form>



 <?php 
require_once 'footer.php';
  ?>