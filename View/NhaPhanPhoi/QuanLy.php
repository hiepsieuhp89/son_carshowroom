<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nhà phân phối</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Mã nhà phân phối</th><th>Tên nhà phân phối</th><th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($result as $row) {
							$item = <<< EOD
								<tr>
									<td>{$row['MANPP']}</td>
									<td>{$row['TENNPP']}</td>
									<td>
										<a href="admin.php?c=NhaPhanPhoi&act=Sua&matg={$row['MANPP']}" class="btn btn-primary">Sửa</a>
										<a href="admin.php?c=NhaPhanPhoi&act=Xoa&matg={$row['MANPP']}" class="btn btn-danger">Xoá</a>
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
		<a href="admin.php?c=NhaPhanPhoi&act=TaoMoi" class="btn btn-default">Thêm nhà phân phối mới</a>
	</div>
</div>