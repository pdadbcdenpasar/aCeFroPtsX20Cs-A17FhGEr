
<?php
//include_once("../../library/variabel.php");
//include "../fungsi.php";
//include_once("../tglindo.php");
include_once("../../library/koneksi.php");
ob_end_clean();
ob_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>
<table align="center" border="0" style="border-collapse:collapse; font-family:Arial; font-size:15px;">
	<tr>
		<th align="center" >DATA PEMASUKAN, PENGELUARAN, DAN SISA PITA CUKAI MMEA</th>
	</tr>
	<tr>
		<th align="center" >KPPBC TIPE MADYA PABEAN A DENPASAR</th>
	</tr>
</table>
<table nobr="true" align="left" border="1" style="border-collapse:collapse; font-family:Arial; font-size:9px;">
<thead>
	<tr bgcolor=#F0F8FF>
		<th  rowspan="2" align="center">NO</th>
		<th  rowspan="2" align="center">NAMA PERUSAHAAN MMEA</th>
		<th  rowspan="2" align="center">GOL.</th>
		<th  rowspan="2" align="center">VOLUME (ml)</th>
		<th colspan="5" align="center">DETAIL  PITA CUKAI TA 2017</th>
		<th colspan="3" align="center">REALISASI CK 1A 2017</th>
	</tr>
	<tr bgcolor=#F0F8FF>
		<th width = "15">P3C (lembar)</th>
		<th width = "15">P3C (rupiah)</th>
		<th width = "20">SALDO PITA CUKAI (lembar)</th>
		<th width = "50">SALDO PITA 2017 (rupiah)</th>
		<th width = "50">TOTAL NILAI CUKAI</th>
		<th width = "20">SALDO PITA CUKAI (lembar)</th>
		<th width = "50">SALDO PITA 2017 (rupiah)</th>
		<th width = "80">TOTAL PENERIMAAN/ PERUSAHAAN</th>
	</tr>
</thead>
<?php 
$datapitaSql = "SELECT * FROM dpita ORDER BY Nama_Perusahaan";
$datapitaQry = mysqli_query($server,$datapitaSql)  or die ("Query v_stok salah : ".mysqli_error());
$nomor  = 0; 
$tglrekap = date('Y-m-d');
while ($datapita = mysqli_fetch_array($datapitaQry)) {
$nomor++;?>
	<tr>
		<td align="center"><?php echo $nomor;?></td>
		<td><?php echo $datapita['Nama_Perusahaan'];?></td>
		<td align="center"><?php echo $datapita['Golongan'];?></td>
		<td align="center"><?php echo $datapita['Volume'];?></td>
		<td align="center"><?php echo "5";?></td>
		<td align="center"><?php echo "6";?></td>
		<td align="center"><?php echo "7";?></td>
		<td align="center"><?php echo "8";?></td>
		<td align="center"><?php echo "9";?></td>
		<td align="center"><?php echo "10";?></td>
		<td align="center"><?php echo "11";?></td>
		<td align="center"><?php echo "12";?></td>
	</tr>
<?php }?>
</table>
<p></p>
<table class="table table-striped" align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
	<tr>
		<td width="100"></td>
		<td width="600"></td>
		<td width="200">DENPASAR, <?php echo "tanggal";?></td>
	</tr>
	<tr>
		<td width="100"></td>
		<td width="600">Mengetahui,</td>
		<td width="200">Yang Melakukan Pencacahan</td>
	</tr>
	<tr>
		<td width="100"></td>
		<td width="600">Kepala Seksi Perbendaharaan,</td>
		<td width="200">Pegawai Bea dan Cukai</td>
	</tr>
</table>
<p></p>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
	<tr>
		<td width="100"></td>
		<td width="600">I Gede Ketut Galung Budi Adnyana</td>
		<td width="200">Kadek Yogi Kardensiana</td>
	</tr>
	<tr>
		<td width="100"></td>
		<td width="600">NIP 197009091992011001</td>
		<td width="200">NIP. 19920117 201210 1 002</td>
	</tr>
</table>
<p></p>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
	<tr>
		<td width="100"></td>
		<td width="600"></td>
		<td width="200">Nurul Putri Ratnasari</td>
	</tr>
	<tr>
		<td width="100"></td>
		<td width="600"></td>
		<td width="200">NIP. 199606242015122001</td>
	</tr>
</table>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="rekap01.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(5, 5, 2, 2));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->pdf->SetDisplayMode('fullpage');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>