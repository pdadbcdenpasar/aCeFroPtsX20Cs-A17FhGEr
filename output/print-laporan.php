<head>

    <!-- GLOBAL STYLES -->
   <!--<link rel="stylesheet" href="../css/bootstrap.css" />-->
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/theme.css" />
    <link rel="stylesheet" href="../css/MoneAdmin.css" />
    <link rel="stylesheet" href="../css/font-awesome.css" />
	<link rel="stylesheet" href="../css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
	<script type="text/javascript" src="../dist/sweetalert.min.js"></script>
    <!--END GLOBAL STYLES -->
	
	    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
include "../fungsi.php";
include_once("../tglindo.php");
$bln = $_GET['bln'];
$bln_title = getBulan($bln);
$tahun = $_GET['thn'];

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
	ob_get_clean();
    ob_start();

		include(dirname(__FILE__).'/rekap_bulanan_print.php');

        $content = ob_get_clean();

      // convert to PDF
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'fr', true, 'UTF-8', 12);
        //$html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('laporan00.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }?>