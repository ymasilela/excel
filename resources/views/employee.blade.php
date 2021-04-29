
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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
		 <a href="{{ url('/') }}/logout" class="btn btn-success">Logout</a>
		 <br>
		 <div class="form-group">

			<h3 align="center">Import Excel File</h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/import') }}">
    {{ csrf_field() }}
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
				@foreach($emp as $empDetails)
				<tr>
				<td>{{ $empDetails->empId }}</td>
				<td>{{ $empDetails->name }}</td>
				<td>{{ $empDetails->surname }}</td>
				<td>{{ (date('Y') - date('Y',strtotime($empDetails->dob))) }}</td>
				<td>{{ $empDetails->position }}</td>
				<td>{{ $empDetails->department }}</td>
				<td>{{ $empDetails->salary }}</td>				
				<td>{{ (0.05*$empDetails->salary )}}</td>
				<td>{{ $empDetails->dob }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $emp->links() }}
			<div class="form-group">
			 <a href="{{ url('/') }}/export/xlsx" class="btn btn-success">Export to .xlsx</a>
			<a href="{{ url('/') }}/export/xls" class="btn btn-primary">Export to .xls</a>
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
