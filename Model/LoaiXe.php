<?php
	include_once("DataProvider.php");
	class LoaiXe
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LayLoaiSach(){
			$sql = "select * from LOAIXE";
			return $this->cn->FetchAll($sql);
		}

		function LayLoaiSachTheoMa($id){
			$sql = "select * from LOAIXE where MALOAI = $id";
			return $this->cn->Fetch($sql);
		}

		function LayLoaiSachTheoDanhMuc($madms)
		{
			$sql = "SELECT * FROM LOAIXE WHERE MALOAI IN (SELECT MALOAI FROM XE WHERE MADMS = $madms)";
			return $this->cn->FetchAll($sql);
		}

		function ThemLoaiSach($tenloai)
		{
			$sql = "INSERT INTO LOAIXE(TENLOAI) VALUES('$tenloai')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatLoaiSach($maloai, $tenloai)
		{
			$sql = "UPDATE LOAIXE SET TENLOAI = '$tenloai' WHERE MALOAI = $maloai";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaLoaiSach($maloai)
		{
			$sql = "DELETE FROM LOAIXE WHERE MALOAI = $maloai";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>