<?php
function tanggal($tgl){
		$hari = date("D",$tgl);
		$bulan = date("m",$tgl);
		$hariEn = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
		$hariId = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
		$hariRep = str_replace($hariEn,$hariId,$hari); /*(dari apa,menjadi apa,apa yang akan diganti)*/
		$bulanEn = array("01","02","03","04","05","06","07","08","09","10","11","12");
		$bulanId = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$bulanRep = str_replace($bulanEn,$bulanId,$bulan); /*(dari apa,menjadi apa,apa yang akan diganti)*/
		echo date("d",$tgl) . " " . $bulanRep . " " . date("Y",$tgl);
}

?>