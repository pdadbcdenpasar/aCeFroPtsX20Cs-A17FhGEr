<?php

include "session.php";

if(isset($_GET['badan'])){

$badan = $_GET['badan'];

}

else{

	$badan='main-content';

}

include "fungsi.php";
include "top-bar.php";

include "side-bar.php";
include "variabel.php";

// printCK1A();
$success = include $badan.".php";

// if (!$success) {
//     echo "<script>document.location.href='home.php?badan=404'</script>\n";
// }

include "footer.php";

?>