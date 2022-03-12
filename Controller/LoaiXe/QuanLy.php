<?php
	include_once("Model/LoaiXe.php");
	$ls = new LoaiXe();
	$result = $ls->LayLoaiSach();
	include_once("View/LoaiXe/QuanLy.php");
?>