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
<div style="width: 1000px; margin-top: 5%; margin-left: 23.5%;" class="container">
    <div style="background-image: linear-gradient(to bottom right, #F1F1F1, #33BBAD) !important;" class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">     
            <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-1"><img style="height: 400px; width: 300px;" src=" {{ URL::asset("$details->pic") }}" /></div>
            </div>
          </div>

          <div class="details col-md-6">
            <p></p>
            <h3 style="text-align: center;" class="product-title">{{$details->title}}</h3>
            <h5 class="sizes">Description:<span style="margin-left: 10px;">{{$details->description}}</h5></span></h5>
            <h5 class="sizes">Cost/Day:<span>{{$details->price}}</span></h5>
            <h5 class="sizes">Size: <span>{{$details->size}}</span></h5>
            <h5 class="sizes">{{$details->user_name}} has hired this product for {{$details->start_date}} To {{$details->end_date}}</h5>
            <h5 class="sizes"><span><i class="fa fa-phone-square" aria-hidden="true"></i></span> <span><a href="tel:{{$details->phone}}">{{$details->phone}}</a></span></h5>
            <div class="action">
            <button onclick="location.href='{{URL::to('/unbook/').'/'.$details->booked_id}}';" type="button" class="btn btn-danger">Unbook Now</button>
            <br>
            <br>
            <br>
            <a style="margin-left: 57%;"> <?php print_r($count); ?> people talking about this</a>
            </div>
          
        </div>
      </div>
    </div>
  </div>
  <div style="margin-left: 34%;" class="row bootstrap snippets">
    <div class="col-md-6 col-md-offset-2 col-sm-12">
        <div style="width: 600px;" class="comment-wrapper">
            <div class="panel panel-info">
                <div style="margin-top: 2%" class="panel-body">


                    <form style="margin-right: -26px; margin-left: -40px; " action="{{url('user_feedback/'.$details->postad_id)}}" method="POST" enctype="multipart/form-data">
                      @csrf

                    <textarea name="comment" class="form-control" placeholder="write a comment..." rows="3"></textarea>
                    <br>
                    <button type="submit" class="btn btn-info pull-right">Post</button>
                    </form>
                    <div class="clearfix"></div>
                    <hr>
                  @foreach($feedback as $feedbacks)
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                 <strong class="text-success">{{$feedbacks->user_name}}</strong>
                                <span class="text-muted pull-right">
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($feedbacks->date)->format('j F, Y')}}</small>
                                </span>
                                <p>
                                    {{$feedbacks->comment}}
                                </p>
                            </div>
                        </li>
                    </ul>
                  @endforeach
                {{ $feedback->links() }}
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