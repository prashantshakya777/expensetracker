<?php
// Turn off error reporting
error_reporting(0);
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Date Wise Expense Report</h3>
            	
            </div>

                   <div class="box box-head" style="border:none">
                <form action="<?php echo base_url('Expense/datewisereport')?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="col-sm-12 ">
                    <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="text" class="form-control has-datepicker" name="FromDate" value="<?php echo $frmdate;?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="text" class="form-control has-datepicker" name="ToDate" value="<?php echo $todate;?>">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="color:#fff">Btn</label><br>
                            <button id="btnsub" type="submit" class="btn btn-success"><i class="fa fa-check"></i> Search</button>
                        </div>
                    </div>
                    </div>
                </div>
                </form>
                <div class="clearfix"></div>
            </div>
           
            <div class="box-body">

                <table class="table table-striped" id="export">
                   <thead>
                    <tr>
						<th>Sno</th>
						<th>Item</th>
                        <th>ExpenseDate</th>
        				<th>Amount</th>
						<th>Actions</th>
                    </tr>
                  <thead>
                   <?php $sum=0;?>
                <tbody>
                    <?php $i=1; foreach($expense as $e){ ?>
                    <tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $e['Item']; ?></td>
                        <td><?php echo $e['ExpenseDate']; ?></td>
						<td><?php echo $e['Amount']; ?></td>
						
						<td>
                            <!--<a href="<?php echo site_url('expense/edit/'.$e['ExpenseId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>--> 
                             <a onclick="return confirm('Are you sure you want to Delete?');" href="<?php echo site_url('expense/remove/'.$e['ExpenseId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                                    </tbody>

                    <?php $sum+= $e['Amount'];?>
                      <?php } ?>
                       <tr>
                          <td colspan="2"> <strong>Total </strong> </td>
                          <td></td>
                          <td><strong><?php echo $sum;?></strong></td>
                          <td></td>
                    </tr>
                </table>                  
            </div>
        </div>
    </div>
</div>
