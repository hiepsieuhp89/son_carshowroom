<?php
	if(isset($_REQUEST['masach']))
	{
		include_once("Model/Xe.php");
		$s = new Xe();
		$masach = $_REQUEST['masach'];
		$kq = $s->XoaSach($masach);

		include_once("View/Xe/Xoa.php");
	}
?>