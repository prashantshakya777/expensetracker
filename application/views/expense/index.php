<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Expense List</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('expense/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
             
            <div class="box-body">
                <table class="table table-striped" id="export">
                   <thead>
                    <tr>
          						<th>S.N.</th>
          						<th>Item</th>
                      <th>Expense Date</th>
          						<th>Amount</th>
          						<th>Actions</th>
                    </tr>
                   <?php $sum=0;?>
                  </thead>
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
                        <?php $sum+= $e['Amount'];?>
                      <?php } ?>
              </tbody>     
                       <tr>
                          <td colspan="2"> <strong>Total: </strong> </td>
                          <td></td>
                          <td><strong><?php echo $sum;?></strong></td>
                          <td></td>
                    </tr>
                </table>  
            </div>
        </div>
    </div>
</div>
