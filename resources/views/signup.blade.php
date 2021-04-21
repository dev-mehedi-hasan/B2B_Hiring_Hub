
@extends('layout.master')

@section('title', 'Page Title')

@section('header')
    @parent
@endsection
        
@section('body')

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
<form method="post" action="{{URL::to('/usersignup')}}">
{{ csrf_field() }}

       <!-- Email -->
    <input style="margin-top: 30px;" name="name" type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Full Name" required="">

    <!-- Password -->
    <input name="phone" type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Phone" required="">

    <!-- Adress -->
    <input name="adress" type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Address" required="">

    <!-- File --><label style="color: white;">Profile Picture<a style="color: red; margin-left: 5px;">*</a></label>
    <div>
    <input name="file" type="file" required="">
    </div>

      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"><a style="color: white;">Complete</a></button>

      <!-- Register -->
    </form>
    <!-- Form -->

  </div>

</div>
<!-- Material form login -->
</div>
@endsection

@section('footer')
    @parent
@endsection
