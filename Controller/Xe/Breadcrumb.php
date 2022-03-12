<?php
	if(!isset($_REQUEST['btnTimKiem']))
	{
		include_once("Model/DanhMuc.php");
		include_once("Model/LoaiXe.php");
		include_once("Model/Xe.php");

		if(isset($_GET["madms"]) && $_GET["madms"] > 0)
		{
			$dms = new DanhMuc();
			$result_dms = $dms->LayDanhMucTheoMa($_GET['madms']);
		}

		if(isset($_GET["maloai"]))
		{
			$ls = new LoaiXe();
			$result_ls = $ls->LayLoaiSachTheoMa($_GET['maloai']);
		}

		if(isset($_GET["masach"]))
		{
			$s = new Xe();
			$result = $s->LaySachTheoMa($_GET["masach"]);
			$tensach = $result['TENXE'];
		}
	}
	else
	{
		$timkiem = true;
	}

	include_once("View/Xe/Breadcrumb.php");
?>