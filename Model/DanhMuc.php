<?php
	include_once("DataProvider.php");
	class DanhMuc
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LayDanhMuc(){
			$sql = "select * from HANGXE";
			return $this->cn->FetchAll($sql);
		}

		function LayDanhMucTheoMa($id){
			$sql = "select * from HANGXE where MADMS = $id";
			return $this->cn->Fetch($sql);
		}

		function ThemDanhMuc($tendms)
		{
			$sql = "INSERT INTO HANGXE(TENDMS) VALUES('$tendms')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatDanhMuc($madms, $tendms)
		{
			$sql = "UPDATE HANGXE SET TENDMS = '$tendms' WHERE MADMS = $madms";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaDanhMuc($madms)
		{
			$sql = "DELETE FROM HANGXE WHERE MADMS = $madms";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>