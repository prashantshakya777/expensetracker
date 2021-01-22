<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">My Income</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('income/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="export">
                    <thead>
                    <tr>
						<th>Sno</th>
                        <th>Added Date</th>
						<th>Amount</th>
						
						<th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($income as $a){ ?>
                    <tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $a['AddedDate']; ?></td>
                        <td><?php echo $a['Amount']; ?></td>
						
						<td>
                            <!--<a href="<?php echo site_url('income/edit/'.$a['IncomeId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>--> 
                             <a onclick="return confirm('Are you sure you want to Delete?');" href="<?php echo site_url('income/remove/'.$a['IncomeId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
