<?php

$hiring_requests=DB::table('prebooking')
 ->join('postad','postad.postad_id','=','prebooking.postad_id')
 ->where ('postad.user_id', Session::get('id'))
 ->get()
 ->count();

$Approve_post=DB::table('postad')
->where('user_id',Session::get('id'))
->where('status','1')
->get()
->count();

$Decline_post=DB::table('pending_post')
->where('user_id',Session::get('id'))
->where('report_type','request cancel')
->get()
->count();

$Notice=$Approve_post+$Decline_post;
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Welcome!!!</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/css/mdb.min.css" rel="stylesheet">

        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/js/mdb.min.js"></script>
    </head>
<body class="fixed-sn mdb-skin">

        @section('navbar')

<!-- Full Height Modal Right -->
<div class="modal fade right" id="fullHeightModalTop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-full-height modal-top" role="document">
    <div class="modal-content">

 <form action="{{URL::to('/category')}}" method="POST" enctype="multipart/form-data">

            @csrf
      <div class="modal-header"> 
        <select name="category" class="browser-default custom-select mb-4">
            <option selected disabled>Select a Category</option>
            <option value="gents">Gents</option>
            <option value="ladies">Ladies</option>
            <option value="boys">Boys</option>
            <option value="girls">Girls</option>
        </select>
      </div>
      <div class="modal-header">
        <select name="area" class="browser-default custom-select mb-4">
            <option selected disabled>Select a sepcfic area</option>
            <option >Azimpur</option>
            <option >Badda</option>
            <option >Dhanmondi</option>
        </select>
      </div> 
       <div class="modal-header">
        <select name="min_price" class="browser-default custom-select mb-4">
            <option selected disabled>Minimum Price</option>
            <option value="0" >0Tk</option>
            <option value="1000" >1000Tk</option>
            <option value="3000" >3000Tk</option>
            <option value="5000" >5000Tk</option>
        </select>
       <span style="margin-left: 10px; margin-right: 10px; "><i class="far fa-window-minimize"></i></span>
         <select name="max_price" class="browser-default custom-select mb-4">
            <option selected disabled>Maximum Price</option>
            <option value="1000" >1000Tk</option>
            <option value="3500" >3500Tk</option>
            <option value="5000" >5000Tk</option>
            <option value="10000" >10000Tk</option>
        </select>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Save changes</button>
      </div>

      </form>
    </div> 
  </div>
</div>
<!-- Full Height Modal Right -->
<!--Navbar -->
<nav style="background-color: #2BBBAD" class="navbar navbar-expand-lg navbar-dark">



  <!-- <a class="navbar-brand" href="#">PKH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> --> 
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <div class="navbar-header">
      <a class="navbar-brand" href="{{URL::to('/')}}">Party Kits Hiring</a>
    </div>
     <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#fullHeightModalTop">Category</a>
      </li>
    </ul>

 



    <ul class="navbar-nav ml-auto nav-flex-icons">
         <form action="{{URL::to('/search')}}" class="form-inline my-1" method="POST">
             {{ csrf_field() }}
    <div class="md-form form-sm my-0">
      <input name="q" class="form-control form-control-sm mr-sm-2 mb-0" type="text" placeholder="Search"
        aria-label="Search">
    </div>
    <button class="btn btn-outline-white btn-sm my-0" type="submit">Search</button>
     </form>

   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
@if(session()->has('id'))
    <a class="dropdown-item" href="{{URL::to('/user')}}">{{ Session::get('user_name')}}</a>
    <a class="dropdown-item" href="{{URL::to('/out')}}">Log Out</a>

@endif    
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->

    
        @show
         

        @section('sidebar')

<head>
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #2196F3;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  border-radius: 2px;
}


.notification .badge {
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
}
</style>
</head>


<body>

<div class="sidebar">
  <a class="#" href="#home">Home</a>
   <a href="{{ url('user_post') }}">Your Advertisement</a>
  <a href="{{URL::to('/hired_item')}}">Hired Items</a>
   <a href="{{URL::to('/hiring_request')}}" class="">
  <span>Hiring Request</span>
  <?php if ($hiring_requests>0) { ?>
  <span style="background-color: red;" class="badge"><?php print_r($hiring_requests); ?></span>
  <?php }  ?>
</a>

  <a href="{{URL::to('/user_notice')}}" class="">
  <span>Notice</span>
  <?php if ($Notice>0) { ?>
  <span style="background-color: red;" class="badge"><?php print_r($Notice); ?></span>
  <?php }  ?>
</a>

 <a href="{{ url('postad') }}"><button style="background-color: #33BBAD !important;" type="submit" class="btn btn-success btn-block">Post Ad</button></a>

</div>

</body>
             @show

        

        
        
        <div class="main-panel">
         @yield('content')

         @section('footer') 


@show


