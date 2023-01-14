<?php
include_once("../../library/koneksi.php");

$fromdate=$_POST['FromDate'];
$todate=$_POST['ToDate'];
if ($todate == ""){
	$tglAwal = "('".preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$fromdate)."')";
	$tglAkhir = "(NOW() )";
}elseif ($fromdate == ""){
	$tglAwal = "_FORMAT(NOW() ,'%Y-01-01')";
	$tglAkhir = "(NOW() )";
}else {
$tglAwal = "('".preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$fromdate)."')";
//$tglAwal = "_FORMAT(NOW() ,'%Y-01-01')";
$tglAkhir = "('".preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$todate)."')";	
}

$pejabat=$_POST['pejabat'];
$pelaksana1=$_POST['pelaksana1'];
$pelaksana2=$_POST['pelaksana2'];
$nippejSql = "select NAMA, NIP, PANGKAT, JABATAN from data_pegawai where nama ='".$pejabat."'";
$nippejQry = mysqli_query($server,$nippejSql)  or die ("Query Tabel Pegawai salah : ".mysqli_error());
$nippej = mysqli_fetch_array($nippejQry);
$nippel1Sql = "select NAMA, NIP, PANGKAT, JABATAN from data_pegawai where nama ='".$pelaksana1."'";
$nippel1Qry = mysqli_query($server,$nippel1Sql)  or die ("Query Tabel Pegawai salah : ".mysqli_error());
$nippel1 = mysqli_fetch_array($nippel1Qry);
$nippel2Sql = "select NAMA, NIP, PANGKAT, JABATAN from data_pegawai where nama ='".$pelaksana2."'";
$nippel2Qry = mysqli_query($server,$nippel2Sql)  or die ("Query Tabel Pegawai salah : ".mysqli_error());
$nippel2 = mysqli_fetch_array($nippel2Qry);

/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/rekap00.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'fr', true, 'UTF-8', 12);
        //$html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('rekap00.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }?>
