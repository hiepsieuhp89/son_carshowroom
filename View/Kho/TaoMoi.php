<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Tạo kho</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" id="frmKho">
			<div class="form-group">
				<label class="control-label col-sm-2" for="tennxb">Tên kho: </label>
				<div class="col-sm-10">
					<input type="text" name="tennxb" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="diachi">Địa chỉ: </label>
				<div class="col-sm-10">
					<input type="text" name="diachi" class="form-control">
				</div>
			</div>
			<input type="hidden" name="c" value="Kho">
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" name="act" value="Them" class="btn btn-primary">Thêm</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#frmKho').validate({
			messages: {
				tennxb: {
					required: "Bạn chưa nhập tên kho"
				}
			}
		})
	});
</script>