<?php
	if(isset($_REQUEST['masach']))
	{
		include_once("Model/Xe.php");
		$s = new Xe();
		$masach = $_REQUEST['masach'];
		$result = $s->LaySachTheoMa($masach);

		include_once("View/Xe/ChiTiet_QL.php");
	}
?>