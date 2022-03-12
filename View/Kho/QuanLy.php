<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Kho</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Mã kho</th><th>Tên kho</th><th>Địa chỉ</th><th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($result as $row) {
							$item = <<< EOD
								<tr>
									<td>{$row['MAKHO']}</td>
									<td>{$row['TENKHO']}</td>
									<td>{$row['DIACHI']}</td>
									<td>
										<a href="admin.php?c=Kho&act=Sua&manxb={$row['MAKHO']}" class="btn btn-primary">Sửa</a>
										<a href="admin.php?c=Kho&act=Xoa&manxb={$row['MAKHO']}" class="btn btn-danger">Xoá</a>
									</td>
								</tr>
EOD;
							echo $item;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="panel-footer">
		<a href="admin.php?c=Kho&act=TaoMoi" class="btn btn-default">Thêm kho mới</a>
	</div>
</div>