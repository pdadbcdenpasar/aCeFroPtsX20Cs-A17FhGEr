
<?php
session_start();
ob_end_clean();
ob_start();

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['Kode']; ?></title>
</head>
<body>
<?php
$nock1a = $_SESSION["no_ck1a"];
$tglck1a = $_SESSION["tgl_ck1a"];
$petugas = $_SESSION["petugas"];
$penerima = $_SESSION["penerima"];
$keterangan = $_SESSION["keterangan"];
$nip = $_SESSION["nip"];
$tglambil = date('Y-m-d');
/*$username = $_SESSION["user"];*/
include_once("../../library/koneksi.php");
include_once("../../library/variabel.php");
include "../fungsi.php";
include_once("../tglindo.php");
$em = mysqli_query($server, "select * from ck1a where No_CK1A='".$nock1a."' and Tanggal='".$tglck1a."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
$data = mysqli_fetch_assoc($em);

echo '<table align="right" border="1" style="border-collapse:collapse; font-family:Arial; font-size:9px;">
  <tr>
    <td width="200">Nomor : FORM-02/WBC.13/KPP.MP.0203/2017</td>
    <td width="150">Tanggal : 3 Juli 2017</td>
  </tr>
  <tr>
    <td width="150">Revisi :</td>
    <td width="150">Tanggal : </td>
  </tr>
  </table>';
?>
<p></p>
<p></p>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:15px;">
	<tr>
		<th>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</th>
	</tr>
	<tr>
		<th>DIREKTORAT JENDERAL BEA DAN CUKAI</th>
	</tr>
	<tr>
		<th>KPPBC TMP A DENPASAR</th>
	</tr>
	</table>
<p></p>
<table align="center" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
	<tr>
		<th><u>TANDA TERIMA PITA CUKAI MMEA/HT/HPTL</u></th>
	</tr>
</table>
<p></p>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:13px;">
  <tr>
    <td width="200">1. Nama Penerima Pita Cukai</td>
	<td width="2">:</td>
    <td width="350"><?php echo $penerima;?></td>
  </tr>
  <tr>
    <td width="200">2. Nama Perusahaan</td>
	<td width="2">:</td>
    <td width="350"><?php echo $data["Nama_Perusahaan"];?></td>
  </tr>
    <tr>
    <td width="200">3. Nomor CK-1/ CK-1A</td>
	<td width="2">:</td>
    <td width="350"><?php echo $nock1a; ?></td>
  </tr>
  <tr>
    <td width="200">4. Tanggal CK-1/ CK-1A</td>
	<td width="2">:</td>
    <td width="350"><?php echo Tanggalindo($data["Tanggal"]);?></td>
  </tr>
  </table>
  <p style="line-height:1">Pada hari ini telah diterima dengan sebenarnya pita cukai MMEA/HT/HPTL dengan rincian sebagai berikut :</p>
<table align="left" border="1" style="border-collapse:collapse; font-family:Arial; font-size:13px; padding-top: -15px;">
	<tr bgcolor=#F0F8FF>
		<th align="center" width="80">Golongan</th>
		<th align="center" width="100">Tarif/ liter</th>
		<th align="center" width="80">Isi (ml.)</th>
		<th align="center" width="80">V</th>
		<th align="center" width="200">Keterangan</th>
	</tr>
	<?php
	$em3 = mysqli_query($server,"select sum(Jumlah) as jumlah from ck1a where No_CK1A='".$nock1a."' and Tanggal='".$tglck1a."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
	$jumlah = mysqli_fetch_array($em3);
	$em2 = mysqli_query($server,"select `ck1a`.`Nama_Perusahaan` AS `Nama_Perusahaan`,`ck1a`.`Volume` AS `Volume`, `ck1a`.`Golongan` AS `Golongan`, `ck1a`.`No_CK1A` AS `No_CK1A`, `ck1a`.`Tanggal` AS `Tanggal`, `ck1a`.`Jumlah` AS `Jumlah`, `ck1a`.`Keterangan` AS `Keterangan`,`tarif_pita`.`tarifKeping` AS `tarif` from (`ck1a` left join `tarif_pita` on((`ck1a`.`Golongan` = `tarif_pita`.`golongan`))) where ck1a.No_CK1A='".$nock1a."' and `ck1a`.`Tanggal`='".$tglck1a."' and `tarif_pita`.`flag` = 1 group by `ck1a`.`Volume`") or die ("Data Tidak Ditemukan !! ".mysqli_error());
	while ($data2 = mysqli_fetch_array($em2)) {
	$nomor  = 0; 
	$nomor++;
	?>
	<tr>
		<td align="center" width="80"><?php echo $data2['Golongan'];?></td>
		<td align="center" width="100"><?php echo $data2['tarif'];?></td>
		<td align="center" width="80"><?php echo $data2['Volume'];?></td>
		<td align="center" width="80"><?php echo $data2['Jumlah'];?></td>
		<td align="center" width="200"><?php echo $data2['Keterangan'];?></td>
	</tr>
	<?php }?>
	<tr>
		<td colspan="3" align="center"> Jumlah</td>
		<td align="center"><?php echo $jumlah['jumlah']; ?></td>
		<td align="center"></td>
	</tr>
	</table>
<p></p>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:13px;">
	<tr>
		<td width="350">PETUGAS PENYERAHAN PC</td>
		<td width="300">DENPASAR, <?php echo Tanggalindo($tglambil);?></td>
	</tr>
</table>
<p></p>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:13px;">
	<tr>
		<td width="350"><?php echo $petugas;?></td>
		<td width="300"><?php echo $penerima;?></td>
	</tr>
	<tr>
		<td width="350"><?php echo $nip;?></td>
		<td width="300"></td>
	</tr>
</table>

</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="tt".$nock1a.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>