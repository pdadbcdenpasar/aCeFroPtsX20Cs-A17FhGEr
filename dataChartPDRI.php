<?php 
include 'config/connection.php';
include 'config/functions.php';

$totalpaj_Sql ="select sum(PPN_Imp) as ppn, sum(PPNBM) as ppnbm, sum(PPH_Imp) as pph, sum(Pajak_Rokok) as ppnht,sum(PPN_Imp+PPNBM+PPH_Imp+Pajak_Rokok) as pajak from data_billing where year(Tgl_Bayar) = year(curdate())";
$totalpaj_Qry = mysqli_query($con,$totalpaj_Sql)  or die ("Query Pajak Query salah : ".mysqli_error());

$result = array();

$totalPaj = mysqli_fetch_array($totalpaj_Qry);

$result = [
	nominal($totalPaj['ppn'],1), 
	nominal($totalPaj['ppnbm'],1), 
	nominal($totalPaj['pph'],1), 
	nominal($totalPaj['ppnht'],1), 
	"PPN Impor : ".nominal($totalPaj['ppn'],2)." ".nominal($totalPaj['ppn'],3), 
	"PPnBM : ".nominal($totalPaj['ppnbm'],2)." ".nominal($totalPaj['ppnbm'],3), 
	"PPH Impor : ".nominal($totalPaj['pph'],2)." ".nominal($totalPaj['pph'],3), 
	"PPN HT : ".nominal($totalPaj['ppnht'],2)." ".nominal($totalPaj['ppnht'],3)];

echo json_encode($result);

?>