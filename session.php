<?php

include "config.php";

session_start();// Memulai Session

// Menyimpan Session

$user=$_SESSION['login_user'];

// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc

$query = "select * from login where username='$user'";

$ses_sql=mysqli_query($con,$query);

$row = mysqli_fetch_assoc($ses_sql);

$login_session =$row['username'];

$nip =$row['nip'];

$role =$row['role'];

$nama =$row['nama'];

if(!isset($login_session)){

	mysqli_close($connection); // Menutup koneksi

	header('Location: index.php'); // Mengarahkan ke Home Page

}

?>