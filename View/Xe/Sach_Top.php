<div class="container">
	<?php
		foreach ($result_dms as $r):
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $r['TENDMS'];?></h3>
		</div>
		<div class="panel-body">
			<div class="multi-book">
				<?php
					foreach($r['xe'] as $row):
						$moi = '';

						$ngayxb = $row['NGAYXX'];
						$today = date('Y-m-d');

						$diff = date_diff(date_create($today), date_create($ngayxb));

						$day = $diff->format("%a");

						if(intval($day) <= 30):
							$moi = '<div class="moi">NEW</div>';
						endif;

						if($row['CONLAI'] > 0):
							$button = '';
						else:
							$button = '<button type="button" class="btn btn-danger disabled">Hết hàng</button>';
						endif;

						$gia = number_format($row['GIABAN']);
						$item = <<<EOD
						<div class="col-md-6">
							<div class="panel panel-default panel-sach">
								<div class="panel-body text-center">
									<img class="biasach" src="hinh/{$row['HINH']}">
									$moi
									<div class="tensach text-ellipsis"><a href="index.php?c=Xe&act=ChiTiet&madms={$row['MADMS']}&maloai={$row['MALOAI']}&masach={$row['MAXE']}">{$row['TENXE']}</a></div>
									<div class="giaban text-danger">Giá bán: $gia VNĐ</div>
									<form method="post">
										<input type="hidden" name="masach" value="{$row['MAXE']}">
										<input type="hidden" name="btnThem">
										<div class="btn-group">
											$button
											<a href="index.php?c=Xe&act=ChiTiet&madms={$row['MADMS']}&maloai={$row['MALOAI']}&masach={$row['MAXE']}" class="btn btn-primary">Chi tiết</a>
										</div>
									</form>
								</div>
							</div>
						</div>
				EOD;
										echo $item;
									endforeach;
								?>
			</div>
		</div>
		<?php
							$tendms = mb_strtolower($r['TENDMS'],'UTF-8');
							$footer = <<< EOD
							<div class="panel-footer text-right">
							<a href="index.php?&c=Xe&act=DanhSach&madms={$r['MADMS']}" class="btn btn-default">Xem thêm xe $tendms</a>
						</div>
				EOD;
			echo $footer;
		?>
	</div>
	<?php
		endforeach;
	?>
</div>