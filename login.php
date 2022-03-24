<?php 
require_once 'init.php';

if(isset($_POST['submit'])){
	$username1 = $_POST['username1'];
	$password1 = sha1($_POST['password1']);

	$username12 = mysqli_real_escape_string($koneksi, $username1);
	$password12 = mysqli_real_escape_string($koneksi, $password1);

	$cekdata = "SELECT * FROM id_user WHERE username = '$username12' AND password = '$password12'";
	$hubungkancekdata = mysqli_query($koneksi, $cekdata);

			while($ambildata = mysqli_fetch_assoc($hubungkancekdata)){
				$username2 = $ambildata['username'];
				$password2 = $ambildata['password'];
			}

	if(!empty(trim($username12)) and !empty(trim($password12))){

		if(mysqli_num_rows($hubungkancekdata)==1){
			

			if($username12 == $username2 and $password12 == $password2){
				echo "berhasil login";
			}else{
				echo "gagal login";
			}
		}else{
			echo "data tidak ada";
		}
	}else{
		echo "tidak boleh kosong";
	}

	
}



require_once 'header.php';
 ?>

<form method="POST" action="login.php">
	<table>
		<tr>
			<td><label for="user">username</label></td>
			<td><input type="text" name="username1" id="user"></td>
		</tr>

		<tr>
			<td><label for="pass">password</label></td>
			<td><input type="password" name="password1" id="pass"></td>
		</tr>

		<tr>
			<td><input type="submit" name="submit" value="register"></td>
		</tr>
	</table>
</form>

 <?php 
require_once 'footer.php';
  ?>