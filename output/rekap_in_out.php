<html>
<head>
<title>DATA PEMASUKAN, PENGELUARAN, DAN SISA PITA CUKAI MMEA</title>
<style type="text/css">
.bg {
    background: #eee;
}
.row-table {
    display: table;
    table-layout: fixed;
    width: 100%;
    height: 100%;
}
.col-table {
    display: table-cell;
    float: none;
    height: 100%;
}
.col-content {
    height: 100%;
    margin-top: 0;
    margin-bottom: 0;
}
</style>
</head>
<body>

<nobr><nowrap>

<table width = "1500" border ="0" style="border-collapse:collapse;">
<tr>
<th>DATA PEMASUKAN, PENGELUARAN, DAN SISA PITA CUKAI MMEA</th>
</tr>
<tr>
<th>KPPBC TIPE MADYA PABEAN A DENPASAR</th>
</tr>
</table>
<br>
<table width = "1500" border ="1" style="border-collapse:collapse;">
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
<tr>
<td><center><?php echo "1";?></center></td>
<td><center><?php echo "2";?></center></td>
<td><center><?php echo "3";?></center></td>
<td><center><?php echo "4";?></center></td>
<td><center><?php echo "5";?></center></td>
<td><center><?php echo "600.000.000.000";?></center></td>
<td><center><?php echo "7";?></center></td>
<td><center><?php echo "600.000.000.000";?></center></td>
<td><center><?php echo "600.000.000.000";?></center></td>
<td><center><?php echo "10";?></center></td>
<td><center><?php echo "600.000.000.000";?></center></td>
<td><center><?php echo "600.000.000.000";?></center></td>
</tr>
<?php 
include_once("../../library/koneksi.php");
$datapitaSql = "SELECT distinct(Nama_Perusahaan), Volume, Golongan FROM dpita ORDER BY Nama_Perusahaan";
$datapitaQry = mysqli_query($server,$datapitaSql)  or die ("Query v_stok salah : ".mysqli_error());
$nomor  = 0; 
while ($datapita = mysqli_fetch_array($datapitaQry)) {
$nomor++;?>
<tr>
<td><center><?php echo $nomor;?></center></td>
<td><?php 
$perusahaan = $datapita['Nama_Perusahaan'];
if ($perusahaan == $perusahaan){
	echo $perusahaan;
}else
	echo $perusahaan;?></td>
<td><center><?php echo $datapita['Golongan'];?></center></td>
<td><center><?php echo $datapita['Volume'];?></center></td>
<td><center><?php echo "5";?></center></td>
<td><center><?php echo "6";?></center></td>
<td><center><?php echo "7";?></center></td>
<td><center><?php echo "8";?></center></td>
<td><center><?php echo "9";?></center></td>
<td><center><?php echo "10";?></center></td>
<td><center><?php echo "11";?></center></td>
<td><center><?php echo "12";?></center></td>
</tr>
<?php }?>
</table>
<table width = "650" border ="0" style="border-collapse:collapse;">
<tr>
<td colspan="12"><center><?php echo "1";?></center></td>
</tr>
<tr>
<td colspan="10" border="0"></td>
<td colspan="2">Denpasar, 4 September 2017</td>
</tr>
<tr>
<td colspan="10">Mengetahui,</td>
<td colspan="2">Yang Melakukan Pencacahan</td>
</tr>
<tr>
<td colspan="10">Kepala Seksi Perbendaharaan,</td>
<td colspan="2">Pegawai Bea dan Cukai</td>
</tr>
<tr>
<td colspan="12"><center><?php echo "1";?></center></td>
</tr>
<tr>
<td colspan="12"><center><?php echo "1";?></center></td>
</tr>
<tr>
<td colspan="12"><center><?php echo "1";?></center></td>
</tr>
<tr>
<td colspan="12"><center><?php echo "1";?></center></td>
</tr>
<tr>
<td colspan="10">I Gede Ketut Galung Budi Adnyana</td>
<td colspan="2">Kadek Yogi Kardensiana</td>
</tr>
<tr>
<td colspan="10">NIP 19700909 199201 1 001</td>
<td colspan="2">NIP. 19920117 201210 1 002</td>
</tr>
<tr>
<td colspan="12"><center><?php echo "1";?></center></td>
</tr>
<tr>
<td colspan="12"><center><?php echo "1";?></center></td>
</tr>
<tr>
<td colspan="12"><center><?php echo "1";?></center></td>
</tr>
<tr>
<td colspan="12"><center><?php echo "1";?></center></td>
</tr>
<tr>
<td colspan="10"></td>
<td colspan="2">Nurul Putri Ratnasari</td>
</tr>
<tr>
<td colspan="10"></td>
<td colspan="2">NIP. 19960624 201512 2 001</td>
</tr>
</table>
</nowrap></nobr>
</body>
</html>
