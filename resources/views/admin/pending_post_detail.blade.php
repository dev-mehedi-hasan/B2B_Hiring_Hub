@extends('layout.admin_layout')


@section('navbar')
    @parent
@endsection 

@section('sidebar')
    @parent
@endsection 

@section('content')
<?php
                $approve = 1;
                $decline = 2;
                $pending_post_detail_id = $pending_post_detail->pending_post_id ;
                ?>

  <style type="text/css">
    
/*****************globals*************/
body {
  font-family: 'open sans';
  overflow-x: hidden; }

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }


.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

/*# sourceMappingURL=style.css.map */
  </style>
  <div class="container">
    <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">
            
            <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-1"><img style="height: 400px; width: 300px;" src="{{ asset('/' .$pending_post_detail->pic ) }}" /></div>
            </div>
            <ul class="preview-thumbnail nav nav-tabs">
            </ul>
           @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif
          </div>
          <div class="details col-md-6">
            <h4 style="text-align: center;" class="product-title">{{$pending_post_detail->title}}</h4>

            <h5 style=" margin-bottom: -2px;" class="sizes">Description</h5>
            <h5 style=" border: 2px solid black; height: 80px;">{{$pending_post_detail->description}}</h5>
            <h5 class="sizes">Cost/Day: <span>{{$pending_post_detail->price}} Tk</span></h5>
            <h5 class="sizes">Size:
              <span class="size" data-toggle="tooltip" title="small">{{$pending_post_detail->size}}</span>
            </h5>
            <h5 class="sizes">Time: <span>{{$pending_post_detail->date}}</span></h5>
            <br>
            <div style="text-align: right;" class="action" >
                
              <button style="background-color: #4CAF50 !important;" onclick="window.location.href='{{URL::to('/approve/').'/'.$pending_post_detail_id.'/'.$approve}}'" class="add-to-cart btn btn-default" type="button">Approve</button>
          
              <button onclick="window.location.href='{{URL::to('/decline/').'/'.$pending_post_detail_id.'/'.$decline}}'" style="background-color: #d34c4c !important;" class="add-to-cart btn btn-default" type="button">Decline</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

@section('footer')
    @parent
@endsection