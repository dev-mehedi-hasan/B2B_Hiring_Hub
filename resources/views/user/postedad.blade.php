@extends('layout.user_dash')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection
@section('content')


  <style type="text/css">
  .section {
  clear: both;
  padding: 0px;
  margin: 0px;
}

/*  COLUMN SETUP  */
.col {
  display: block;
  float:left;
  margin: 1% 0 1% 1.6%;
}
.col:first-child { margin-left: 0; }

/*  GROUPING  */
.group:before,
.group:after { content:""; display:table; }
.group:after { clear:both;}
.group { zoom:1; /* For IE 6/7 */ }
    .span_4_of_4 {
  width: 23.8%;
}
.span_3_of_4 {
  width: 23.8%;
}
.span_2_of_4 {
  width: 23.8%;
}
.span_1_of_4 {
  width: 23.8%;
}

/*  GO FULL WIDTH BELOW 480 PIXELS */
@media only screen and (max-width: 480px) {
  .col {  margin: 1% 0 1% 0%; }
  .span_1_of_4, .span_2_of_4, .span_3_of_4, .span_4_of_4 { width: 100%; }
}


  </style>




<div class="section group">


 @foreach($postdetail as $details)

     <!--  <div class="grid-container"> -->
          <div class="col span_1_of_4">
             <div class="view view-first">
                <a href="{{url('detail/'.$postad->id)}}">

               <div class="inner_content clearfix">
              <div class="product_image" >
                <img style="height: 310px; width: 220px;" src="{{$postad->pic}}" class="img-responsive" alt=""/>
                <div class="mask">
                 <div class="info">Quick View</div>
                </div>
                <div class="product_container">
                   <div class="cart-left">
                   <p class="title">{{$postad->title}}</p>
                   </div>
                   <div class="price">{{$postad->price}}</div>
                   <div class="clearfix"></div>
                   </div>   
              </div>
                      </div>
                     </a>
               </div>
             </div> 
           
@endforeach
<div class="clearfix"></div>
        <!-- </div> -->
       </div>
      </div>
     </div>
    </div>
   </div>

@endsection

@section('footer')
    @parent
@endsection