<?php
	if(!empty($_GET['maloai']))
	{
		include_once("Model/LoaiXe.php");
		$dms = new LoaiXe();
		$kq = $dms->XoaLoaiSach($_GET['maloai']);
	}

	include_once("View/LoaiXe/Xoa.php");
?>