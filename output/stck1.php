<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['Kode']; ?></title>
</head>
<body>
<?php
$tglsurat = date('Y-m');
/*$username = $_SESSION["user"];*/
include "../config.php";
include "../variabel.php";
include "../fungsi.php";
$em = mysqli_query($con,"select * from dok_penagihan where dok_penagihan_id='".$dok_penagihan_id."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
$data = mysqli_fetch_assoc($em);
?>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14.5px;">
	<tr>
		<th>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STCK-1</th>
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
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
    <tr>
    <td width="200">Yth.</td>
  </tr>
  <tr>
    <td width="200">Nama Penanggung Cukai</td>
	<td width="2">:</td>
    <td width="350"><?php echo $data['nama_perusahaan'];?></td>
  </tr>
  <tr>
    <td width="200">NPWP/ NPPBKC</td>
	<td width="2">:</td>
    <td width="350"><?php 
	$nppbkc = $data['nppbkc'];
	$npwp = $data['npwp'];
	$str_nppbkc = substr($nppbkc,0,4).".".substr($nppbkc,4,1).".".substr($nppbkc,5,1).".".substr($nppbkc,6,4); 
	$str_npwp = substr($npwp,0,2).".".substr($npwp,2,3).".".substr($npwp,5,3).".".substr($npwp,8,1)."-".substr($npwp,9,3).".".substr($npwp,12,3);
	if ($npwp == ""){echo $str_nppbkc;}elseif($nppbkc == ""){echo $str_npwp;}else {echo $str_npwp ."/". $str_nppbkc;}?></td>
  </tr>
    <tr>
    <td width="200">Alamat</td>
	<td width="2">:</td>
    <td rowspan="2" width="350"><?php echo $data['alamat'];?></td>
  </tr>
      <tr>
    <td height="5" width="200"></td>
	<td width="2"></td>
  </tr>
  </table>
<div style="border-collapse:collapse; line-height:0; font-family:Arial; font-size:14px; ">
<b><p style="line-height:1; text-align: center">SURAT TAGIHAN
NOMOR : S-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/WBC.13/KPP.MP.02/<?php echo date('Y');?></p></b>
</div>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px; padding-top: -5px;">
  <tr>
    <td width="100%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan hasil penelitian/pemeriksaan, dengan ini diberitahukan bahwa hingga saat ini Saudara masih mempunyai <s>utang cukai yang tidak dibayar pada waktunya, kekurangan cukai, dan/atau</s> sanksi administrasi berupa denda sebagaimana dimaksud dalam :</td>
</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
  <tr>
    <td width="220">Dokumen</td>
	<td width="2">:</td>
    <td width="500"><?php echo $data['dok_asal'];?></td>
  </tr>
  <tr>
    <td width="220">Nomor dan tanggal dokumen</td>
	<td width="2">:</td>
    <td width="500"><?php echo $data['no_dok_asal']; echo " tanggal "; echo Tanggalindo(preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$data['tgl_dok_asal']));?></td>
  </tr>
    <tr>
    <td width="220">Tanggal terakhir pembayaran</td>
	<td width="2">:</td>
    <td width="500"><b>30 hari sejak tanggal diterima surat tagihan</b></td>
  </tr>
  </table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px; padding-top: 0px;">
<tr>
<td>Sehingga ditetapkan adanya tagihan yang harus Saudara lunasi dengan rincian sebagai berikut :</td>
</tr>
</table>
  <table align="left" border="1" style="border-collapse:collapse; font-family:Arial; font-size:13px; padding-top: -10px;">
	<tr bgcolor=#F0F8FF>
		<th align="center" width="330">&nbsp;&nbsp;Jenis Tagihan&nbsp;&nbsp;</th>
		<th align="center" width="330">&nbsp;&nbsp;Jumlah Tagihan&nbsp;&nbsp;
		(Rp.)</th>
	</tr>
	<tr>
		<td align="left">&nbsp;&nbsp;Cukai</td>
		<td align="right">  <?php echo format_rupiah(($data['ck_ht']+$data['ck_ea']+$data['ck_mmea']));?>,00</td>
	</tr>
	<tr>
		<td align="left">&nbsp;&nbsp;Sanksi Administrasi Berupa Denda</td>
		<td align="right"> <?php echo format_rupiah($data['da_ck']);?>,00</td>
	</tr>
	</table>
	<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px; padding-top: -10px;">
	<tr>
		<td align="right" width="330">Jumlah</td>
		<td align="right" width="330">  <?php echo format_rupiah($data['tagihan']);?>,00</td>
	</tr>
	<tr>
		<td colspan=2 align="right" width="330">(<?php echo terbilang($data['tagihan'],3); ?> Rupiah)</td>
	</tr>
	</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px; padding-top: -10px;">
  <tr>
    <td width="100%" align="justify">Uraian terjadinya tagihan :
	<?php echo $data['uraian'];?></td>
</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px; padding-top: -10px;">
<tr>
<td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Untuk mencegah tindakan lebih lanjut sesuai ketentuan perundang-undangan, diminta kepada Saudara untuk membayar tagihan tersebut diatas <b>paling lama 30 (tiga puluh) hari sejak tanggal Surat Tagihan ini </b>diterima dan bukti pembayaran agar disampaikan kepada Kepala Kantor Pengawasan dan Pelayanan Bea dan Cukai Tipe Madya Pabean A Denpasar.</td>
</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px; padding-top: -10px;">
<tr>
<td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Keberatan atas Surat Tagihan ini diajukan secara tertulis kepada Direktur Jenderal Bea dan Cukai melalui kantor tersebut diatas sebelum tanggal jatuh tempo dengan ketentuan sebelumnya sudah menyerahkan jaminan sebesar tagihan utang.</td>
</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px; padding-top: -10px;">
<tr>
<td align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tagihan utang yang tidak dibayar pada waktunya dikenai bunga sebesar 2% (dua persen) dari jumlah tagihan yang terutang, bagian bulan dihitung satu bulan penuh, untuk paling lama 24 (dua puluh empat) bulan.</td>
</tr>
</table>
<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
	<tr>
		<td width="300"></td>
		<td width="300">Ditetapkan di &nbsp;&nbsp;: DENPASAR</td>
	</tr>
	<tr>
		<td width="300"></td>		
		<td width="300">Pada Tanggal :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo Tanggalindo($tglsurat);?></td>
	</tr>
	<tr>
		<td width="200" align="right"><?php echo $data['pre_jabatan'];?></td>
		<td width="200"><?php echo $data['jabatan'];?></td>
	</tr>
</table>
<p></p>
<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
	<tr>
		<td width="300"><?php echo $data['pejabat'];?></td>
	</tr>
<?php $np = mysqli_query($con,"select NIP from data_pegawai where NAMA='".$data['pejabat']."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
	  $nip = mysqli_fetch_assoc($np);	?>
	<tr>
		<td width="300">NIP.<?php echo $nip['NIP'];?></td>
	</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px; padding-top: -10px;">
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
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px; padding-top: 15px;">
<tr>
<td>Kp. : KPP.MP.02/KPP.MP.0203/PN28/<?php echo date('Y');?></td>
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
 require_once('..\vendor\autoload.php');
 use Spipu\Html2Pdf\Html2Pdf;
 try
 {
  $html2pdf = new Html2Pdf('P','Legal','en', false, 'ISO-8859-15',array(15, 0, 20, -50));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>