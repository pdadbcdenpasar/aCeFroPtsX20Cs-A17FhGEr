<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['Kode']; ?></title>
</head>
<body>
<?php
$tglsurat = date('Y-m');
/*$username = $_SESSION["user"];*/
include_once("../../library/koneksi.php");
include_once("../../library/variabel.php");
include "../fungsi.php";
include_once("../tglindo.php");
$em = mysqli_query($server,"select * from dok_penagihan where dok_penagihan_id='".$dok_penagihan_id."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
$data = mysqli_fetch_assoc($em);
$tgl_dok = $data['tgl_dok'];
?>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:13px;">
	<tr>
		<th rowspan="7" width="50"><img src="logo.jpg" alt="Logo Kemenkeu"></th>
		<th align="center" width="500" style="font-family:Arial; font-size:17px;">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</th>
	</tr>
	<tr>
		<th align="center" style="font-family:Arial; font-size:14px;">DIREKTORAT JENDERAL BEA DAN CUKAI</th>
	</tr>
	<tr>
		<th align="center" style="font-family:Arial; font-size:14px;">KANTOR WILAYAH DJBC BALI, NTB, DAN NTT</th>
	</tr>
	<tr>
		<th align="center" style="font-family:Arial; font-size:17px;">KPPBC TIPE MADYA PABEAN A DENPASAR</th>
	</tr>
	<tr>
		<td align="center" style="font-family:Arial; font-size:9px; padding-top: 10px;">JALAN RAYA TUKAD BADUNG, DENPASAR-BALI 80223</td>
	</tr>
	<tr>
		<td align="center" style="font-family:Arial; font-size:9px;">TELEPON ( 0361) 720437; FAXIMILE (0361) 723806; SUREL :bcmadyadenpasar@yahoo.co.id</td>
	</tr>
	<tr>
		<td align="center" style="font-family:Arial; font-size:9px;">PUSAT KONTAK LAYANAN 1500225 SURAT ELEKTRONIK :infocustoms.go.id</td>
	</tr>
</table>
<table>
<td width="630" align="center" style="font-family:Arial; font-size:9px; padding-top: -10px;"><hr></td>
</table>
<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
	<tr>
		<td><?php echo Tanggalindo($tglsurat);?></td>
	</tr>
</table>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
  <tr>
    <td width="30">Yth.</td>
	<td width="500">Pimpinan <?php echo $data['nama_perusahaan'];?></td>
 </tr>
  <tr>
	<td></td>
	<td width="500"><?php echo $data['alamat'];?></td>
  </tr>
  </table>
<div style="border-collapse:collapse; line-height:0; font-family:Arial; font-size:13px; ">
<b><p style="line-height:1; text-align: center"><u>S U R A T&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P E N G A N T A R</u>
Nomor : SP-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/WBC.13/KPP.MP.02/<?php echo date('Y'); ?></p></b>
</div>

 <table align="left" border="1" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
	<tr bgcolor=#F0F8FF>
		<th align="center" width="50">
		&nbsp;&nbsp;No.&nbsp;&nbsp;
		
		</th>
		<th align="center" width="220">
		&nbsp;&nbsp;Jenis Berkas yang Dikirim&nbsp;&nbsp;
		
		</th>
		<th align="center" width="100">
		&nbsp;&nbsp;Banyaknya&nbsp;&nbsp;
		
		</th>
		<th align="center" width="250">
		&nbsp;&nbsp;Keterangan&nbsp;&nbsp;
		
		</th>
	</tr>
	<tr>
		<td align="center" valign="top" width="30" style="font-family:Arial; font-size:14px; padding-top: 15px;">&nbsp;&nbsp;1&nbsp;&nbsp;</td>
		<td valign="top" width="230" style="font-family:Arial; font-size:14px; padding-top: 15px;"><?php if ($data['jns_dok']=="STCK-1"){echo "Surat Tagihan Cukai (STCK-1)";} if ($data['jns_dok']=="SPPBP"){echo "Surat Pemberitahuan dan Penagihan Biaya Pengganti(SPPBP) ";}?>Nomor: S-<?php echo $data['no_dok'] . $data['post_no_dok'];?> Tanggal <?php echo Tanggalindo($tgl_dok);?>&nbsp;&nbsp;</td>
		<td align="center" valign="top" width="100" style="font-family:Arial; font-size:14px; padding-top: 15px;">&nbsp;&nbsp;1 (satu) 
		&nbsp;&nbsp;berkas&nbsp;&nbsp;</td>
		<td	align="justify" width="250" style="font-family:Arial; font-size:14px; padding-top: 15px;">Disampaikan dengan hormat sesuai dengan <?php if ($data['jns_dok']=="STCK-1"){echo "PMK-111/PMK.04/2013";} if ($data['jns_dok']=="SPPBP"){echo "PER-45/BC/2016";}?>, diminta kepada Saudara untuk membayar tagihan tersebut paling lama 30 (tiga puluh) hari sejak tanggal Surat Tagihan ini <?php if ($data['jns_dok']=="STCK-1"){echo " diterima ";} if ($data['jns_dok']=="SPPBP"){echo "";}?> dan bukti pembayaran agar disampaikan kepada Kepala Kantor Pengawasan dan Pelayanan Bea dan Cukai Tipe Madya Pabean A Denpasar&nbsp;&nbsp;
		
		
		</td>
	</tr>
	</table>
	
	<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
	<tr>
		<td width="300">Diterima tanggal : .....................................</td>
		<td width="300"></td>
	</tr>
	<?php $np = mysqli_query($server,"select NAMA, NIP from data_pegawai where JABATAN='Kepala Seksi Perbendaharaan'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
		  $nip = mysqli_fetch_assoc($np);	
		  ?>
	<tr>
		<td width="300"></td>		
		<td width="300">Kepala Kantor</td>
	</tr>
	<tr>
		<td width="300"></td>		
		<td width="300">u.b.</td>
	</tr>
	<tr>
		<td width="300">Penerima,</td>		
		<td width="300">Kepala Seksi Perbendaharaan</td>
	</tr>
</table>
<p></p>
<table align="right" border="0" style="border-collapse:collapse; font-family:Arial; font-size:14px;">
	<tr>
		<td width="300">.....................................</td>		
		<td width="300"><?php echo $nip['NAMA'];?></td>
	</tr>
	<tr>
		<td width="300"></td>		
		<td width="300">NIP. <?php echo $nip['NIP'];?></td>
	</tr>
</table>
	<br>
<table>
	<tr>
		<td width="150">Nomor Telepon</td>		
		<td width="5">:</td>
	</tr>
	<tr>
		<td width="150">Nomor Faksimile</td>		
		<td width="5">:</td>
	</tr>
</table>
<p></p>
<p></p>
<p></p>
<table align="left" border="0" style="border-collapse:collapse; font-family:Arial; font-size:12px;">
<tr>
<<td>Kp. : KPP.MP.02/KPP.MP.0203/PN28/<?php echo date('Y');?></td>
</tr>
</table>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="stck1-".$dok_penagihan_id.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(25, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
  
  /*Header("Content-type: application/pdf"); 
  Header("Content-Disposition: attachment; filename=$filename"); 
  readfile("$filename");
  unlink($filename);*/
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>