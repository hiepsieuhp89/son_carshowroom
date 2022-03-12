<?php
	include_once("Model/Xe.php");

	include_once("Model/DanhMuc.php");

	$sach = new Xe();
	$dms = new DanhMuc();

	$result_dms = $dms->LayDanhMuc();

	for ($i=0; $i < count($result_dms); $i++) { 
		$result_dms[$i]['xe'] = $sach->LaySachTheoDanhMucLimit($result_dms[$i]['MADMS']);
	}

	include_once("View/Xe/Sach_Top.php");
?>