<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th style="text-align: center;height: 100px;" scope="col"><h2>Party Kits Hiring</h2></th>
			    </tr>
			  </thead>
			</table>
			<table class="table table-striped">
			  <thead>
			    <tr style="border-radius: 20px;">
			      <th style="text-align: center; " scope="col"><h4>Admin Login</h4></th>
			    </tr>
			  </thead>
			</table>

			@if (\Session::has('message'))
			    <div class="alert alert-success">
			        <ul>
			            <li>{!! \Session::get('message') !!}</li>
			        </ul>
			    </div>
            @endif

		<form action="{{URL::to('/admin_login_request')}}" method="post" style="margin-left: 300px; margin-right: 300px; margin-top: 40px;">
			{{ csrf_field() }}
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>

		<footer  class="navbar fixed-bottom navbar-dark bg-dark">
			
		   <div style="margin-left: 40%;">© 2019 Copyright:
        	 <a href="#"> Abu Sufian Al Sami</a>
           </div>
         
		</footer>

	

</body>
</html>