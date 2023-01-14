
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
</table>
<p></p>
<table class="table table-striped" align="left" border="1" style="border-collapse:collapse; font-family:Arial; font-size:9px;">
<thead>
	<tr bgcolor=Aliceblue>
		<th  rowspan="2" align="center">NO</th>
		<th  rowspan="2" align="center">NAMA PERUSAHAAN MMEA</th>
		<th  rowspan="2" align="center">GOL.</th>
		<th  rowspan="2" align="center">VOLUME (ml)</th>
		<th colspan="5" align="center">DETAIL  PITA CUKAI TA 2017</th>
		<th colspan="3" align="center">REALISASI CK 1A 2017</th>
	</tr>
	<tr bgcolor=Aliceblue>
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
$targetSql = "select * from target where flag = 1";
$targetQry = mysqli_query($server,$targetSql)  or die ("Query Tabel target salah : ".mysqli_error());
$target = mysqli_fetch_array($targetQry);
							
$rekapDetailSql =  "SELECT distinct(v_pemasukan.Nama_Perusahaan) as nm_perusahaan, v_pemasukan.Volume as vol, v_pemasukan.Golongan as gol, v_pemasukan.Jml_dppc as j_dppc, \n"
    . "v_pemasukan.saldo as saldo, sum(v_pemasukan.saldo) as sum_saldo,v_pemasukan.jml_tarif_masuk as nilai_dppc, v_pemasukan.jml_tarif_saldo as nilai_saldo, sum(v_pemasukan.jml_tarif_saldo) as sum_nilai_saldo, v_pengeluaran.Jml_ck1a as j_ck1a, sum(v_pengeluaran.Jml_ck1a) as sum_ck1a,\n"
    . "v_pengeluaran.jml_tarif_keluar as nilai_ck1a, sum(v_pengeluaran.jml_tarif_keluar) as sum_nilai_ck1a from (v_pemasukan left join v_pengeluaran on((v_pemasukan.kode= v_pengeluaran.kode))) group by v_pemasukan.kode";
$rekapDetailQry = mysqli_query($server,$rekapDetailSql)  or die ("Query v_pemasukan salah : ".mysqli_error());
$nomor  = 1; 
$tglrekap = date('Y-m-d');
$perusahaan = "";
//$sum_saldo = "";
$sumsaldo = "";
$sumPenerimaan = "";
while ($rekapDetail = mysqli_fetch_array($rekapDetailQry)) {
	
?>
	<tr>
		<td align="center">
		<?php 
		if ($perusahaan != $rekapDetail['nm_perusahaan']){?>
			 <?php echo $nomor;?>
			<?php }else {
			$nomor--;?>
			<?php
			}?></td>
		<td>
		<?php 
		if ($perusahaan != $rekapDetail['nm_perusahaan']){?>
			<?php echo $rekapDetail['nm_perusahaan'];
			} 
			$perusahaan = $rekapDetail['nm_perusahaan'];?></td>
			<?php 
			$sumSaldoSQL = "select sum(jml_tarif_saldo) as sum_saldo from v_pemasukan where Nama_Perusahaan='".$perusahaan."'";
			$sumSaldoQry = mysqli_query($server,$sumSaldoSQL)  or die ("Query sum v_pemasukan salah : ".mysqli_error());
			$sum_saldo = mysqli_fetch_array($sumSaldoQry);
			$sumPenerimaanSQL = "select sum(jml_tarif_keluar) as sum_penerimaan from v_pengeluaran where Nama_Perusahaan='".$perusahaan."'";
			$sumPenerimaanQry = mysqli_query($server,$sumPenerimaanSQL)  or die ("Query sumPenerimaan v_pemasukan salah : ".mysqli_error());
			$sum_penerimaan = mysqli_fetch_array($sumPenerimaanQry);
			?>
					
		<td align="center"><?php echo $rekapDetail['gol'];?></td>
		<td align="center"><?php echo $rekapDetail['vol'];?></td>
		<td align="right"><?php echo $rekapDetail['j_dppc'];?></td>
		<td align="right"><?php echo format_rupiah($rekapDetail['nilai_dppc']);?></td>
		<td align="right"><?php echo $rekapDetail['saldo'];?></td>
		<td align="right"><?php echo format_rupiah($rekapDetail['nilai_saldo']);?></td>
		
		<td align="right" style="background-color: Lightskyblue; font-weight: bold; font-family:Arial; font-size:10px;">
		<?php 
		if ($sumsaldo != $sum_saldo['sum_saldo']){?>
			<?php echo format_rupiah($sum_saldo['sum_saldo']);?>
			<?php } 
			$sumsaldo = $sum_saldo['sum_saldo'];?></td>
			
		<td align="right"><?php echo $rekapDetail['j_ck1a'];?></td>
		<td align="right"><?php echo format_rupiah($rekapDetail['nilai_ck1a']);?></td>
		
		<td align="right" style="background-color: Lightskyblue; font-weight: bold; font-family:Arial; font-size:10px;">
		<?php
		if ($sumPenerimaan != $sum_penerimaan['sum_penerimaan']){?>
			<?php echo format_rupiah($sum_penerimaan['sum_penerimaan']);?>
			<?php } 
			$sumPenerimaan = $sum_penerimaan['sum_penerimaan'];?></td>
		
	</tr>
<?php 
$nomor++;}
$GrandSql = "SELECT distinct(v_pemasukan.Nama_Perusahaan) as nm_perusahaan, sum(v_pemasukan.Volume) as sum_vol, \n"
    . " sum(v_pemasukan.saldo) as sum_saldo, sum(v_pemasukan.jml_tarif_saldo) as sum_nilai_saldo, sum(v_pengeluaran.Jml_ck1a) as sum_ck1a,\n"
    . " sum(v_pengeluaran.jml_tarif_keluar) as sum_nilai_ck1a from (v_pemasukan left join v_pengeluaran on((v_pemasukan.kode = v_pengeluaran.kode))) ";
$GrandQry = mysqli_query($server,$GrandSql)  or die ("Query Grand v_pemasukan salah : ".mysqli_error());
$Grand = mysqli_fetch_array($GrandQry);			
			?>
	<tr style="background-color: Lightskyblue; font-weight: bold; font-family:Arial; font-size:11px;">
	<td colspan="6" align="center"><?php echo "Jumlah";?></td>
	<td align="right"><?php echo format_rupiah($Grand['sum_saldo']);?></td>
	<td colspan="2" align="right"><?php echo format_rupiah($Grand['sum_nilai_saldo']);?></td>
	<td align="right"><?php echo format_rupiah($Grand['sum_ck1a']);?></td>
	<td align="right"><?php echo format_rupiah($Grand['sum_nilai_ck1a']);?></td>
	<td align="center"><?php echo number_format(($Grand['sum_nilai_ck1a']/($target['target'])*100),2);?>%</td>
	</tr>
</table>
<p></p>
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
<table align="left" border="0" style="font-family:Arial; font-size:12px;">
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