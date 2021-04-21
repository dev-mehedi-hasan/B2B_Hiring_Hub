@extends('layout.user_dash')


@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')

<h2 style="text-align: center; font-weight: bold; color: #6d6868; text-decoration:underline;">Requests</h2>
<br>
<table style="width:1000px; margin-left: 20%; " class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Product Title</th>
      <th scope="col">Message</th>
      <th scope="col">Request From</th>
      <th scope="col">Date</th>
    </tr>
  </thead>

<tbody>
    @foreach ($result as $index => $request)
    <tr>
      <th scope="row">{{$index++ +1}}</th>
      <td>{{$request->title}}</td>
      <td>You have a request for booking your product</td>
      <td>{{$request->user_name}}</td>
      <td>{{ \Carbon\Carbon::parse($request->date)->format('d/m/Y')}}</td>
      <td><button onclick="location.href='{{URL::to('user_request_detail/').'/'.$request->postad_id.'/'.$request->user_id}}';" style="background-color: #33BBAD !important; margin-top: -10px; margin-right: -40px;" type="button" class="btn btn-warning">View</button></td>
      
    </tr>
    @endforeach
  </tbody>

</table>         
   
@endsection

@section('footer')
    @parent
@endsection