<?php
	include_once("DataProvider.php");
	class Kho
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LayKho(){
			$sql = "SELECT * FROM KHO";
			return $this->cn->FetchAll($sql);
		}

		function LayKhoTheoMa($id){
			$sql = "SELECT * FROM KHO WHERE MAKHO = $id";
			return $this->cn->Fetch($sql);
		}

		function ThemKho($tennxb, $diachi)
		{
			$sql = "INSERT INTO KHO(TENKHO, DIACHI) VALUES('$tennxb', '$diachi')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatKho($manxb, $tennxb, $diachi)
		{
			$sql = "UPDATE KHO SET TENKHO = '$tennxb', DIACHI = '$diachi' WHERE MAKHO = $manxb";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaKho($manxb)
		{
			$sql = "DELETE FROM KHO WHERE MAKHO = $manxb";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>