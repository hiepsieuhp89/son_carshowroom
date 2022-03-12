<?php
	include_once("Model/DanhMuc.php");
	include_once("Model/LoaiXe.php");
	include_once("Model/NhaPhanPhoi.php");
	include_once("Model/Kho.php");

	$dms = new DanhMuc();
	$list_dms = $dms->LayDanhMuc();

	$ls = new LoaiXe();
	$list_ls = $ls->LayLoaiSach();

	$tg = new NhaPhanPhoi();
	$list_tg = $tg->LayTacGia();

	$nxb = new Kho();
	$list_nxb = $nxb->LayKho();

	include_once("View/Xe/TaoMoi.php");
?>