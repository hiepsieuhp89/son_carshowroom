<?php
	include_once("DataProvider.php");
	define("ITEMS_PAGE", 9, );
	
	class Xe
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LaySach(){
			$sql = "SELECT * FROM XE S JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP";
			return $this->cn->FetchAll($sql);
		}

		function LaySachTheoDanhMuc($id)
		{
			$sql = "SELECT * FROM XE S JOIN KHO NXB ON S.MAKHO = NXB.MAKHO JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP WHERE MADMS = $id";
			return $this->cn->FetchAll($sql);
		}

		function LaySachTheoDanhMucLimit($id)
		{
			$sql = "SELECT * FROM XE S JOIN KHO NXB ON S.MAKHO = NXB.MAKHO JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP WHERE MADMS = $id LIMIT ".ITEMS_PAGE;
			return $this->cn->FetchAll($sql);
		}

		function LaySachTheoTenDanhMucLoai($tensach, $dms, $ls)
		{
			$sql = "SELECT * FROM XE S JOIN KHO NXB ON S.MAKHO = NXB.MAKHO JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP JOIN HANGXE DMS ON DMS.MADMS = S.MADMS JOIN LOAIXE LS ON LS.MALOAI = S.MALOAI WHERE S.TENXE LIKE '%$tensach%'";
			if($dms > 0)
				$sql.=" AND S.MADMS = $dms";
			if($ls > 0)
				$sql.=" AND S.MALOAI = $ls";
			return $this->cn->FetchAll($sql);
		}

		function LaySachTheoLoai($id)
		{
			$sql = "SELECT * FROM XE S JOIN KHO NXB ON S.MAKHO = NXB.MAKHO JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP WHERE MALOAI = $id";
			return $this->cn->FetchAll($sql);
		}

		function LaySachTheoDanhMucLoai($dms, $ls)
		{
			$sql = "SELECT * FROM XE S JOIN KHO NXB ON S.MAKHO = NXB.MAKHO JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP WHERE MALOAI = $ls and MADMS = $dms";
			return $this->cn->FetchAll($sql);
		}

		function LaySachTheoMa($id)
		{
			$sql = "SELECT * FROM XE S JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP JOIN KHO NXB ON S.MAKHO = NXB.MAKHO JOIN HANGXE DMS ON S.MADMS = DMS.MADMS JOIN LOAIXE LS ON LS.MALOAI = S.MALOAI WHERE S.MAXE = $id";
			return $this->cn->Fetch($sql);
		}

		function LaySachTheoTenSachTacGia($tensach, $tentg)
		{
			$sql = "SELECT * FROM XE S JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP JOIN KHO NXB ON S.MAKHO = NXB.MAKHO WHERE TENXE = '$tensach' OR TENNPP = '$tentg'";
			return $this->cn->FetchAll($sql);
		}

		function LaySachMoiXB($orderby, $offset)
		{
			if($orderby = -1)
			{
				$sql = "SELECT * FROM XE S JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP JOIN KHO NXB ON S.MAKHO = NXB.MAKHO WHERE DATEDIFF(CURDATE(), NGAYXX) <= 30 ORDER BY GIABAN DESC";
			}
			else if ($orderby = 1) 
			{
				$sql = "SELECT * FROM XE S JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP JOIN KHO NXB ON S.MAKHO = NXB.MAKHO WHERE DATEDIFF(CURDATE(), NGAYXX) <= 30 ORDER BY GIABAN";
			}
			else
			{
				$sql = "SELECT * FROM XE S JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP JOIN KHO NXB ON S.MAKHO = NXB.MAKHO WHERE DATEDIFF(CURDATE(), NGAYXX) <= 30";
			}

			if($offset > -1)
				$sql .=" LIMIT ".ITEMS_PAGE." OFFSET $offset";
			return $this->cn->FetchAll($sql);
		}

		function LaySachBanChay($orderby)
		{
			if($orderby = -1)
			{
				$sql = "SELECT * FROM XE S JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP JOIN KHO NXB ON S.MAKHO = NXB.MAKHO WHERE MAXE IN (SELECT MAXE FROM CHITIETHOADON GROUP BY MAXE ORDER BY COUNT(SOLUONG) DESC) ORDER BY GIABAN DESC LIMIT 9
";
			}
			else if ($orderby = 1) 
			{
				$sql = "SELECT * FROM XE S JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP JOIN KHO NXB ON S.MAKHO = NXB.MAKHO WHERE MAXE IN (SELECT MAXE FROM CHITIETHOADON GROUP BY MAXE ORDER BY COUNT(SOLUONG) DESC) ORDER BY GIABAN LIMIT 9
";
			}
			else
			{
				$sql = "SELECT * FROM XE S JOIN NHAPHANPHOI TG ON S.MANPP = TG.MANPP JOIN KHO NXB ON S.MAKHO = NXB.MAKHO WHERE MAXE IN (SELECT MAXE FROM CHITIETHOADON GROUP BY MAXE ORDER BY COUNT(SOLUONG) DESC) LIMIT 9
";
			}
			return $this->cn->FetchAll($sql);
		}

		function LaySachTheoYeuCau($tensach, $tentg, $dms, $ls, $gia1, $gia2, $sapxep, $offset)
		{
			$sql = "SELECT * FROM XE S JOIN KHO NXB ON S.MAKHO = NXB.MAKHO JOIN NHAPHANPHOI TG ON TG.MANPP = S.MANPP JOIN HANGXE DMS ON S.MADMS = DMS.MADMS JOIN LOAIXE LS ON LS.MALOAI = S.MALOAI";

			$sql.= " WHERE S.TENXE LIKE '%$tensach%'";

			$sql.=" AND TG.TENNPP LIKE '%$tentg%'";

			if($dms != 0)
			{
				$sql.= " AND S.MADMS = $dms";
			}

			if($ls != 0)
			{
				$sql.= " AND S.MALOAI = $ls";
			}

			if($gia1 > 0 && $gia2 > 0)
			{
				$sql.= " AND GIABAN BETWEEN $gia1 AND $gia2";
			}

			if($sapxep != 0)
			{
				if($sapxep == 1)
					$sql.= " ORDER BY GIABAN";
				else if($sapxep == -1)
					$sql.= " ORDER BY GIABAN DESC";
			}

			if($offset > -1)
				$sql.= " LIMIT ".ITEMS_PAGE." OFFSET $offset";

			return $this->cn->FetchAll($sql);
		}

		function ThemSach($madms, $maloai, $matg, $manxb, $tensach, $giaban, $baigioithieu, $hinh, $kichthuoc, $sotrang, $soluong, $ngayxb)
		{
			$sql = "INSERT INTO XE(MADMS, MALOAI, MANPP, MAKHO, TENXE, GIABAN, BAIGIOITHIEU, HINH, KICHTHUOC, DUNGTICHXILANH, SOLUONG, CONLAI, NGAYXX) VALUES($madms, $maloai, $matg, $manxb, '$tensach', $giaban, '$baigioithieu', '$hinh', '$kichthuoc', $sotrang, $soluong, $soluong, '$ngayxb')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatSach($masach, $madms, $maloai, $matg, $manxb, $tensach, $giaban, $baigioithieu, $hinh, $kichthuoc, $sotrang, $soluong, $conlai, $ngayxb)
		{
			$sql = "UPDATE XE SET MADMS = $madms, MALOAI = $maloai, MANPP = $matg, MAKHO = $manxb, TENXE = '$tensach', GIABAN = $giaban, BAIGIOITHIEU = '$baigioithieu', HINH = '$hinh', KICHTHUOC = '$kichthuoc', DUNGTICHXILANH = $sotrang, SOLUONG = $soluong, CONLAI = $conlai, NGAYXX = '$ngayxb' WHERE MAXE = $masach";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaSach($masach)
		{
			$sql = "DELETE FROM XE WHERE MAXE = $masach";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>
