<?php
	include_once("Model/Kho.php");
	$nxb = new Kho();
	$result = $nxb->LayKho();
	include_once("View/Kho/QuanLy.php");
?>