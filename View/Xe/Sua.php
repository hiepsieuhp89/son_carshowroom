<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Sửa xe</h3>
	</div>
	<div class="panel-body">
		<?php
			if(isset($kq))
			{
				if($kq === true)
					echo "Cập nhật thành công";
				else
					echo "Cập nhật không thành công";
			}
			else
			{
				$input_hidden = '';
				foreach ($_GET as $key => $value) {
					$input_hidden.= "<input type='hidden' name='$key' value='$value'>";
				}

				$option_dms = '';
				foreach ($list_dms as $row) {
					if($result['MADMS'] == $row['MADMS'])
						$option_dms.="<option selected value='{$row['MADMS']}'>{$row['TENDMS']}</option>";
					else
						$option_dms.="<option value='{$row['MADMS']}'>{$row['TENDMS']}</option>";
				}

				$option_ls = '';
				foreach ($list_ls as $row) {
					if($result['MALOAI'] == $row['MALOAI'])
						$option_ls.="<option selected value='{$row['MALOAI']}'>{$row['TENLOAI']}</option>";
					else
						$option_ls.="<option value='{$row['MALOAI']}'>{$row['TENLOAI']}</option>";
				}

				$option_tg = '';
				foreach ($list_tg as $row) {
					if($result['MANPP'] == $row['MANPP'])
						$option_tg.="<option selected value='{$row['MANPP']}'>{$row['TENNPP']}</option>";
					else
						$option_tg.="<option value='{$row['MANPP']}'>{$row['TENNPP']}</option>";
				}

				$option_nxb = '';
				foreach ($list_nxb as $row) {
					if($result['MAKHO'] == $row['MAKHO'])
						$option_nxb.="<option selected value='{$row['MAKHO']}'>{$row['TENKHO']}</option>";
					else
						$option_nxb.="<option value='{$row['MAKHO']}'>{$row['TENKHO']}</option>";
				}

				$form = <<< EOD
				<form method="post" enctype="multipart/form-data" class="form-horizontal" role="form" id="frmSach">
					<div class="form-group">
						<label class="control-label col-sm-2">Mã xe: </label>
						<div class="col-sm-10">
							<p class="form-control-static">{$result['MAXE']}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="madms">Hãng xe: </label>
						<div class="col-sm-5">
							<select name="madms" class="form-control" required>
								$option_dms
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="maloai">Thể loại xe: </label>
						<div class="col-sm-5">
							<select name="maloai" class="form-control" required>
								$option_ls
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="tensach">Tên xe: </label>
						<div class="col-sm-5">
							<input type="text" name="tensach" value="{$result['TENXE']}" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="matg">Nhà phân phối: </label>
						<div class="col-sm-5">
							<select name="matg" class="form-control" required>
								$option_tg
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="manxb">Nhà phân phối: </label>
						<div class="col-sm-5">
							<select name="manxb" class="form-control" required>
								$option_nxb
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="giaban">Giá bán: </label>
						<div class="col-sm-5">
							<input type="text" name="giaban" value="{$result['GIABAN']}" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="ngayxb">Ngày xuất xưởng: </label>
						<div class="col-sm-5">
							<input type="text" name="ngayxb" value="{$result['NGAYXX']}" class="form-control date-picker" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="kichthuoc">Kích thước: </label>
						<div class="col-sm-5">
							<input type="text" name="kichthuoc" value="{$result['KICHTHUOC']}" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="sotrang">Dung tích xi lanh: </label>
						<div class="col-sm-5">
							<input type="text" name="sotrang" value="{$result['DUNGTICHXILANH']}" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="soluong">Số lượng: </label>
						<div class="col-sm-5">
							<input type="text" name="soluong" value="{$result['SOLUONG']}" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="conlai">Còn lại: </label>
						<div class="col-sm-5">
							<input type="text" name="conlai" value="{$result['CONLAI']}" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="hinh">Hình xe: </label>
						<div class="col-sm-3">
							<img class="img-thumbnail" src="hinh/{$result['HINH']}">
						</div>
						<div class="col-sm-5">
							<input type="file" accept="image/*" name="hinh" style="margin-top: 5px">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="baigioithieu">Bài giới thiệu: </label>
						<div class="col-sm-10">
							<textarea name="baigioithieu" class="form-control">{$result['BAIGIOITHIEU']}</textarea>
						</div>
					</div>
					$input_hidden
					<input type="hidden" name="old_img" value="{$result['HINH']}">
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<button type="submit" name="btnSua" class="btn btn-primary">Sửa</button>
						</div>
					</div>
				</form>
EOD;
				echo $form;
			}
		?>
	</div>
</div>
<script type="text/javascript">
	$().ready(function(e){
		$('select').selectize({
			create: true
		});

		$('.date-picker').datepicker({dateFormat: 'yy-mm-dd'});

		$('#frmSach').validate({
			rules:{
				giaban: {
					digits: true,
					min: 500
				},
				sotrang: {
					digits: true,
					min: 1
				},
				soluong: {
					digits: true,
					min: 1
				},
				conlai: {
					digits: true,
					min: 0
				}
			},
			messages: {
				madms: {
					required: "Bạn chưa chọn danh mục xe"
				},
				maloai: {
					required: "Bạn chưa chọn loại xe"
				},
				tensach: {
					required: "Bạn chưa nhập tên xe"
				},
				matg: {
					required: "Bạn chưa chọn nhà phân phối"
				},
				manxb: {
					required: "Bạn chưa chọn kho"
				},
				giaban: {
					required: "Bạn chưa nhập giá bán",
					digits: "Bạn nhập giá bán không hợp lệ",
					min: "Bạn nhập giá bán lớn hơn 500"
				},
				ngayxb: {
					required: "Bạn chưa nhập ngày xuất bản",
					date: "Bạn nhập ngày xuất bản chưa hợp lệ"
				},
				kichthuoc: {
					required: "Bạn chưa nhập kích thước xe"
				},
				sotrang: {
					required: "Bạn chưa nhập số trang",
					digits: "Bạn nhập số trang không hợp lệ",
					min: "Bạn phải nhập số trang lớn hơn 1"
				},
				soluong:{
					required: "Bạn chưa nhập số lượng",
					digits: "Bạn nhập số lượng không hợp lệ",
					min: "Bạn phải nhập số lượng lớn hơn 1"
				},
				conlai:{
					required: "Bạn chưa nhập số lượng còn lại",
					digits: "Bạn nhập số lượng còn lại không hợp lệ",
					min: "Bạn phải nhập số lượng còn lại lớn hơn 1"
				}
			}
		});
	});
</script>