<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
 <title>Employment Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
</head>


<body>
 <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/logo1.jpg" alt="" width="110" height="110">
    <h2>User Registration</h2>
  </div>
 </div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
     <form method="POST" action="/register">
        <?php echo e(csrf_field()); ?>

     <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Jem" required>
    </div>
     
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Jem@email.com" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Password </label>
    <input type="password" class="form-control" id="password" name="password" placeholder="1234" required>
   
  </div> 
  <br/>
  Already a member  <a href="/">Login</a>
   <?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<hr class="mb-4">
   <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
       
  </form>
    </div>
  </div>
 
  </div>

</body>
</html>