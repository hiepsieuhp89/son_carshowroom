<?php
	include_once("DataProvider.php");
	class ChiTietHoaDon
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function ThemChiTietHoaDon($mahd, $masach, $soluong){
			$sql = "INSERT INTO CHITIETHOADON VALUES('$masach', '$mahd', $soluong)";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function LayChiTietHoaDonTheoMa($mahd)
		{
			$sql = "SELECT S.MAXE, S.TENXE, CTHD.SOLUONG FROM CHITIETHOADON CTHD JOIN XE S ON CTHD.MAXE = S.MAXE WHERE CTHD.MAHD = $mahd";
			return $this->cn->FetchAll($sql);
		}

		function CapNhatChiTietHoaDon($mahd, $masach, $soluong)
		{
			$sql= "UPDATE CHITIETHOADON SET SOLUONG = $soluong WHERE MAHD = $mahd AND MAXE = $masach";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaChiTietHoaDon($mahd, $masach)
		{
			$sql = "DELETE FROM CHITIETHOADON WHERE MAHD = $mahd, MAXE = $masach";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>