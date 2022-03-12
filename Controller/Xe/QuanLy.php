<?php
	include_once("Model/Xe.php");
	include_once("Model/DanhMuc.php");
	include_once("Model/LoaiXe.php");

	$sach = new Xe();
	$dms = new DanhMuc();
	$ls = new LoaiXe();

	$result_dms = $dms->LayDanhMuc();
	$result_ls = $ls->LayLoaiSach();

	$tensach = '';
	$dms_id = 0;
	$ls_id = 0;

	if(isset($_REQUEST['tensach']))
		$tensach = $_REQUEST['tensach'];

	if(isset($_REQUEST['madms']))
		$dms_id = $_REQUEST['madms'];

	if(isset($_REQUEST['maloai']))
		$ls_id = $_REQUEST['maloai'];

	$result = $sach->LaySachTheoTenDanhMucLoai($tensach, $dms_id, $ls_id);

	include_once("View/Xe/QuanLy.php");
?>