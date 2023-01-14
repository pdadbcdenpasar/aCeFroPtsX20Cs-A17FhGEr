<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['Kode']; ?></title>
</head>
<body>
<?php
$tglsurat = date('Y-m-d');
/*$username = $_SESSION["user"];*/
include_once("../../library/koneksi.php");
include_once("../../library/variabel.php");
include "../fungsi.php";
include_once("../tglindo.php");
$em = mysqli_query($server,"select * from ck1a where No_CK1A='".$nock1a."' and Tanggal='".$tglck1a."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
$data = mysqli_fetch_assoc($em);
?>
<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:11px;">
	<tr>
		<td>STCK-2</td>
	</tr>
</table>
<table align="left" border="1" style="border-collapse:collapse; font-family:Arial; font-size:13px;">
	<tr>
			<td width="300">Ditetapkan di &nbsp;&nbsp;: DENPASAR</td>
	</tr>
	<tr>
		<th style="width:10";><img src="logo.jpg" alt="Logo Kemenkeu"></th>
		<th>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA
		DIREKTORAT JENDERAL BEA DAN CUKAI</th>
	</tr>
	<tr>
		<th>KANTOR WILAYAH DJBC BALI, NTB, DAN NTT</th>
	</tr>
	<tr>
		<th><u>KANTOR PENGAWASAN DAN PELAYANAN BEA DAN CUKAI TIPE MADYA PABEAN A DENPASAR</u></th>
	</tr>
</table>
<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:11px;">
	<tr>
		<td>Denpasar, 2 November 2017</td>
	</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
    <tr>
    <td width="200">Yth.</td>
  </tr>
  <tr>
    <td width="200">Nama Penanggung Cukai</td>
	<td width="2">:</td>
    <td width="350">PT. Fun Hotel Indonesia (Triple Eight KTV)</td>
  </tr>
  <tr>
    <td width="200">NPWP/ NPPBKC</td>
	<td width="2">:</td>
    <td width="350">31.287.909.1-905.000</td>
  </tr>
    <tr>
    <td width="200">Alamat</td>
	<td width="2">:</td>
    <td width="350">Jalan Raya Kuta No. 38. Kel. Legian. Kuc. Kuta, Kab. Badung, Bali</td>
  </tr>
  </table>
<div style="border-collapse:collapse; line-height:0; font-family:Arial; font-size:13px; ">
<b><p style="line-height:1; text-align: center">SURAT TEGURAN
NOMOR : S-    /WBC.13/KPP.MP.02/2017</p></b>
</div>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
  <tr>
    <td width="100%" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menunjuk Surat Tagihan Nomor 001805/WBC.12/KPP.MP.02/2017 tanggal 19 Juli 2017 hingga saat ini Saudara belum melunasi tagihan utang dengan rincian sebagai berikut:</td>
</tr>
</table>
 <table align="left" border="1" style="border-collapse:collapse; font-family:Arial; font-size:10px;">
	<tr bgcolor=#F0F8FF>
		<th align="center" width="300">&nbsp;&nbsp;Jenis Tagihan&nbsp;&nbsp;</th>
		<th align="center" width="300">&nbsp;&nbsp;Jumlah Tagihan&nbsp;&nbsp;
		(Rp.)</th>
	</tr>
	<tr>
		<td align="center" width="5%"><?php echo $data2['jenis'];?></td>
		<td align="center" width="5%"><?php echo $data2['jumlah'];?></td>
		
	</tr>
	<tr>
		<td align="left">&nbsp;&nbsp;Cukai</td>
		<td align="right"> 0,00</td>
	</tr>
	<tr>
		<td align="left">&nbsp;&nbsp;Sanksi Administrasi Berupa Denda</td>
		<td align="right"> 20.000.000,00</td>
	</tr>
		<tr>
		<td align="left">&nbsp;&nbsp;Bunga</td>
		<td align="right"> 400.000,00</td>
	</tr>
	</table>
	<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:10px;">
	<tr>
		<td align="right" width="300">Jumlah</td>
		<td align="right" width="300"> 20.400.000,00</td>
	</tr>
	<tr>
		<td align="left" width="300"></td>
		<td align="right" width="300"> (Dua puluh juta empat ratus ribu rupiah)</td>
	</tr>
	</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
  <tr>
    <td width="100%" align="justify">Uraian terjadinya tagihan :
	Berdasarkan Berita Acara Permintaan Keterangan kedapatan PT. Graha Bali Propertindo telah menyediakan dan menjual berbagai merk MMEA golongan B dan C dengan tidak memiliki izin berupa Nomor Pokok Pengusaha Barang Kena Cukai (NPPBKC). Sesuai pasal 14 Ayat (1) Undang-Undang Nomor 39 Tahun 2007, bahwa Setiap orang yang akan menjalankan kegiatan sebagai pengusaha tempat penjualan eceran wajib memiliki izin NPPBKC. Atas kejadian tersebut sesuai dengan pasal 14 ayat (7), PT. Graha Bali Propertindo dikenakan sanksi administrasi berupa denda sebesar Rp 20.400.000,00 (dua puluh juta empat ratus ribu rupiah).</td>
</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
<tr>
<td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tagihan utang yang tidak dibayar pada waktunya, kekurangan cukai dan/atau sanksi administrasi berupa denda, akan dikenakan bunga sebesar 2% (dua persen) dari jumlah tagihan yang terutang, bagian bulan dihitung satu bulan penuh, untuk paling lama 24 (dua puluh empat) bulan.</td>
</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
<tr>
<td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Keberatan atas Surat Tagihan ini diajukan secara tertulis kepada Direktur Jenderal Bea dan Cukai melalui kantor tersebut diatas sebelum tanggal jatuh tempo dengan ketentuan sebelumnya sudah menyerahkan jaminan sebesar tagihan utang.</td>
</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
<tr>
<td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tagihan utang yang tidak dibayar pada waktunya dikenai bunga sebesar 2% (dua persen) dari jumlah tagihan yang terutang, bagian bulan dihitung satu bulan penuh, untuk paling lama 24 (dua puluh empat) bulan.</td>
</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
	<tr>
			<td width="300"></td>
			<td width="30"></td>
			<td width="300">Ditetapkan di &nbsp;&nbsp;: DENPASAR</td>
	</tr>
	<tr>
	<td width="300"></td>
	<td width="30"></td>
		<td width="300">Pada Tanggal :&nbsp;&nbsp;22 September 2017</td>
	</tr>
	<tr>
		<td width="300"></td>
		<td width="30"></td>
		<td width="300">Kepala Kantor</td>
	</tr>
<tr>
<td width="300" border="0"  bgcolor="#F0F8FF" align="center" style="border-collapse:collapse; font-family:Arial; font-size:10px;"><b>PERHATIAN</b>
TAGIHAN BEA CUKAI HARUS DILUNASI PALING LAMA 21 (DUA PULUH SATU) HARI SETELAH TANGGAL SURAT TEGURAN INI.
SESUDAH BATAS WAKTU ITU, TINDAKAN PENAGIHAN BEA DAN CUKAI AKAN DILANJUTKAN DENGAN PENERBITAN SURAT PAKSA.
(Pasal 8 UU Nomor 19 Tahun 1997 sebagaimana telah diubah dengan UU Nomor 19 Tahun 2000)</td>
<td width="30"></td>
<td width="30"></td>
</tr>
	<tr>
		<td width="300"></td>
		<td width="30"></td>
		<td width="300">Abdul Kharis</td>
	</tr>
	<tr>
		<td width="300"></td>
		<td width="30"></td>
		<td width="300">196311051991031001</td>
	</tr>
</table>

<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
  <tr>
    <td width="200">Tembusan :</td>
	</tr>
	<tr>
    <td width="100%">1.	Direktur Jenderal Bea dan Cukai u.p. Direktur Teknis dan Fasilitas Cukai</td>
	</tr>
	<tr>
	<td width="10%">2. Direktur Penerimaan dan Perencanaan Strategis</td>
  </tr>
  <tr>
	<td width="10%">3. Kepala Kantor Wilayah DJBC Bali, NTB, dan NTT</td>
  </tr>
  </table>
<p></p>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:10px;">
<tr>
<td>Kp. : KPP.MP.02/KPP.MP.0203/2017</td>
</tr>
</table>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="stck1-".$nock1a.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','Legal','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>