<?php

include "../library/koneksi.php";



//$q = trim(strip_tags($_GET['term'])); // variabel $q untuk mengambil inputan user

$q = $_GET['term'];

$sql = mysqli_query($con, "SELECT * FROM dpita WHERE Nama_Perusahaan LIKE '%".$q."%'"); // menampilkan data yg ada didatabase yg sesuai dengan inputan user

while ($data = mysqli_fetch_array($sql)){

	//$result[] = htmlentities(stripslashes($data['nm_jabatan_eks'])); // manempilkan nama jabatan

		

		//$row['value']	=$data['kode_barang'];

		$row['value']		=$data['Nama_Perusahaan'];

		$row_set[]			=$row;

}

//echo json_encode($result);

echo json_encode($row_set);

?>