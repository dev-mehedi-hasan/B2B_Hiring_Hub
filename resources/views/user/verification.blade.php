@extends('layout.registration')

@section('title', 'Page Title')

@section('header')
    @parent
@endsection
        
@section('body')


<!-- Material form login -->
<div class="card">
  <h5 style="background-image: linear-gradient(#33BBAD, black);" class="card-header info-color white-text text-center py-4">
    <strong>A Verification Code Has Been Sent To Your Email</strong>
  </h5>
<div class="test" style="opacity: 0.9;
    background-color: ('white');">
<!-- Material form login -->
<div class="card" style="margin-top: 50px; margin-bottom: 50px; margin-left: 350px; margin-right: 350px;">


  <h2 style="background-image: linear-gradient(to right, #33BBAD , black);" class="card-header info-color white-text text-center py-4">
       <strong>Party Kits Hiring</strong>
  </h2>

@if (Session::has('message'))
   <div style="color: red;" class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  <!--Card content-->
  <div style="background-image: linear-gradient(to right, #33BBAD , black);" class="card-body px-lg-5 pt-0">

    <!-- Form -->
<form method="post" action="{{URL::to('/verificationotp')}}">
{{ csrf_field() }}

       <!-- Email -->
    <input  style="background-color: white !important;" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="code" placeholder="Code" required="">

      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"><a style="color: white;">Submit Code</a></button>

      <!-- Register -->
 </form>
    <!-- Form -->

  </div>

</div>
<!-- Material form login -->
</div>
</div>
  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">


</form>
@endsection

@section('footer')
    @parent
@endsection