
<html>
<head>
<title>D:\uploadedFiles\e89f863d75136d3b919056e24970487-8d9d65a0883bced\p1bof95fte1cc0gufh6h1uhb16k94.doc</title>
<style type="text/css">
<!--
body { font-family: Arial; font-size: 20.1px }
.pos { position: absolute; z-index: 0; left: 0px; top: 0px }
-->
</style>

</head>
<body>
<?php

session_start();
$nock1a = $_SESSION["no_ck1a"];
$tglck1a = $_SESSION["tgl_ck1a"];
$petugas = $_SESSION["petugas"];
$penerima = $_SESSION["penerima"];
$keterangan = $_SESSION["keterangan"];
$nip = $_SESSION["nip"];
$tglambil = date('Y-m-d');
/*$username = $_SESSION["user"];*/
include_once("config.php");
include_once("variabel.php");
include "fungsi.php";
// include_once("../tglindo.php");
$em = mysqli_query($con,"select * from ck1a where No_CK1A='".$nock1a."' and Tanggal='".$tglck1a."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
$data = mysqli_fetch_assoc($em);

?>
<nobr><nowrap>
<img name="_1170:827" src="bgtandaterimack1a.jpg" height="1170" width="827" border="0" usemap="#Map"></div>
<div class="pos" id="_0:0" style="top:0">
<div class="pos" id="_255:38" style="top:38;left:255">
<span id="_13.9" style=" font-family:Arial; font-size:13.9px; color:#000000">
Nomor : FORM-02/WBC.12/KPP.MP.0203/2017</span>
</div>
<div class="pos" id="_570:38" style="top:38;left:570">
<span id="_15.0" style=" font-family:Arial; font-size:15.0px; color:#000000">
Tanggal : </span>
</div>
<div class="pos" id="_255:57" style="top:57;left:255">
<span id="_15.0" style=" font-family:Arial; font-size:15.0px; color:#000000">
Revisi :</span>
</div>
<div class="pos" id="_570:57" style="top:57;left:570">
<span id="_15.0" style=" font-family:Arial; font-size:15.0px; color:#000000">
Tanggal :</span>
</div>
<div class="pos" id="_100:162" style="top:162;left:100">
<span id="_13.4" style="font-weight:bold; font-family:Arial; font-size:15px; color:#000000">
KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</span>
</div>
<div class="pos" id="_100:181" style="top:181;left:100">
<span id="_13.4" style="font-weight:bold; font-family:Arial; font-size:15px; color:#000000">
DIREKTORAT JENDERAL BEA DAN CUKAI</span>
</div>
<div class="pos" id="_100:199" style="top:199;left:100">
<span id="_13.4" style="font-weight:bold; font-family:Arial; font-size:15px; color:#000000">
KPPBC TMP A DENPASAR</span>
</div>
<div class="pos" id="_311:324" style="top:324;left:311">
<span id="_13.4" style="font-weight:bold; font-family:Arial; font-size:15px; color:#000000">
<u>TANDA TERIMA PITA CUKAI MMEA</u></span>
</div>
<div class="pos" id="_125:395" style="top:395;left:125">
<span id="_14.1" style=" font-family:Arial; font-size:15px; color:#000000">
1. Nama Penerima Pita Cukai</span>
</div>
<div class="pos" id="_349:395" style="top:395;left:349">
<span id="_14.1" style=" font-family:Arial; font-size:15px; color:#000000">
: <?php echo $penerima;?></span>
</div>
<div class="pos" id="_125:416" style="top:416;left:125">
<span id="_14.1" style=" font-family:Arial; font-size:15px; color:#000000">
2. Nama Perusahaan</span>
</div>
<div class="pos" id="_349:416" style="top:416;left:349">
<span id="_13.3" style=" font-family:Arial; font-size:15px; color:#000000">
: <?php echo $data["Nama_Perusahaan"];?></span>
</div>
<div class="pos" id="_125:438" style="top:438;left:125">
<span id="_13.9" style=" font-family:Arial; font-size:15px; color:#000000">
3. Nomor CK-1A</span>
</div>
<div class="pos" id="_349:438" style="top:438;left:349">
<span id="_15.0" style=" font-family:Arial; font-size:15px; color:#000000">
: <?php echo $nock1a; ?></span>
</div>
<div class="pos" id="_125:459" style="top:459;left:125">
<span id="_13.8" style=" font-family:Arial; font-size:15px; color:#000000">
4. Tanggal CK-1A</span>
</div>
<div class="pos" id="_349:459" style="top:459;left:349">
<span id="_14.6" style=" font-family:Arial; font-size:15px; color:#000000">
: <?php echo Tanggalindo($data["Tanggal"]);?></span>
</div>
<div class="pos" id="_125:494" style="top:494;left:125">
<span id="_14.6" style=" font-family:Arial; font-size:15px; color:#000000">
Pada hari ini telah diterima dengan sebenarnya pita cukai MMEA dengan rincian sebagai berikut :</span>

<br>
<table width = "650" border ="1" style="border-collapse:collapse;">
<tr bgcolor=#F0F8FF>
<th>Golongan</th>
<th>Tarif/ liter</th>
<th>Isi (ml.)</th>
<th>V</th>
<th>Keterangan</th>
</tr>
<?php
$em3 = mysqli_query($con,"select sum(Jumlah) as jumlah from ck1a where No_CK1A='".$nock1a."' and Tanggal='".$tglck1a."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
$jumlah = mysqli_fetch_array($em3);
$em2 = mysqli_query($con,"select * from ck1a where No_CK1A='".$nock1a."' and Tanggal='".$tglck1a."'") or die ("Data Tidak Ditemukan !! ".mysqli_error());
while ($data2 = mysqli_fetch_array($em2)) {
$nomor  = 0; 
$nomor++;
?>
<tr>
<td><center><?php echo $data2['Golongan'];?></center></td>
<?php if ($data2['Golongan'] == "A"){?>
<td><center><?php echo "27.500";?></center></td>
<?php }elseif ($data2['Golongan'] == "B"){?>
<td><center><?php echo "33.000";?></center></td>
<?php }else {?>
<td><center><?php echo "80.000";?></center></td>
<?php }?>
<td><center><?php echo $data2['Volume'];?></center></td>
<td><center><?php echo $data2['Jumlah'];?></center></td>
<td><?php ?></td>
</tr>
				<?php }?>
<tr>
<th colspan="3" align="center"> Jumlah</th>
<td><center><?php echo $jumlah['jumlah']; ?></center></td>
<td></td>
</tr>

</table>
<div class="pos" id="_125:886" style="top:300;left:5">
<span id="_13.1" style=" font-family:Arial; font-size:15px; color:#000000">
PETUGAS PENYERAHAN PC</span>
</div>
<div class="pos" id="_499:886" style="top:300;left:400">
<span id="_15.0" style=" font-family:Arial; font-size:15px; color:#000000">
DENPASAR,</span>
</div>
<div class="pos" id="_602:886" style="top:300;left:500">
<span id="_14.1" style=" font-family:Arial; font-size:15px; color:#000000">
<?php echo Tanggalindo($tglambil);?></span>
</div>
<div class="pos" id="_124:1027" style="top:420;left:5">
<span id="_13.6" style=" font-family:Arial; font-size:15px; color:#000000">
<?php echo $petugas;?></span>
</div>
<div class="pos" id="_499:1027" style="top:420;left:400">
<span id="_14.1" style=" font-family:Arial; font-size:15px; color:#000000">
<?php echo $penerima;?></span>
</div>
<div class="pos" id="_124:1046" style="top:440;left:5">
<span id="_14.1" style=" font-family:Arial; font-size:15px; color:#000000">
<?php echo $nip;?></span>
</div>
</div>
</div>
</nowrap></nobr>
</body>
</html>

