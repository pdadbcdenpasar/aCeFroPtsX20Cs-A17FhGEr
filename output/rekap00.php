
<?php
include_once("../../library/variabel.php");
include "../fungsi.php";
include_once("../tglindo.php");
include_once("../../library/koneksi.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>
<table align="center" border="0" style="font-family:Arial; font-size:15px;">
	<tr>
		<th align="center" >DATA PEMASUKAN, PENGELUARAN, DAN SISA PITA CUKAI MMEA</th>
	</tr>
	<tr>
		<th align="center" >KPPBC TIPE MADYA PABEAN A DENPASAR</th>
	</tr>
	<tr>
		<th align="center" style="font-family:Arial; font-size:12px;" >PERIODE : <?php if ($tglAkhir == "(NOW() )") { echo date('Y');}else{echo Tanggalindo(preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$fromdate)); echo " s.d "; echo Tanggalindo(preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$todate));}?></th>
	</tr>
</table>
<hr>
<p></p>
<table class="table table-striped" align="center" border="1" style="border-collapse:collapse; font-family:Arial; font-size:10px;">
<thead>
	<tr bgcolor=Lightskyblue>
		<th  rowspan="2" width = "5%" align="center">NO</th>
		<th  rowspan="2" width = "30%" align="center">NAMA PERUSAHAAN MMEA</th>
		<th  rowspan="2" width = "3%" align="center">GOL/ HJE</th>
		<th  rowspan="2" width = "3%" align="center">VOLUME (ml)</th>
		<th colspan="2" width = "23%" align="center">DP2C</th>
		<th colspan="3" width = "5%" align="center">SALDO PITA CUKAI TA <?php echo date('Y');?></th>
		<th colspan="3" width = "5%" align="center">REALISASI CK 1A <?php echo date('Y');?></th>
	</tr>
	<tr bgcolor=Lightskyblue>
		<th width = "8%" align="center">Lembar</th>
		<th width = "15%" align="center">Nilai (Rp.)</th>
		<th width = "8%" align="center">Lembar</th>
		<th width = "8%" align="center">Nilai (Rp.)</th>
		<th width = "8%" align="center">TOTAL NILAI CUKAI (Rp.)</th>
		<th width = "20%" align="center">Lembar</th>
		<th width = "50%" align="center">Nilai (Rp.)</th>
		<th width = "20%">TOTAL PENERIMAAN(Rp.)</th>
	</tr>
	<tr bgcolor=Lightskyblue>
		<th width = "8%" align="center">(1)</th>
		<th width = "8%" align="center">(2)</th>
		<th width = "15%" align="center">(3)</th>
		<th width = "8%" align="center">(4)</th>
		<th width = "8%" align="center">(5)</th>
		<th width = "15%" align="center">(6)</th>
		<th width = "8%" align="center">(7)</th>
		<th width = "8%" align="center">(8)</th>
		<th width = "8%" align="center">(9)</th>
		<th width = "20%" align="center">(10)</th>
		<th width = "50%" align="center">(11)</th>
		<th width = "20%" align="center">(12)</th>
	</tr>
</thead>
<?php 
//------ referensi target penerimaan mmea ---
$targetSql = "select * from target where flag = 1";
$targetQry = mysqli_query($server,$targetSql)  or die ("Query Tabel target salah : ".mysqli_error());
$target = mysqli_fetch_array($targetQry);

//------ referensi tarif golongan --------------------
include_once("../ref_tarif.php");
/*$GolASql = "select tarifKeping as tarif from tarif_pita where golongan = 'A'";
$GolAQry = mysqli_query($server,$GolASql)  or die ("Query Tabel GolASql salah : ".mysqli_error());
$GolA = mysqli_fetch_array($GolAQry);
$GolBSql = "select tarifKeping as tarif from tarif_pita where golongan = 'B'";
$GolBQry = mysqli_query($server,$GolBSql)  or die ("Query Tabel GolBSql salah : ".mysqli_error());
$GolB = mysqli_fetch_array($GolBQry);
$GolCSql = "select tarifKeping as tarif from tarif_pita where golongan = 'C'";
$GolCQry = mysqli_query($server,$GolCSql)  or die ("Query Tabel GolCSql salah : ".mysqli_error());
$GolC = mysqli_fetch_array($GolCQry);*/

//---------------------

							
$rekapDetailSql =  "SELECT b.*, ifnull(Jml_ck1a,0) as Jml_ck1a, Jml_dppc-ifnull(Jml_ck1a,0) as saldo, \n"
." CASE \n"
." WHEN Golongan = 'A' THEN (Volume/1000)*60*Jml_dppc*'".$GolA['tarif']."' \n"
." WHEN Golongan = 'B' THEN (Volume/1000)*60*Jml_dppc*'".$GolB['tarif']."' \n"
." WHEN Golongan = 'C' THEN (Volume/1000)*60*Jml_dppc*'".$GolC['tarif']."' \n"
." ELSE HJE*60*Jml_dppc*'".$GolH['tarif']."'/100 END AS nilai_dppc, \n"
." CASE \n"
." WHEN Golongan = 'A' THEN (Volume/1000)*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolA['tarif']."' \n"
." WHEN Golongan = 'B' THEN (Volume/1000)*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolB['tarif']."' \n"
." WHEN Golongan = 'C' THEN (Volume/1000)*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolC['tarif']."' \n"
." ELSE HJE*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolH['tarif']."'/100 END AS nilai_dppc_saldo,\n"
." CASE \n"
." WHEN Golongan = 'A' THEN (Volume/1000)*60*Jml_ck1a*'".$GolA['tarif']."' \n"
." WHEN Golongan = 'B' THEN (Volume/1000)*60*Jml_ck1a*'".$GolB['tarif']."' \n"
." WHEN Golongan = 'C' THEN (Volume/1000)*60*Jml_ck1a*'".$GolC['tarif']."' \n"
." ELSE HJE*60*Jml_ck1a*'".$GolH['tarif']."'/100 END AS nilai_ck1a \n"
." FROM ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan, dpita.HJE AS HJE,ifnull(sum(dppc.Jumlah),0) AS Jml_dppc \n"
." from (dpita left join dppc on((dpita.Kode = dppc.Kode))) \n"
." where Tanggal  between DATE".$tglAwal." and DATE".$tglAkhir." \n"
." group by dpita.Kode) b \n"
." LEFT JOIN \n"
." ( select dpita.Kode AS Kode,ifnull(sum(ck1a.Jumlah),0) AS Jml_ck1a \n"
." from (dpita left join ck1a on((dpita.Kode = ck1a.Kode)))\n" 
." where Tanggal  between DATE".$tglAwal." and DATE".$tglAkhir." \n"
." group by dpita.Kode ) a ON b.Kode = a.Kode";

$rekapDetailQry = mysqli_query($server,$rekapDetailSql)  or die ("Query rekapDetail salah : ".mysqli_error());
$nomor  = 1; 
$tglrekap = date('Y-m-d');
$perusahaan = "";
$sumsaldo = "";
$sumPenerimaan = "";
while ($rekapDetail = mysqli_fetch_array($rekapDetailQry)) {
	
?>
	<tr>
		<td align="center">
		<?php 
		if ($perusahaan != $rekapDetail['Nama_Perusahaan']){?>
			 <?php echo $nomor;?>
			<?php }else {
			$nomor--;?>
			<?php
			}?></td>
		<td>
		<?php 
		if ($perusahaan != $rekapDetail['Nama_Perusahaan']){?>
			<?php echo $rekapDetail['Nama_Perusahaan'];
			} 
			$perusahaan = $rekapDetail['Nama_Perusahaan'];?></td>
			<?php 
			$sumSaldoSQL = "SELECT b.*, a.*,  \n"
							." sum(CASE \n"
							." WHEN Golongan = 'A' THEN (Volume/1000)*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolA['tarif']."' \n"
							." WHEN Golongan = 'B' THEN (Volume/1000)*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolB['tarif']."' \n"
							." WHEN Golongan = 'C' THEN (Volume/1000)*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolC['tarif']."' \n"
							." ELSE HJE*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolH['tarif']."'/100 END) AS total_nilai_dppc_saldo, \n"
							." sum(CASE \n"
							." WHEN Golongan = 'A' THEN (Volume/1000)*60*Jml_ck1a*'".$GolA['tarif']."' \n"
							." WHEN Golongan = 'B' THEN (Volume/1000)*60*Jml_ck1a*'".$GolB['tarif']."' \n"
							." WHEN Golongan = 'C' THEN (Volume/1000)*60*Jml_ck1a*'".$GolC['tarif']."' \n"
							." ELSE HJE*60*Jml_ck1a*'".$GolH['tarif']."'/100 END) AS total_nilai_ck1a \n"
							." FROM ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan, dpita.HJE AS HJE,ifnull(sum(dppc.Jumlah),0) AS Jml_dppc \n"
							." from (dpita left join dppc on((dpita.Kode = dppc.Kode))) where dpita.Nama_Perusahaan='".$perusahaan."' \n"
							." and Tanggal  between DATE".$tglAwal." and DATE".$tglAkhir." \n"
							." group by dpita.Kode) b \n"
							." LEFT JOIN \n"
							." ( select dpita.Kode AS Kode,ifnull(sum(ck1a.Jumlah),0) AS Jml_ck1a \n"
							." from (dpita left join ck1a on((dpita.Kode = ck1a.Kode))) where dpita.Nama_Perusahaan='".$perusahaan."' \n"
							." and Tanggal  between DATE".$tglAwal." and DATE".$tglAkhir." \n"
							." group by dpita.Kode ) a ON b.Kode = a.Kode";
							
			$sumSaldoQry = mysqli_query($server,$sumSaldoSQL)  or die ("Query sumSaldo salah : ".mysqli_error());
			$sum_saldo = mysqli_fetch_array($sumSaldoQry);
			if ($rekapDetail['Golongan'] == "HPTL") {
			?>
			<td align="center"><?php echo format_rupiah($rekapDetail['HJE']);?></td>
			<?
			} else {
			?>
			<td align="center"><?php echo $rekapDetail['Golongan'];?></td>
			<?			
			}
			?>
					
		<td align="center"><?php echo $rekapDetail['Volume'];?></td>
		<td align="right"><?php echo $rekapDetail['Jml_dppc'];?></td>
		<td align="right"><?php echo format_rupiah($rekapDetail['nilai_dppc']);?></td> 
		<td align="right"><?php echo $rekapDetail['saldo'];?></td>
		<td align="right"><?php echo format_rupiah($rekapDetail['nilai_dppc_saldo']);?></td>
		
		<td align="right" style="background-color: Aliceblue; font-weight: bold; font-family:Arial; font-size:10px;">
		<?php 
		if ($sumsaldo != $sum_saldo['total_nilai_dppc_saldo']){?>
			<?php echo format_rupiah($sum_saldo['total_nilai_dppc_saldo']);?>
			<?php } 
			$sumsaldo = $sum_saldo['total_nilai_dppc_saldo'];?></td>
			
		<td align="right"><?php echo $rekapDetail['Jml_ck1a'];?></td>
		<td align="right"><?php echo format_rupiah($rekapDetail['nilai_ck1a']);?></td>
		
		<td align="right" style="background-color: Aliceblue; font-weight: bold; font-family:Arial; font-size:10px;">
		<?php
		if ($sumPenerimaan != $sum_saldo['total_nilai_ck1a']){?>
			<?php echo format_rupiah($sum_saldo['total_nilai_ck1a']);?>
			<?php } 
			$sumPenerimaan = $sum_saldo['total_nilai_ck1a'];?></td>
		
	</tr>
<?php 
$nomor++;}
$GrandSql = "SELECT sum(Jml_dppc-ifnull(Jml_ck1a,0)) as sm_saldo,sum(Jml_ck1a) as sm_ck1a, \n"
." sum(CASE \n"
." WHEN Golongan = 'A' THEN (Volume/1000)*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolA['tarif']."' \n"
." WHEN Golongan = 'B' THEN (Volume/1000)*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolB['tarif']."' \n"
." WHEN Golongan = 'C' THEN (Volume/1000)*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolC['tarif']."' \n"
." ELSE HJE*60*(Jml_dppc-ifnull(Jml_ck1a,0))*'".$GolH['tarif']."'/100 END) AS sm_nilai_dppc_saldo, \n"
." sum(CASE  \n"
." WHEN Golongan = 'A' THEN (Volume/1000)*60*Jml_ck1a*'".$GolA['tarif']."' \n"
." WHEN Golongan = 'B' THEN (Volume/1000)*60*Jml_ck1a*'".$GolB['tarif']."' \n"
." WHEN Golongan = 'C' THEN (Volume/1000)*60*Jml_ck1a*'".$GolC['tarif']."' \n"
." ELSE HJE*60*Jml_ck1a*'".$GolH['tarif']."'/100 END) AS sm_nilai_ck1a  \n"
." FROM ( select dpita.Kode AS Kode,dpita.Nama_Perusahaan AS Nama_Perusahaan,dpita.Volume AS Volume, dpita.Golongan AS Golongan, dpita.HJE AS HJE, ifnull(sum(dppc.Jumlah),0) AS Jml_dppc \n"
." from (dpita left join dppc on((dpita.Kode = dppc.Kode))) \n"
." where Tanggal  between DATE".$tglAwal." and DATE".$tglAkhir." \n"
." group by dpita.Kode) b \n"
." LEFT JOIN \n"
." ( select dpita.Kode AS Kode,ifnull(sum(ck1a.Jumlah),0) AS Jml_ck1a \n"
." from (dpita left join ck1a on((dpita.Kode = ck1a.Kode))) \n"
." where Tanggal  between DATE".$tglAwal." and DATE".$tglAkhir." \n"
." group by dpita.Kode ) a ON b.Kode = a.Kode ";
$GrandQry = mysqli_query($server,$GrandSql)  or die ("Query Grand v_pemasukan salah : ".mysqli_error());
$Grand = mysqli_fetch_array($GrandQry);			
			?>
	<tr style="background-color: Aliceblue; font-weight: bold; font-family:Arial; font-size:11px;">
	<td colspan="6" align="center"><?php echo "Jumlah";?></td>
	<td align="right"><?php echo format_rupiah($Grand['sm_saldo']);?></td>
	<td colspan="2" align="right"><?php echo format_rupiah($Grand['sm_nilai_dppc_saldo']);?></td>
	<td align="right"><?php echo format_rupiah($Grand['sm_ck1a']);?></td>
	<td align="right"><?php echo format_rupiah($Grand['sm_nilai_ck1a']);?></td>
	<td align="center"><?php echo number_format(($Grand['sm_nilai_ck1a']/($target['target'])*100),2);?>%</td>
	</tr>
</table>
<p></p>
<?php if ($pejabat!=""){?>
<table align="left" border="0" style="font-family:Arial; font-size:12px;">
	<tr>
		<td width="100"></td>
		<td width="600"></td>
		<td width="200">DENPASAR, <?php echo Tanggalindo($tglrekap);?></td>
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
<table align="left" border="0" style="font-family:Arial; font-size:12px;">
	<tr>
		<td width="100"></td>
		<td width="600"><?php echo $pejabat;?></td>
		<td width="200"><?php echo $pelaksana1;?></td>
	</tr>
	<tr>
		<td width="100"></td>
		<td width="600">NIP. <?php echo $nippej['NIP'];?></td>
		<td width="200">NIP. <?php echo $nippel1['NIP'];?></td>
	</tr>
</table>
<p></p>
<table align="left" border="0" style="font-family:Arial; font-size:12px;">
	<tr>
		<td width="100"></td>
		<td width="600"></td>
		<td width="200"><?php echo $pelaksana2;?></td>
	</tr>
	<tr>
		<td width="100"></td>
		<td width="600"></td>
		<td width="200">NIP. <?php echo $nippel2['NIP'];?></td>
	</tr>
</table>
<?php }?>
</body>