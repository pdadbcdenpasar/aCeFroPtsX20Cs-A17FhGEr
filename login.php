<?php

include "config.php";

session_start(); // Memulai Session

if (isset($_POST['submit'])) {

	if (empty($_POST['username']) || empty($_POST['password'])) {

		echo "<script>alert('Invalid Username dan/atau Password');

		document.location.href='index.php'</script>\n";

	}

	else

	{

		// Variabel username dan password

		$username=$_POST['username'];

		$password=$_POST['password'];

		// Mencegah MySQL injection 

		$username = stripslashes($username);

		$getpassword = $password;

		// SQL query untuk memeriksa apakah karyawan terdapat di database?

		$query = mysqli_query($con,"select * from login where password='$getpassword' AND username='$username'");

		$rows = mysqli_num_rows($query);

			if ($rows == 1) {

				$_SESSION['login_user']=$username; // Membuat Sesi/session

				header("location: home.php"); // Mengarahkan ke halaman profil

				} else {

				echo "<script>alert('Username dan/atau Password Salah');

				document.location.href='index.php'</script>\n";

				}

				mysqli_close($con); // Menutup koneksi

	}

}

?>