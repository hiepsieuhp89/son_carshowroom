<?php
	include_once("Model/KhachHang.php");
	include_once("Model/Xe.php");

	$kh = new KhachHang();
	$s = new Xe();

	$result_kh = $kh->LayKhachHang();
	$result_s = $s->LaySach();

	include_once("View/HoaDon/TaoMoi.php");
?>