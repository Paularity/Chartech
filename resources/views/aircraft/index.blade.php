@extends('layout.app')

@section('dashboard')
  <p> <strong>Menu</strong> </p>
  <a href="{{ URL::to('aircraft/create') }}">Create Aircraft</a><br>
@endsection

@section('content')
<div class="container chan">
  <h1>Models</h1>
</div>


<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Product Code</td>
            <td>Name</td>
            <td>Price</td>
            <td>Action</td>

        </tr>
    </thead>
    <tbody>
    @foreach($aircraft as $key => $value)
        <tr>
            <td>{{ $value->product_code }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->price }}</td>
            <td> <a href="{{ URL::to('aircraft/'. $value->id) }}">View Details</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
