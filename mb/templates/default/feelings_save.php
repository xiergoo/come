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
						<form class="form-horizontal" action="index.php?act=feelings&op=save" method="post">
							<input type="hidden" name="fl_id" value="<?php echo $output['info']['fl_id'] ?>" >
							<div class="form-group ">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-6 input-group-lg">
									<input type="text" name="fl_name" class="form-control" value="<?php echo $output['info']['fl_name']; ?>" placeholder="事件标题" maxlength=50 />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-6 input-group-lg">
									<select class="form-control" name="fl_type">
										<option value="0">请选择事件类型</option>
										<?php foreach ($output['list'] as $type=>$li) { ?>	
											<option <?php if($output['info']['fl_type']==$type){ echo 'selected'; }  ?> value="<?php echo $type ?>"><?php echo $li ?></option>										
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-6 input-group-lg">
									<input type="date" name="fl_date" class="form-control" value="<?php echo $output['info']['fl_date']; ?>" placeholder="事件日期" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-6">
									<textarea class="form-control" rows="3" placeholder="备注，非必填" name="fl_mark"><?php echo $output['info']['fl_mark'] ?></textarea>
								</div>
								
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-6 ">
									<button class="btn btn-primary btn-lg btn-block" type="submit" name="form_submit" value="ok" >提 交</button>
								</div>
						  	</div>
						</form>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
<?php require 'footer.php'; ?> 
