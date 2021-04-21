@extends('layout.admin_layout')


@section('navbar')
    @parent
@endsection 

@section('sidebar')
    @parent
@endsection 

@section('content')
<style type="text/css">
.content {
  margin-left: 110px;
}

</style>
<div class="content">

<div class="w3-container w3-teal">
  <h1 style="text-align: center;">ADMIN PANEL</h1>
</div>


</div>
@endsection

@section('footer')
    @parent
@endsection