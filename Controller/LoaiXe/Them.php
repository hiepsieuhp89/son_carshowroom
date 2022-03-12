<?php
	include_once("Model/LoaiXe.php");
	$ls = new LoaiXe();
	if(!empty($_GET['tenloai']))
	{
		$kq = $ls->ThemLoaiSach($_GET['tenloai']);
		include_once("View/LoaiXe/Them.php");
	}
?>