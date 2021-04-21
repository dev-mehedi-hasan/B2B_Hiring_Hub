@extends('layout.master')

@section('title', 'Page Title')

@section('header')
    @parent
@endsection

@section('body')
<div><!--Carousel Wrapper-->
<div id="video-carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Slides-->
  <div style="height: 400px;" class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <video class="video-fluid" autoplay loop muted>
        <source src="video/PartyKits.mp4" type="video/mp4" />
      </video>
    </div>
  </div>
  <!--/.Slides-->
</div>
<!--Carousel Wrapper--></div>
 <h2 class="h1-responsive font-weight-bold text-center my-5">New Product</h2>
   <div style="margin-top: -2%;" class="row">

   <!-- Grid column -->
   @foreach($postads as $postad)
  <div class="col-md-4 mx-auto my-5">


    <!--Card Narrower-->
    <div style="height: 480px; width: 350px;margin-left: 25px;" class="card card-cascade narrower">

      <!--Card image-->
      <div class="view view-cascade overlay">
        <img style="height: 310px; width: 268px; margin-left: 39px;" src="{{$postad->pic}}" class="card-img-top"
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
        <h5 class="card-title">Cost/Day:{{$postad->price}}Tk</h5>
        <!--Text-->
        <h6 class="card-title">Date:{{\Carbon\Carbon::parse($postad->date)->format('d M Y')}}</h6>
 
    <a href="{{url('detail/'.$postad->postad_id)}}" class="btn btn-default btn-rounded">View Details</a>

      
        
      </div>
      <!--/.Card content-->

    </div>
    <!--/.Card Narrower-->
 
  </div>
   @endforeach
</div>
</div>
  <!-- Grid column -->
     <nav style="margin-left:630px; ">
  <ul class="pagination pg-teal">
    {{ $postads->links() }}
  </ul>
</nav>

<script type="text/javascript">
  $(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });
</script>


<style type="text/css">
  .view-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    margin-bottom: 0;
}
.thumbnail
{
    margin-bottom: 30px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 30px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    padding: 0 1rem;
    border: 0;
}
.item.list-group-item .img-event {
    float: left;
    width: 30%;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
    display: inline-block;
}
.item.list-group-item .caption
{
    float: left;
    width: 70%;
    margin: 0;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item:after
{
    clear: both;
}
</style>

                 
@endsection

@section('footer')
    @parent
@endsection