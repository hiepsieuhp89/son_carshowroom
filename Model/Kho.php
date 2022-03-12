<?php
	include_once("DataProvider.php");
	class Kho
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LayKho(){
			$sql = "SELECT * FROM NHAPHANPHOI";
			return $this->cn->FetchAll($sql);
		}

		function LayKhoTheoMa($id){
			$sql = "SELECT * FROM NHAPHANPHOI WHERE MANXB = $id";
			return $this->cn->Fetch($sql);
		}

		function ThemKho($tennxb, $diachi)
		{
			$sql = "INSERT INTO NHAPHANPHOI(TENNXB, DIACHI) VALUES('$tennxb', '$diachi')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatKho($manxb, $tennxb, $diachi)
		{
			$sql = "UPDATE NHAPHANPHOI SET TENNXB = '$tennxb', DIACHI = '$diachi' WHERE MANXB = $manxb";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaKho($manxb)
		{
			$sql = "DELETE FROM NHAPHANPHOI WHERE MANXB = $manxb";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>