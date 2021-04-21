@extends('layout.master')

@section('title', 'Page Title')

@section('header')
    @parent
@endsection
        
@section('body')


@foreach($postdetail as $details)

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reservation Time</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{url('request_book/'.$details->postad_id)}}" method="get">
      <div class="modal-body">
          <div class="form-group">
            <span>
            <label>From</label>
            <input name="S_date" type="date" value="<?php echo date('Y-m-d'); ?>" />
            </span>
            <span style="margin-left: 20px;">
            <label>To</label>
            <input name="E_date" type="date" value="<?php echo date('Y-m-d'); ?>" />
            </span>
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div>




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
            <h3 style="text-align: center; text" class="product-title">{{$details->title}}</h3>
            <h5 class="sizes">Description:<span style="margin-left: 10px;">{{$details->description}}</h5></span></h5>
            <h5 class="sizes">Cost/Day:<span>{{$details->price}}</span></h5>
            <h5 class="sizes">Size: <span>{{$details->size}}</span></h5>
            <h5 class="sizes">Size: <span>{{$details->date}}</span></h5>
            <?php
              
           if(Session::has('id')){
              if(isset($postad[0]->postad_id) && $postad[0]->postad_id==$details->postad_id) {} 
              else{?>
              <h5 class="sizes">Owner: <span>{{$details->user_name}}</span></h5>
             <?php }} 
         else{?>
            <h5 class="sizes">Owner: <span>{{$details->user_name}}</span></h5>
            <?php }?>
            
            <h5 class="sizes"><span><i class="fa fa-phone-square" aria-hidden="true"></i></span> <span><a href="tel:{{$details->phone}}">{{$details->phone}}</a></span></h5>
            
            
            <div class="action">
              <?php
              
          if(Session::has('id')){
              if(isset($postad[0]->postad_id) && $postad[0]->postad_id==$details->postad_id) {?>

<button onclick="location.href='{{url('/edit_post/'.$details->postad_id)}}';" type="button" class="btn btn-warning">edit</button>

                <button onclick="location.href='{{url('/delete_post/'.$details->postad_id)}}';" type="button" class="btn btn-danger">Delete</button>
              <?php }
              elseif(isset($result[0]->postad_id) && $result[0]->postad_id==$details->postad_id && $result[0]->user_id==Session::get('id')){?>
                <button data-toggle="modal" data-target="#exampleModal" style="background-color:#33BBAD !important;" type="button" class="btn btn-danger">Requested</button>
              <?php }
              else{?>
                <button data-toggle="modal" data-target="#exampleModal" style="background-color:#33BBAD !important;" type="button" class="btn btn-danger">Hire</button>
             <?php }

            }
          else { ?>
              <button onclick="location.href='{{url('/log')}}';"  style="background-color:#33BBAD !important;" type="button" class="btn btn-danger">Hire Now!</button>
            <?php }

              

              ?>


 <div>
            <br>
            
            <br>
            <a style="margin-left: 57%;"> <?php print_r($count); ?> people talking about this</a>
            </div>

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
                  <?php
                  if ($details->user_id==Session::get('id')) {?>
                  <form style="margin-right: -26px; margin-left: -40px; " action="{{url('user_feedback/'.$details->postad_id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                      <textarea name="comment" class="form-control" placeholder="write a comment..." rows="3"></textarea>
                                      <br>
                                      <button type="submit" class="btn btn-info pull-right">Post</button>
                                      </form>
                                      <div class="clearfix"></div>
                                      <hr>
                  <?php }
                  ?>
                    
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