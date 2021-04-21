<html>
  
    <body>
          <head>
        <title>PARTY KITS HIRING</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <style type="text/css">
        
.astrodivider {
  margin:64px auto;
  width:400px; 
  max-width: 100%;
  position:relative;
}

.astrodividermask { 
    overflow:hidden; height:20px; 
}

.astrodividermask:after { 
      content:''; 
      display:block; margin:-25px auto 0;
      width:100%; height:25px;  
        border-radius:125px / 12px;
       box-shadow:0 0 8px #049372;
}
.astrodivider span {
    width:50px; height:50px; 
    position:absolute; 
    bottom:100%; margin-bottom:-25px;
    left:50%; margin-left:-25px;
    border-radius:100%;
   box-shadow:0 2px 4px #4fb39c;
    background:#fff;
}
.astrodivider i {
    position:absolute;
    top:4px; bottom:4px;
    left:4px; right:4px;
    border-radius:100%;
    border:1px dashed #68beaa;
    text-align:center;
    line-height:40px;
    font-style:normal;
     color:#049372;
}
    </style>
        @section('header')


<!-- Modal -->
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
            <option >Elephant Road</option>
            <option >Fakirapool</option>
            <option >Farmgate</option>
            <option >Gulistan</option>
            <option >Mohammadpur</option>
            <option >Mirpur</option>
            <option >Mohakhali</option>
            <option >Gulshan</option>
            <option >Badda</option>
            <option >Banani</option>
            <option >Uttra</option>
            <option >Jatrabari</option>
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

              
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
<!--Navbar -->
<nav style="background-color: #2BBBAD" class="navbar navbar-expand-lg navbar-dark">



  
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">

      <div class="navbar-header">
      <a class="navbar-brand" href="{{URL::to('/')}}">Party Kits Hiring</a>
    </div>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#fullHeightModalTop">Category</a>
      </li>
      <li><a class="dropdown-item" href="{{URL::to('/user')}}">User Dash</a></li>
    </ul>





    <ul class="navbar-nav ml-auto nav-flex-icons">
      @if(session()->has('search'))
            <h6 style="color: red;">{{ Session::get('search')[0]}}</h6>  
              <?php unset($_SESSION['search']);?>
            
@endif
    <form action="{{URL::to('/search')}}" class="form-inline my-1" method="post">
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
@else 
   <a class="dropdown-item" href="{{URL::to('/log')}}">Log In</a>
          <a class="dropdown-item" href="{{URL::to('/signupemail')}}">Sign Up</a>
@endif    
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
                @show

            @yield('body')
        </div>

           @section('footer')
                   <!-- Footer -->
<div class="astrodivider"><div class="astrodividermask"></div><span><i>&#10038;</i></span></div>
<footer class="page-footer font-small blue-grey lighten-5">

  <div style="background-color: #2BBBAD;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Get connected with us on social networks!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a href="www.facebook.com/samixxx" class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Company name</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
          consectetur
          adipisicing elit.</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Products</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">MDBootstrap</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">MDWordPress</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">BrandFlow</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Bootstrap Angular</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">Your Account</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Become an Affiliate</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Shipping Rates</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Help</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Dhanmondi, Dhaka 1200, BD</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> sufians114@gmail.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> 01689271444</p>
        <p>
          <i class="fas fa-print mr-3"></i>  01 234 567 89</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center text-black-50 py-3">© 2019 Copyright:
    <a class="dark-grey-text" href="#"> Party Kits Hiring</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
        @show

       
    
