@extends('layout.user_dash')


@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
@foreach($lresult as $details)
<div style="width: 1000px; margin-top: 5%; margin-left: 20%;" class="container">
    <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">
            
            <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-1"><img style="height: 400px; width: 300px;" src=" {{ URL::asset("$details->pic") }}" /></div>
            </div>
            <ul class="preview-thumbnail nav nav-tabs">
            </ul>
            
          </div>
          <div class="details col-md-6">
            <h3 style="text-align: center;" class="product-title">{{$details->title}}</h3>
            <div class="rating">

            </div>

            <h5 class="sizes">Description:<span style="margin-left: 10px;">{{$details->description}}</h5></span></h5>
            <h5 class="sizes">Cost/Day:<span>{{$details->price}}</span></h5>
            <h5 class="sizes">Size: <span>{{$details->size}}</span></h5>
            <h5 class="sizes">{{$details->user_name}} has requested to hire this product on<span style="margin-left: 10px;">{{ \Carbon\Carbon::parse($details->date)->format('d/m/Y')}}</span></h5>
            <h5 class="sizes"><span><i class="fa fa-phone-square" aria-hidden="true"></i></span> <span><a href="tel:{{$details->phone}}">{{$details->phone}}</a></span></h5>
            <div class="action">
            <?php	$approve = 1;
                $decline = 2;
                ?>
     <button style="background-color:#33BBAD !important;" type="button" class="btn btn-danger" onclick="window.location.href='{{URL::to('/accept/').'/'.$details->prebooking_id.'/'.$approve}}'">Accept</button>
     <button onclick="window.location.href='{{URL::to('/decline_booking_request/').'/'.$details->prebooking_id.'/'.$decline}}'" type="button" class="btn btn-danger">Decline</button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection

@section('footer')
    @parent
@endsection