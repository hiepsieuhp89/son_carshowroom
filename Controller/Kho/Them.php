<?php
	include_once("Model/Kho.php");
	$nxb = new Kho();
	if(!empty($_GET['tennxb']))
	{
		$kq = $nxb->ThemKho($_GET['tennxb'], $_GET['diachi']);
		include_once("View/Kho/Them.php");
	}
?>