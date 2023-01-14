<?php
$tgl1 = $_POST["FromDate"];
$tgl2 = $_POST["ToDate"];;
$tglFromDate = preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$tgl1);
$tglToDate = preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","$3-$2-$1",$tgl2);

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
        $html2pdf = new HTML2PDF('L', 'A4', 'fr', true, 'UTF-8', 3);
        //$html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('rekap00.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }?>
