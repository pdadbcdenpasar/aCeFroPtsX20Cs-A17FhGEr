<?php
include_once("../../library/koneksi.php");
$sql = "SELECT * FROM v_saldopita ORDER BY Kode";
    $q_sql = mysqli_query($server,$sql) or die("Query v_pemasukan salah : ".mysqli_error());
	$no = 1;
    $dsn = "";
?>
<table class="table table-bordered" style="font-size: 11px;">
   <tbody>
      <tr style="text-align: center; font-weight: bold">
         <td>No</td>
         <td>Nama Perusahaan</td>
         <td>Volume</td>
         <td>Golongan</td>
         <td>saldo</td>
      </tr>
      <?php
      while ($dt = mysqli_fetch_assoc($q_sql)) {
      ?>
      <tr align="left">
         <td>
         <?php
         if ($dsn != $dt['Nama_Perusahaan']) {
            echo $no;
         } else {
            $no--;
         }
         ?>
         </td>
         <td  style="text-align:left;"><?php
         if ($dsn != $dt['Nama_Perusahaan']) {
            echo $dt['Nama_Perusahaan'];
         }
            $dsn = $dt['Nama_Perusahaan'];
         ?>
         </td>
         <td><?php echo $dt['Volume']; ?></td>
         <td><?php echo $dt['Golongan']; ?></td>
         <td><?php echo $dt['saldo']; ?></td>
      </tr>
      <?php
      $no++;
      }
      ?>
    </tbody>
</table>