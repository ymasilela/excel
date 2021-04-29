
<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
 <title>Employment Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  
  
</head>


<body>

	<div class="container">
	<br />
		 <a href="<?php echo e(url('/')); ?>/logout" class="btn btn-success">Logout</a>
		 <br>
		 <div class="form-group">

			<h3 align="center">Import Excel File</h3>
    <br />
   <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </ul>
    </div>
   <?php endif; ?>

   <?php if($message = Session::get('success')): ?>
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong><?php echo e($message); ?></strong>
   </div>
   <?php endif; ?>
   <form method="post" enctype="multipart/form-data" action="<?php echo e(url('/import')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
     <table class="table" >
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="select_file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
       
       </td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted"></span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>
   
		 </div>
		 <input class="form-control" id="myInput" type="text" placeholder="Search..">
		 <br>
		 <table class="table table-striped table-bordered " id="myList">
			<thead>
			<tr>
				<th>Employee Number</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Age</th>
				<th>Position</th>
				<th>Department</th>
				<th>Annual Salary</th>
				<th>Bonus</th>
				<th>Manager Name</th>
				
			</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
				<td><?php echo e($empDetails->empId); ?></td>
				<td><?php echo e($empDetails->name); ?></td>
				<td><?php echo e($empDetails->surname); ?></td>
				<td><?php echo e((date('Y') - date('Y',strtotime($empDetails->dob)))); ?></td>
				<td><?php echo e($empDetails->position); ?></td>
				<td><?php echo e($empDetails->department); ?></td>
				<td><?php echo e($empDetails->salary); ?></td>				
				<td><?php echo e((0.05*$empDetails->salary )); ?></td>
				<td><?php echo e($empDetails->dob); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		<?php echo e($emp->links()); ?>

			<div class="form-group">
			 <a href="<?php echo e(url('/')); ?>/export/xlsx" class="btn btn-success">Export to .xlsx</a>
			<a href="<?php echo e(url('/')); ?>/export/xls" class="btn btn-primary">Export to .xls</a>
			</div>
	</div>
    </body>
     
	<script>
$(document).ready(function(){
 
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> 
</html>
