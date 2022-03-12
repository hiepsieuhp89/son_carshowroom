<?php
	if(!empty($_GET['manxb']))
	{
		include_once("Model/Kho.php");
		$nxb = new Kho();
		$kq = $nxb->XoaKho($_GET['manxb']);
	}

	include_once("View/Kho/Xoa.php");
?>