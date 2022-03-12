<?php
	include_once("Model/NhaPhanPhoi.php");
	$tg = new NhaPhanPhoi();
	$result = $tg->LayTacGia();
	include_once("View/NhaPhanPhoi/QuanLy.php");
?>