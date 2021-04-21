@extends('layout.user_dash')


@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
<h2 style="text-align: center; font-weight: bold; color: #6d6868; text-decoration:underline;">Notices</h2>
<table style="margin-left: 15.5%; width: 1200px;" class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Title</th>
      <th scope="col">Notice</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @if(isset($Approve_post))
    @foreach ($Approve_post as $index => $Approve_posts)
    <tr>
      <th scope="row">{{$index++ +1}}</th>
      <td>{{$Approve_posts->title}}</td>
      <td style="color: #4ebf52;">The Post has been approved</td>
      @if ($Approve_posts->postad_id >= 1)
         <td><button onclick="location.href='{{url('approve_post_detail/'.$Approve_posts->postad_id)}}';" style="background-color: #33BBAD !important; margin-top: -10px; margin-right: -40px;" type="button" class="btn btn-warning">View</button></td>
      @endif
    </tr>
    @endforeach
    @endif

    @if(isset($Decline_post))
    @foreach ($Decline_post as $index => $Decline_posts)
    <tr>
      <th scope="row">{{$index++ +1}}</th>
      <td>{{$Decline_posts->title}}</td>
      <td style="color: #ea3c3c;">The Post has been declined</td>
      @if ($Decline_posts->pending_post_id >= 1)
         <td><button onclick="location.href='{{url('decline_post_detail/'.$Decline_posts->pending_post_id)}}';" style="background-color: #33BBAD !important; margin-top: -10px; margin-right: -40px;" type="button" class="btn btn-warning">View</button></td>
      @endif
    </tr>
    @endforeach
    @endif
  </tbody>
</table>

@endsection

@section('footer')
    @parent
@endsection