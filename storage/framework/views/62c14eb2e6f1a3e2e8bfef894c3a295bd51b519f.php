<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
	function search() {
		var text = document.getElementById("search").value;
		location.href = "/toyadmin/"+text;
	}
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Toy List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Toy List                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">					
					<div class="input-group custom-search-form">
                        <input type="text" id="search" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" onclick="search()">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>							
                    <div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Last Checked</th>
                                            <th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($toys) && count($toys)>0): ?>
                                        	<?php foreach($toys as $toy): ?>
                                        		<tr>
                                        			<td><?php echo e($toy->id); ?></td>
                                        			<td><?php echo e($toy->name); ?></td>
                                        			<td>
                                                        <?php foreach($loanhistories as $loanhistory): ?>
                                                            <?php if($loanhistory->toy_id === $toy->id): ?>
                                                                <?php echo e(date('m d, Y', strtotime($loanhistory->lastchecked))); ?>

                                                            <?php else: ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>         
                                                    </td>
                                        			<td><?php echo e($toy->status); ?></td>
                                        			<td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                                Select
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li><a href="<?php echo e(url('/toyadmin/'.$toy->id.'/edit')); ?>">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <form action="<?php echo e(url('/toyadmin/'.$toy->id)); ?>" method="post">
                                                                            <input type="hidden" name="_method" value="delete">
                                                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                                            <button type="submit" style="background:none; border:none;padding:0px">Delete</button>
                                                                        </form>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div> 
                                                    </td>
                                        		</tr>
                                        	<?php endforeach; ?>  
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No Toy Data</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
								</div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>