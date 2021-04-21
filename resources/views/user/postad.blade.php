@extends('layout.user_dash')


@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
<!-- @section('sidebar')
    @parent
@endsection -->

@section('content')





 @if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  <div class="" style="margin-left: 220px">
  <form action="{{URL::to('/add-post')}}" method="POST" enctype="multipart/form-data">

            @csrf


  <div class="form-row">
    <div class="form-group col-md-6">
      <div style="color:#A2CCC7;">Product Title
            </div>
      <input name="title" type="text" class="form-control" id="inputEmail4" placeholder="">
    </div>
 <div class="form-group">
  
    <div style="color:#A2CCC7;">Hiring Cost/Day
            </div>
    <input name="price" type="text" class="form-control" id="inputAddress" placeholder="">
    </div>
    <div class="form-group col-md-6">
   <div style="color:#A2CCC7;">Product Description
            </div>
      <textarea name="description" type="text" class="form-control" id="inputPassword4" placeholder=""></textarea>
    </div>
  </div>

 

 <!--  -->
<!--/Dropdown primary-->
<div>
<div class="dropdown">
  <label for="sel1">Categories:</label>
  <select style="background-color: #2196F4 !important;" name="category" class="btn btn-success" id="sel1">
    <option value="" disabled selected>Select a Category</option>
    <option value="gents">Gents</option>
    <option value="ladies">Ladies</option>
    <option value="boys">Boys</option>
    <option value="girls">Girls</option>
  </select>

  <label for="sel1">Size:</label>
  <select style="background-color: #2196F4 !important;" name="size" class="btn btn-success" id="sel1">
    <option value="" disabled selected>Select Size</option>
    <option value="Small">S</option>
    <option value="Medium">M</option>
    <option value="Large">L</option>
    <option value="Extra Large">XL</option>
    <option value="Double XL">XXL</option>
  </select>

  <label for="sel1">Location:</label>
  <select style="background-color: #2196F4 !important;" name="area" class="btn btn-success" id="sel1">
    <option value="" disabled selected>Select an area</option>
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
            <option >Jatrabari</option>n>
  </select>
</div>
</div>

   
   <div class="form-group">
    <span>
          <div style="color:#A2CCC7;">Upload Photo
            </div>
            <input name="pic" type="file" class="form-control-file" id="exampleFormControlFile1">
          </span>
    </div>
       
  <button style="background-color: #33BBAD !important; type="submit" class="btn btn-primary">Post iT!</button>
</form>
</div>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

@endsection

@section('footer')
    @parent
@endsection