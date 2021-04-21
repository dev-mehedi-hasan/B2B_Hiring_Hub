@extends('layout.admin_layout')


@section('navbar')
    @parent
@endsection 

@section('sidebar')
    @parent
@endsection 

@section('content')

<h3 style="margin-left: 150px; text-align: center;">Advertise Pending To Approve</h3>

<hr style="border: 1px solid red; margin-left: 150px;">
@if(session()->has('message'))
    <div style="margin-left: 150px; text-align: center;" class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<table style="margin-left: 150px;" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">User Name</th>
      <th scope="col">Title</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    @foreach($lresult as $key =>$request_ad)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$request_ad->user_name}}</td>
      <td><a href="{{url('post_review/'.$request_ad->pending_post_id)}}">{{$request_ad->title}}</a></td>
      <td>{{$request_ad->date}}</td>
    </tr>
     @endforeach
  </tbody>
</table>
@endsection

@section('footer')
    @parent
@endsection