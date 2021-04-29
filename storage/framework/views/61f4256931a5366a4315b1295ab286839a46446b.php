<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
 <title>phpzag.com : - Demo Export Data to Excel File in Laravel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<div role="navigation" class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="http://www.phpzag.com" class="navbar-brand">PHPZAG.COM</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="http://www.phpzag.com">Home</a></li>           
				</ul>         
			</div>
		</div>
	</div>	
	<div class="container">
		<h1>Example: Export Data to Excel File in Laravel</h1>
		 <br>
		 <div class="form-group">
			 <a href="<?php echo e(url('/')); ?>/export/xlsx" class="btn btn-success">Export to .xlsx</a>
			<a href="<?php echo e(url('/')); ?>/export/xls" class="btn btn-primary">Export to .xls</a>
		 </div>
		 <table class="table table-striped table-bordered ">
			<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Age</th>
				<th>Skills</th>
				<th>Address</th>
				<th>Designation</th>
			</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
				<td><?php echo e($empDetails->id); ?></td>
				<td><?php echo e($empDetails->name); ?></td>
				<td><?php echo e($empDetails->age); ?></td>
				<td><?php echo e($empDetails->skills); ?></td>
				<td><?php echo e($empDetails->address); ?></td>
				<td><?php echo e($empDetails->designation); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		<?php echo e($emp->links()); ?>

		<div style="margin:50px 0px 0px 0px;">
			<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/export-data-to-excel-file-in-laravel/">Back to Tutorial</a>		
		</div>	
	</div>
    </body>
</html>