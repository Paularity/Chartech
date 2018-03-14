@extends('layout.app')

@section('dashboard')
  <p> <strong>Menu</strong> </p>
  <a href="{{ URL::to('aircraft/create') }}">Create Aircraft</a><br>
@endsection

@section('content')
<div class="container">
  <h1>Models</h1>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <td>Image</td>
            <td>Product Code</td>
            <td>Name</td>
            <td>Price</td>
            <td>ID</td>

        </tr>
    </thead>
    <tbody>
    @foreach($aircraft as $key => $value)
        <tr class="zoom" >
          <td><a href="{{ URL::to('aircraft/'. $value->id) }}"><img class="min-pic" src="{{ asset('uploads/'.$value->image) }}"></a></td>
            <td><a href="{{ URL::to('aircraft/'. $value->id) }}">{{ $value->product_code }}</a></td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->price }}</td>
            <td>{{ $value->id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row text-center">
  {{ $aircraft->links() }}
</div>

<h1>Try AJAX Request here:</h1>

<div id="images">

</div>



<button type="button" class="btn btn-warning" name="button" id="getRequest">Get Request</button>


<script type="text/javascript">
  $(document).ready(function(){
    $('#getRequest').click(function(){
      $.get('getRequest',function(data){
        var dataString = "image";
          $.ajax({
            type:"GET",
            url:"http://paularity.x10host.com/wp-json/wp/v2/media",
            data: dataString,
            success: function(data){
            for(var i=0 ; i < 10; i++){
               $( "<img style='width:30%;height:30%;margin:5%'>" ).attr( "src", data[i].source_url).appendTo( "#images" );
               console.log( "JSON Data: " + data[i].source_url );
             }
            }

          });
      });
    });

  });
</script>
@endsection
