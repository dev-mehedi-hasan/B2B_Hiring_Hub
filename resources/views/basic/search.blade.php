@extends('layout.master')

@section('title', 'Page Title')

@section('header')
    @parent
@endsection

@section('body') 

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif


<div class="row">
   <!-- Grid column -->
   @foreach($details as $postad)
 
  <div class="col-md-4 mx-auto my-5">

    <!--Card Narrower-->
    <div class="card card-cascade narrower">

      <!--Card image-->
      <div class="view view-cascade overlay">
        <img style="height: 340px; width: 300px; margin-left: 65px;" src="{{$postad->pic}}" class="card-img-top"
          alt="narrower">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
      <!--/.Card image-->

      <!--Card content-->
      <div class="card-body card-body-cascade">
        <h4 class="text-dark"><i class="fab fa-accusoft"></i>{{$postad->title}}</h4>
        <!--Title-->
        <h5 class="card-title">Price:{{$postad->price}}Tk</h5>
        <!--Text-->
        <p class="card-text">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
          laboriosam, nisi ut aliquid ex ea commodi.</p>

          @if(Session::get('id')==$postad->user_id)
    <a href="{{url('detail/'.$postad->postad_id)}}" class="btn btn-default btn-rounded">View Details</a>
@else 
   <a href="{{url('detail/'.$postad->postad_id)}}" class="btn btn-default btn-rounded">Book Now</a>
@endif
        
      </div>
      <!--/.Card content-->

    </div>
    <!--/.Card Narrower-->
 
  </div>
   @endforeach
</div>          
@endsection

@section('footer')
    @parent
@endsection