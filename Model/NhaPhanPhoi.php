<?php
	include_once("DataProvider.php");
	class NhaPhanPhoi
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LayTacGia(){
			$sql = "SELECT * FROM NHAPHANPHOI";
			return $this->cn->FetchAll($sql);
		}

		function LayTacGiaTheoMa($id){
			$sql = "SELECT * FROM NHAPHANPHOI WHERE MANPP = $id";
			return $this->cn->Fetch($sql);
		}

		function ThemTacGia($tentg, $gioithieu)
		{
			$sql = "INSERT INTO NHAPHANPHOI(TENNPP, GIOITHIEU) VALUES('$tentg', '$gioithieu')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatTacGia($matg, $tentg, $gioithieu)
		{
			$sql = "UPDATE NHAPHANPHOI SET TENNPP = '$tentg', GIOITHIEU = '$gioithieu' WHERE MANPP = $matg";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaTacGia($matg)
		{
			$sql = "DELETE FROM NHAPHANPHOI WHERE MANPP = $matg";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>