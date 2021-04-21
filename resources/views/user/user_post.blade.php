@extends('layout.master')

@section('title', 'Page Title')

@section('header')
    @parent
@endsection

@section('body')
@if($errors->any())
            <h4>{{$errors->first()}}</h4>
@endif
<h2 style="text-align: center; font-weight: bold; color: #6d6868; text-decoration:underline;">Your Advertisements</h2>
<br>
<table style="width: 80%; margin-bottom: 300px; margin-left: 10%;" class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Date</th>
      <th scope="col"></th>
    </tr>
  </thead>

<tbody>
    @foreach ($user_post as $index => $postad)
    <tr>
      <th scope="row">{{$index++ +1}}</th>
      <td>{{$postad->title}}</td>
      <td>{{$postad->price}}</td>
      <td>{{$postad->category}}</td>
      <td>{{$postad->date}}</td>
      <td><button onclick="location.href='{{url('detail/'.$postad->postad_id)}}';" style="background-color: #33BBAD !important; margin-top: -10px; margin-right: -40px;" type="button" class="btn btn-warning">View</button></td>
     
      
    </tr>
    @endforeach
  </tbody>







</table>                 
@endsection

@section('footer')
    @parent
@endsection