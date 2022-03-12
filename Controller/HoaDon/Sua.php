<?php
	include_once("Model/HoaDon.php");
	include_once("Model/ChiTietHoaDon.php");
	include_once("Model/Xe.php");

	$hd = new HoaDon();
	$cthd = new ChiTietHoaDon();
	$s = new Xe();
	$result_s = $s->LaySach();
	$result_cthd = $cthd->LayChiTietHoaDonTheoMa($_GET['mahd']);

	function GiaSach($result_s, $masach)
	{
		foreach ($result_s as $s) 
		{
			if($s['MAXE'] == $masach)
				return $s['GIABAN'];
		}
		return 0;
	}

	if(isset($_REQUEST['masach']) && isset($_REQUEST['btnSua']))
	{
		$tennn = $_REQUEST['tennn'];
		$diachi = $_REQUEST['diachi'];
		$sdt = $_REQUEST['sdt'];
		$email = $_REQUEST['email'];
		$mahd = $_REQUEST['mahd'];
		$makh = $_REQUEST['makh'];

		$tongtien = 0;
		$trangthai =$_REQUEST['trangthai'];

		$masach = $_REQUEST['masach'];
		$soluong = $_REQUEST['soluong'];

		for ($i=0; $i <count($masach); $i++) { 
			$tongtien += GiaSach($result_s, $masach[$i]) * $soluong[$i];
		}

		$kq = $hd->CapNhatHoaDon($mahd, $makh, $tennn, $diachi, $sdt, $email, $tongtien, $trangthai);

		foreach ($result_cthd as $r_cthd) {
			$f = false;
			foreach ($masach as $key => $value) {
				if($r_cthd['MAXE'] == $value)
				{
					$update[] = array('MAXE' => $value, 'SOLUONG' => $soluong[$key]);
					$f = true;
					array_splice($masach, $key, 1);
					array_splice($soluong, $key, 1);
				}
			}

			if($f == false)
			{
				$delete[] = $r_cthd['MAXE'];
			}
		}

		if(isset($update))
		{
			foreach ($update as $value) {
				$cthd->CapNhatChiTietHoaDon($mahd, $value['MAXE'], $value['SOLUONG']);
			}
		}

		if(isset($delete))
		{
			foreach ($delete as $value) {
				$cthd->XoaChiTietHoaDon($mahd, $value);
			}
		}

		foreach ($masach as $key => $value) {
			$cthd->ThemChiTietHoaDon($mahd, $value, $soluong[$key]);
		}
	}
	else
	{
		$result_hd = $hd->LayHoaDonTheoMa($_GET['mahd']);
	}

	include_once("View/HoaDon/Sua.php");
?>