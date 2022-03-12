<?php
	include_once("Model/NhaPhanPhoi.php");
	$tg = new NhaPhanPhoi();
	if(!empty($_GET['tentg']))
	{
		$kq = $tg->ThemTacGia($_GET['tentg'], $_GET['gioithieu']);
		include_once("View/NhaPhanPhoi/Them.php");
	}
?>