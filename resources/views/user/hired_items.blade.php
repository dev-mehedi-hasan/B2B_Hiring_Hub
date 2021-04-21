@extends('layout.user_dash')


@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')


<h2 style="margin-top: 1%; text-align: center; font-weight: bold; color: #6d6868; text-decoration:underline;">Own Booking Items</h2>
<table style="width: 1000px; margin-left: 20%;" class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Title</th>
      <th scope="col">Product Owner</th>
      <th scope="col">Duration</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($own_booking as $index => $own_bookings)
    <tr>
      <th scope="row">{{$index++ +1}}</th>
      <td>{{$own_bookings->title}}</td>
      <td>{{$own_bookings->user_name}}</td>
      <td>{{$own_bookings->start_date}} To {{$own_bookings->end_date}}</td>
      <td><button onclick="location.href='{{url('own_booking_detail/'.$own_bookings->postad_id)}}';" class="btn btn-outline-info">View</button></td>
    </tr>
    @endforeach
  </tbody>
</table>

<nav style="margin-left: 1100px; margin-top:-200px;">
  <ul class="pagination pg-teal">
    {{ $own_booking->links() }}
  </ul>
</nav>

<h2 style="margin-top: 15%; text-align: center; font-weight: bold; color: #6d6868; text-decoration:underline;">Rented Items</h2>

<table style="width: 1000px; margin-left: 20%;" class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Title</th>
      <th scope="col">Client Name</th>
      <th scope="col">Duration</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($user_request as $index => $user_requests)
    <tr>
      <th scope="row">{{$index++ +1}}</th>
      <td>{{$user_requests->title}}</td>
      <td>{{$user_requests->user_name}}</td>
      <td>{{$user_requests->start_date}} To {{$user_requests->end_date}}</td>
      <td><button onclick="location.href='{{url('rented_item_detail/'.$user_requests->booked_id)}}';" class="btn btn-outline-info">View</button></td>
    </tr>
    @endforeach
  </tbody>
</table>

<nav style="margin-left: 1100px; margin-top:-200px;">
  <ul class="pagination pg-teal">
    {{ $user_request->links() }}
  </ul>
</nav>
@endsection

@section('footer')
    @parent
@endsection