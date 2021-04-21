@extends('layout.admin_layout')


@section('navbar')
    @parent
@endsection 

@section('sidebar')
    @parent
@endsection 

@section('content')

<h3 style="margin-left: 150px; text-align: center;">Pending Advertise To Approve</h3>

<hr style="border: 1px solid red; margin-left: 150px;">
@if(session()->has('message'))
    <div style="margin-left: 150px; text-align: center;" class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div style="margin-left: 150px;">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Title</th>
      <th scope="col">Time</th>
      <th scope="col">Action</th> 
    </tr>
  </thead>
  <tbody>
    @foreach($lresult as $key =>$notification)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$notification->title}}</td>
      <td>{{$notification->date}}</td>
      <td><button onclick="window.location.href='{{url('notification_detail/'.$notification->pending_post_id)}}'" type="button" class="btn btn-warning">View</button></td>


      
    </tr>
     @endforeach
  </tbody>
</table>
</div>
@endsection

@section('footer')
    @parent
@endsection