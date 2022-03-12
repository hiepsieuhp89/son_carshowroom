<?php
	if(isset($_GET['manxb']))
	{
		include_once("Model/Kho.php");
		$nxb = new Kho();
		$manxb = $_GET['manxb'];

		if(isset($_GET['tennxb']) && isset($_GET['diachi']))
		{
			if(isset($_GET['btnSua']))
			{
				$tennxb = $_GET['tennxb'];
				$diachi = $_GET['diachi'];
				$kq = $nxb->CapNhatKho($manxb, $tennxb, $diachi);
			}
		}
		else
		{
			$result = $nxb->LayKhoTheoMa($manxb);
			$tennxb = $result['TENNXB'];
			$diachi = $result['DIACHI'];
		}

		include_once("View/Kho/Sua.php");
	}
?>