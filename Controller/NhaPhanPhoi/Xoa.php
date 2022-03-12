<?php
	if(!empty($_GET['matg']))
	{
		include_once("Model/NhaPhanPhoi.php");
		$tg = new NhaPhanPhoi();
		$kq = $tg->XoaTacGia($_GET['matg']);
	}

	include_once("View/NhaPhanPhoi/Xoa.php");
?>