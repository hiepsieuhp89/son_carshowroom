<?php
	include_once("Model/DanhMuc.php");
	include_once("Model/LoaiXe.php");

	$danhmuc = new DanhMuc();
	$ls = new LoaiXe();
	$result = $danhmuc->LayDanhMuc();

	for ($i=0; $i < count($result); $i++) { 
		$result[$i]['DSLoaiSach'] = $ls->LayLoaiSachTheoDanhMuc($result[$i]['MADMS']);
	}

	include_once("View/DanhMuc/DanhMuc.php");
?>