<?php
$aksi = $_GET['aksi'];
$dok_penagihan_id = $_GET['id'];
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
	if ($aksi == 'stck1'){
		include(dirname(__FILE__).'/stck1.php');
	}elseif ($aksi == 'sp-stck'){
		include(dirname(__FILE__).'/sp-stck.php');
	}else{
		include(dirname(__FILE__).'/sppbp1.php');
	}
  /*      $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'Legal', 'fr', true, 'UTF-8', 3);
        //$html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('stck.pdf','F');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }*/
