<?php
// include "config.php";
if($_GET){
	if($_GET["aksi"] && $_GET["id"]){
		$del = "DELETE FROM ".$_GET["aksi"]." WHERE ".$_GET["aksi"]."_id='".$_GET["id"]."'";
		$delDb = mysqli_query($con,$del) or die("Error hapus data ".mysql_error());
		if($delDb){?>
			<meta http-equiv="refresh" content="0; url=?menu=list_<?php echo $_GET["aksi"];?>"><?php
		}
	}else{?>
			<button type="button" class="btn btn-warning WarningDelete"></button>

                <?php
	}
}
?>