<?php
$Notice=DB::table('pending_post')
->where('report_type',NULL)
->get()
->count();

$Feedback=DB::table('feedback')
->get()
->count();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style>

  .sidenav {
  position: fixed;
  top: 2%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

#mySidenav a {
  margin-top: 50px;
  position: absolute;
  left: -80px;
  transition: 0.3s;
  padding: 20px;
  width: 100px;
  text-decoration: none;
  font-size: 18px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
  left: 0;
  padding: 15px;
  width: 120px;
}

#about {
  top: 20px;
  background-color: #4CAF50;
}

#blog {
  top: 80px;
  background-color: #2196F3;
}

#projects {
  top: 140px;
  background-color: #f44336;
}

#contact {
  top: 200px;
  background-color: #555
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
</style>
</head>
<body>
@section('navbar')
<nav style="margin-bottom: -2px;" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Party Kits Hiring</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
  
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{URL::to('/admin_out')}}"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <a href="{{URL::to('/advertise_request')}}"><i style="color: red; height: 25px; width: 25px; margin-right: : 110px;margin-top: 18px;" class="fa fa-bell-o fa-lg">
          </i>
          </a>
    </ul>
  </div>
</nav>
  

 @show


@section('sidebar')
<div class="w3-sidebar w3-light-grey w3-bar-block">
<div id="mySidenav" class="sidenav">
  <div>
  <a href="{{URL::to('/review_feedback')}}" id="about">Control<?php if ($Feedback>0) { ?>
  <span style="background-color: red;" class="badge"><?php print_r($Feedback); ?></span>
  <?php } ?></a>
  </div>


  <div>
    <a href="{{URL::to('/admin_notification')}}" id="blog">Notice <?php if ($Notice>0) { ?>
  <span style="background-color: red;" class="badge"><?php print_r($Notice); ?></span>
  <?php }  ?></a>
  </div>
  


  
  <a href="#" id="projects">Setting</a>
  <a href="#" id="contact">About</a>
</div>
</div>

 @show
 	@yield('content')


@section('footer') 
<div class="footer">
<nav class="navbar navbar-inverse">
 
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PARTY_KITS_HIRING</a>
    </div>
  
</nav>
</div>
 @show
</body>
</html>








