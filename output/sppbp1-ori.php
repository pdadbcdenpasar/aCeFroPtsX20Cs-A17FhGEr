<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['Kode']; ?></title>
</head>
<body>
<?php
$tglsurat = date('Y-m-d');
$tglambil = date('Y-m');
/*$username = $_SESSION["user"];*/
include_once("../../library/koneksi.php");
include_once("../../library/variabel.php");
include "../fungsi.php";
include_once("../tglindo.php");
$em = mysqli_query($server,"select * from dok_penagihan where dok_penagihan_id='".$dok_penagihan_id."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
$data = mysqli_fetch_assoc($em);

$perusSql = "SELECT * from data_perusahaan where no_nppbkc='".$data['nppbkc']."'";
$perusQry = mysqli_query($server,$perusSql)  or die ("Query Perusahaan sql salah : ".mysqli_error());
$perus = mysqli_fetch_array($perusQry);

$sql2 = "select Volume,saldo, \n"
." sum(CASE \n"
." WHEN Golongan = 'A' THEN '".$GolA['tarif']."' \n"
." WHEN Golongan = 'B' THEN '".$GolB['tarif']."' \n"
." ELSE '".$GolC['tarif']."' END) AS tarif  from (select a.Kode, a.Nama_Perusahaan, a.Volume, a.Golongan, b.Jml_dppc, a.Jml_ck1a, b.Jml_dppc-a.Jml_ck1a as saldo , IF(a.Kode IS NOT NULL,1,0) AS drafted \n"
." FROM ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(dppc.Jumlah),sum(dppc.Jumlah),0) AS Jml_dppc \n"
." from (dpita left join dppc on((dpita.Kode = dppc.Kode))) where YEAR(dppc.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) b \n"
." LEFT JOIN ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(ck1a.Jumlah),sum(ck1a.Jumlah),0) AS Jml_ck1a \n"
." from (dpita left join ck1a on((dpita.Kode = ck1a.Kode))) where YEAR(ck1a.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) a ON b.Kode = a.Kode) c \n"
." where saldo !=0 and Nama_Perusahaan = '".$perus['nm_perusahaan1']."' group by Kode";
$stmt2 = mysqli_query($server,$sql2)  or die ("Query Saldo salah : ".mysqli_error());
	
$Jenissql = "SELECT distinct(vol), jenis FROM `p3c` WHERE nm_perusahaan = '".$perus['nm_perusahaan1']."' and vol in ( \n"
." select Volume from (select a.Kode, a.Nama_Perusahaan, a.Volume, a.Golongan, b.Jml_dppc, a.Jml_ck1a, b.Jml_dppc-a.Jml_ck1a as saldo , IF(a.Kode IS NOT NULL,1,0) AS drafted \n"
." FROM ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(dppc.Jumlah),sum(dppc.Jumlah),0) AS Jml_dppc \n"
." from (dpita left join dppc on((dpita.Kode = dppc.Kode))) where YEAR(dppc.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) b LEFT JOIN ( \n"
." select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(ck1a.Jumlah),sum(ck1a.Jumlah),0) AS Jml_ck1a \n"
." from (dpita left join ck1a on((dpita.Kode = ck1a.Kode))) where YEAR(ck1a.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) a ON b.Kode = a.Kode) c \n"
." where saldo !=0 and Nama_Perusahaan = '".$perus['nm_perusahaan1']."' group by Kode order by tgl_p3c desc) order by tgl_p3c desc";
$Jenisstmt = mysqli_query($server,$Jenissql)  or die ("Query P3C salah : ".mysqli_error());

$GolASql = "select tarifKeping as tarif from tarif_pita where golongan = 'A'";
$GolAQry = mysqli_query($server,$GolASql)  or die ("Query Tabel GolASql salah : ".mysqli_error());
$GolA = mysqli_fetch_array($GolAQry);
$GolBSql = "select tarifKeping as tarif from tarif_pita where golongan = 'B'";
$GolBQry = mysqli_query($server,$GolBSql)  or die ("Query Tabel GolBSql salah : ".mysqli_error());
$GolB = mysqli_fetch_array($GolBQry);
$GolCSql = "select tarifKeping as tarif from tarif_pita where golongan = 'C'";
$GolCQry = mysqli_query($server,$GolCSql)  or die ("Query Tabel GolCSql salah : ".mysqli_error());
$GolC = mysqli_fetch_array($GolCQry);
$SISAsql = "select *, \n"
." sum(CASE \n"
." WHEN Golongan = 'A' THEN '".$GolA['tarif']."' \n"
." WHEN Golongan = 'B' THEN '".$GolB['tarif']."' \n"
." ELSE '".$GolC['tarif']."' END) AS tarif  from (select a.Kode, a.Nama_Perusahaan, a.Volume, a.Golongan, b.Jml_dppc, a.Jml_ck1a, b.Jml_dppc-a.Jml_ck1a as saldo , IF(a.Kode IS NOT NULL,1,0) AS drafted \n"
." FROM ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(dppc.Jumlah),sum(dppc.Jumlah),0) AS Jml_dppc \n"
." from (dpita left join dppc on((dpita.Kode = dppc.Kode))) where YEAR(dppc.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) b \n"
." LEFT JOIN ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan,if(sum(ck1a.Jumlah),sum(ck1a.Jumlah),0) AS Jml_ck1a \n"
." from (dpita left join ck1a on((dpita.Kode = ck1a.Kode))) where YEAR(ck1a.Tanggal) = YEAR(CURDATE())-1 group by dpita.Kode) a ON b.Kode = a.Kode) c \n"
." where saldo !=0 and Nama_Perusahaan = '".$perus['nm_perusahaan1']."' group by Kode";
$SISAstmt = mysqli_query($server,$SISAsql)  or die ("Query Saldo salah : ".mysqli_error());

?>
<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:11px;">
	<tr>
		<td>SPPBP-1 MMEA</td>
	</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:13px;">
	<tr>
		<th>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</th>
	</tr>
	<tr>
		<th>DIREKTORAT JENDERAL BEA DAN CUKAI</th>
	</tr>
	<tr>
		<th>KANTOR WILAYAH DJBC BALI, NTB, DAN NTT</th>
	</tr>
	<tr>
		<th><u>KANTOR PENGAWASAN DAN PELAYANAN BEA DAN CUKAI TIPE MADYA PABEAN A DENPASAR</u></th>
	</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
  <tr>
    <td width="200">Yth. Nama Penanggung Cukai</td>
	<td width="2">:</td>
    <td width="350"><?php echo $data['nama_perusahaan'];?></td>
  </tr>
  <tr>
    <td width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NPPBKC</td>
	<td width="2">:</td>
    <td width="350"><?php echo $data['nppbkc'];?></td>
  </tr>
    <tr>
    <td width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
	<td width="2">:</td>
    <td width="350"><?php echo $data['alamat'];?></td>
  </tr>
  </table>
<div style="border-collapse:collapse; line-height:0; font-family:Arial; font-size:13px; ">
<p style="line-height:1; text-align: center">SURAT PEMBERITAHUAN DAN PENAGIHAN BIAYA PENGGANTI
NOMOR : SPPBP-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/WBC.13/KPP.MP.02/<?php echo date('Y');?></p>
</div>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
  <tr>
    <td width="100%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan dokumen Permohonan Penyediaan Pita Cukai Minuman Mengandung Etil Alkohol (P3C MMEA) untuk tahun <?php echo date('Y')-1;?> yang Saudara ajukan dengan Nomor :</td>
</tr>
</table>
<table align="left" border="0" width="350px" style="border-collapse:collapse; font-family:Arial; font-size:11px; padding-top: -10px;">
<?php 
$nomor  = 0;
while ($row2 = mysqli_fetch_array($stmt2)) 
{ 
$totalSaldo = $row2['saldo'];
$P3Csql = "SELECT * FROM `p3c` WHERE nm_perusahaan = '".$perus['nm_perusahaan1']."' and vol = '".$row2['Volume']."' order by tgl_p3c desc ";
$P3Cstmt = mysqli_query($server,$P3Csql)  or die ("Query P3C salah : ".mysqli_error());	
$P3Ctotal = 0;
while ($P3Crow = mysqli_fetch_array($P3Cstmt)) 
{
	$nomor++;?>
	<tr>
		<td align="center"><?php echo $nomor.".";?></td>
		<td>SAC-<?php echo tambah_nol($P3Crow['no_p3c'],6);?></td>
		<td> TANGGAL </td>
		<td><?php echo Tanggalindo($P3Crow['tgl_p3c']);?></td>
	</tr>	
	<?php 
	$P3Ctotal += $P3Crow['jml_lembar'];
	if ($P3Ctotal >= $totalSaldo){
	break;}
}}?>	
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px; padding-top: -10px;">
<tr>
<td>dapat disampaikan rincian sisa persediaan pita cukai Minuman Mengandung Etil Alkohol sebagai berikut:</td>
</tr>
</table>
  <table align="left" border="1" width="350px" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
	<tr bgcolor=#F0F8FF>
		<th align="center">&nbsp;&nbsp;No.&nbsp;&nbsp;</th>
		<th align="center">&nbsp;&nbsp;Jenis MMEA&nbsp;&nbsp;</th>
		<th colspan="2" align="center">&nbsp;&nbsp;Golongan dan&nbsp;&nbsp;
		&nbsp;&nbsp;Tarif Cukai&nbsp;&nbsp;</th>
		<th align="center">&nbsp;&nbsp;Volume / 
		&nbsp;&nbsp;Isi Kemasan&nbsp;&nbsp;</th>
		<th align="center" >&nbsp;&nbsp;Jumlah Penyediaan&nbsp;&nbsp;
		&nbsp;&nbsp;P3C MMEA&nbsp;&nbsp;</th>
		<th align="center" >&nbsp;&nbsp;Jumlah&nbsp;&nbsp; 
		&nbsp;&nbsp;Pemesanan CK-1A&nbsp;&nbsp;</th>
		<th align="center">&nbsp;&nbsp;Jumlah &nbsp;&nbsp;
		&nbsp;&nbsp;Sisa Persediaan&nbsp;&nbsp;</th>
		<th align="center" >&nbsp;&nbsp;Ket&nbsp;&nbsp;</th>
	</tr>
	<?php $SISAtotal = 0;
		  $nomor  = 0;
			while ($SISArow = mysqli_fetch_array($SISAstmt)) 
			{ $nomor++;	?>
	<tr>
		<td align="center" width="5%"><?php echo $nomor;?></td>
		<td align="center" width="5%"><?php echo $P3Crow['jenis'];?></td>
		<td align="center" width="5%"><?php echo $SISArow['Golongan'];?></td>
		<td align="center" width="5%"><?php echo $SISArow['tarif'];?></td>
		<td align="center" width="5%"><?php echo $SISArow['Volume'];?></td>
		<td align="center" width="5%"><?php echo $SISArow['Jml_dppc'];?></td>
		<td align="center" width="5%"><?php echo $SISArow['Jml_ck1a'];?></td>
		<td align="center" width="5%"><?php echo $SISArow['saldo'];?></td>
		<td></td>
	</tr>
			<?php $SISAtotal += $SISArow['saldo'];}?>
	<tr>
		<td colspan="7" align="center"> Jumlah</td>
		<td align="center"><?php echo $SISAtotal; ?></td>
		<td align="center"></td>
	</tr>
	</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px; padding-top: -10px;">
  <tr>
    <td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sesuai ketentuan dalam pasal 25 Peraturan Direktur Jenderal Bea dan Cukai Nomor PER-24/BC/2015 tanggal 20 Nopember 2015 tentang Perubahan atas Peraturan Direktur Jenderal Bea dan Cukai Nomor PER-49/BC/2011 tentang Penyediaan dan Pemesanan Pita Cukai, atas sisa pita cukai Minuman Mengandung Etil Alkohol yang tidak direalisasikan dengan CK-1A tersebut dikenakan biaya pengganti penyedia pita cukai, sehingga ditetapkan adanya tagihan yang harus Saudara lunasi dengan rincian sebagai berikut :</td>
</tr>
</table>
	<table align="left" border="1" width="600px" style="border-collapse:collapse; font-family:Arial; font-size:12px; ">
	<tr>
		<td align="center">&nbsp;&nbsp;&nbsp;&nbsp; Jumlah Pita Cukai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;&nbsp; <?php echo $SISAtotal; ?> &nbsp; lembar &nbsp; x &nbsp; 60&nbsp; x &nbsp; Rp. 300,00         =&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp.&nbsp;&nbsp;<?php echo number_format($SISAtotal*60*300); ?>&nbsp;&nbsp; </td>
	</tr>
	<tr>
		<td align="center">&nbsp;&nbsp; Jumlah</td>
		<td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp.&nbsp;&nbsp;<?php echo number_format($SISAtotal*60*300); ?>&nbsp;&nbsp; </td>
	</tr>
	</table>
	<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:11px; padding-top: -10px;">
	<tr>
		<td>Terbilang &nbsp;&nbsp; :&nbsp;&nbsp; <?php echo strtoupper(terbilang($data['tagihan'],3)); ?> RUPIAH</td>
	</tr>
	</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px; padding-top: -10px;">
<tr>
<td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diminta kepada Saudara untuk  membayar tagihan tersebut paling lama  30 (tiga puluh)  hari sejak tanggal diterbitkannya Surat Pemberitahuan dan Penagihan Biaya Pengganti (SPPBP-1) ini. Pembayaran biaya pengganti penyediaan pita cukai dibuktikan dengan menggunakan bukti penerimaan negara atas billing yang diterbitkan sebagai penerimaan cukai lainnnya yang disampaikan kepada Kepala Kantor Pengawasan Dan Pelayanan Bea dan Cukai Tipe Madya Pabean A Denpasar. Dalam hal SPPBP-1 ini tidak dilunasi dalam jangka waktu tersebut di atas, maka P3C MMEA dan CK-1A berikutnya tidak akan dilayani.</td>
</tr>
</table>

<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
	<tr>
		<td width="300">Ditetapkan di &nbsp;&nbsp;: DENPASAR</td>
	</tr>
	<tr>
		<td width="300">Pada Tanggal : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo Tanggalindo($tglambil);?></td>
	</tr>
	<tr>
		<td width="300"><?php echo strtoupper($data['jabatan']);?></td>
	</tr>
</table>
<p></p>
<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
	<tr>
		<td width="300"><?php echo $data['pejabat'];?></td>
	</tr>
	<?php $np = mysqli_query($server,"select NIP from data_pegawai where NAMA='".$data['pejabat']."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
		  $nip = mysqli_fetch_assoc($np);	?>
	<tr>
		<td width="300">NIP.<?php echo $nip['NIP'];?></td>
		<td width="300"></td>
	</tr>
</table>
<table align="left" border="1" style="border-collapse:collapse; font-family:Arial; font-size:11px;">
<tr>
<td width="300">Diterima tanggal &nbsp;&nbsp;:
Diterima di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
Yang menerima &nbsp;&nbsp; :</td>
</tr>
	</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
  <tr>
    <td width="200">Tembusan :</td>
	</tr>
	<tr>
    <td width="100%">1. Direktur Jenderal Bea dan Cukai up. Direktur Cukai</td>
	</tr>
	<tr>
	<td width="10%">2. Kepala Kantor Wilayah DJBC Bali, NTB, dan NTT</td>
  </tr>
  </table>
<p></p>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
<tr>
<td>Kp. : KPP.MP.02/KPP.MP.0203/PN28/<?php echo date('Y');?></td>
</tr>
</table>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="sppbp".$nock1a.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','Legal','en', false, 'ISO-8859-15',array(15, 0, 20, -50));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>