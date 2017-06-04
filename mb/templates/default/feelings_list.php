<?php require 'header.php'; ?> 
<div class="cl-mcont">
	<div class="row">
		<div class="col-md-12">
			<div class="block-flat">
				<div class="header">							
					<h3 class="hthin"><label class="col-sm-2 control-label"></label><?php echo $output['title'] ?></h3>
				</div>
				<div class="content">
					<div class="tab-container">
						<table class="table">
						<tr><th>事件名称</th><th>事件类型</th><th>事件日期</th></tr>
						<?php foreach ($output['list'] as $li) { ?>
						<tr><td><?php echo $li['fl_name'] ?></td><td><?php echo $li['fl_type_name'] ?></td><td><?php echo $li['fl_date'] ?></td></tr>
						<?php } ?>
						</table>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
<?php require 'footer.php'; ?> 