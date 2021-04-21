@extends('layout.user_dash')


@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
    <p>
<div class="content">
  <h2 style="margin-left: 330px; margin-top: 300px ">WELCOME TO YOUR PROFILE</h2> 
</div></p>
@endsection

@section('footer')
    @parent
@endsection