<!-- 

  

<body>

<div class="container">

   

    <div class="panel panel-primary">

      <div class="panel-heading"><h2>Laravel 5.7 image upload example - HDTuto.com</h2></div>

      <div class="panel-body">

   

        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>


        <img src="images/{{ Session::get('image') }}">

        @endif

  



  

            @csrf

            <div class="row">

  

                <div class="col-md-6">

                    <input type="file" name="image" class="form-control">

                </div>

   

                <div class="col-md-6">

                    <button type="submit" class="btn btn-success">Upload</button>

                </div>

   

            </div>

        </form>

  

      </div>

    </div>

</div>

</body>

  

</html> -->

<img src="uploads/{{ Session::get('file') }}">




<div>
	 <form action="{{URL::to('/sami')}}" method="POST" enctype="multipart/form-data">

            @csrf
		<label>
			<input type="file" name="file">
			<button type="submit" name="upload" class="btn btn-success"> Upload </button>
			
		</label>
	</form>



</div>