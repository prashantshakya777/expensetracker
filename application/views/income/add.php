<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Add Income </h3>
              	<div class="box-tools">
                    <a href="<?php echo site_url('income/index'); ?>" class="btn btn-warning btn-sm">List</a> 
                </div>
            </div>
            <?php echo form_open('income/add'); ?>
              <input type="hidden" name="UserId" value="<?php echo $users['UserId'];?>">
          	<div class="box-body">

          		<div class="row clearfix">
				
					<div class="col-md-6">
						<label for="Amount" class="control-label">Amount</label>
						<div class="form-group">
							<input type="text" name="Amount" value="<?php echo $this->input->post('Amount'); ?>" class="form-control" id="Amount" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="AddedDate" class="control-label">Date</label>
						<div class="form-group">
							<input type="text" name="AddedDate" value="<?php echo $this->input->post('AddedDate'); ?>" class="form-control has-datepicker" id="AddedDate" />
						</div>
					</div>
					
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>