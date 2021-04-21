@extends('layout.admin_layout')


@section('navbar')
    @parent
@endsection 

@section('sidebar')
    @parent
@endsection 

@section('content')

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

<h3 style="margin-left: 150px; text-align: center;">Feedback Review</h3>

<hr style="border: 1px solid red; margin-left: 150px;">
<div style="margin-left: 150px;">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Client</th>
      <th scope="col">Product Title</th>
      <th scope="col">Status</th>
      <th style="padding-left: 7%; ">Action</th> 
    </tr>
  </thead>
  <tbody>
    @foreach($feedback as $key =>$feedbacks)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$feedbacks->user_name}}</td>
      <td>{{$feedbacks->title}}</td>
       <td><button onclick="window.location.href='{{url('detail/'.$feedbacks->postad_id)}}'" type="button" class="btn btn-warning">View</button></td>
      <td><button onclick="window.location.href='{{url('/delete_user/'.$feedbacks->postad_id)}}'" type="button" class="btn btn-warning">Dlete User</button>
      <button onclick="window.location.href='{{url('/delete_post/'.$feedbacks->postad_id)}}'" type="button" class="btn btn-warning">Delete Post</button></td>
    </tr>
     @endforeach
  </tbody>
</table>
</div>


@endsection

@section('footer')
    @parent
@endsection