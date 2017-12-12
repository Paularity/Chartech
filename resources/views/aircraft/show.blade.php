@extends('layout.app')

@section('content')

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ URL::to('aircraft') }}">Models</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
  </ol>
</nav>


  <div class="container">
    <div class="row">
      <div class="well col-md-4">
        <img src="{{ asset('uploads/'.$aircraft->image) }}">
      </div>
    </div>

      <div class="row">
        {{ Form::open(array('url' => 'aircraft/' . $aircraft->id)) }}
           {{ Form::hidden('_method', 'DELETE') }}
           <a class="btn btn-info" href="{{ URL::to('aircraft/' . $aircraft->id . '/edit') }}">
             <span class="glyphicon glyphicon-pencil"></span>
              Edit
          </a>
           <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
        {{ Form::close() }}

        <h3>{{ $aircraft->product_code }}</h3>
        <p>
          <div class="row">
            <div class="form-group col-md-4">
                  <label for="name">Aircraft Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $aircraft->name }}" readonly >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" name="price" value="{{ $aircraft->price }}" readonly >
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
                  <label for="quantity">Quantity</label>
                  <input type="text" class="form-control" id="price" name="quantity" value="{{ $aircraft->quantity }}" readonly>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
                <label for="description">Description</label>
                <textarea name="description" rows="10" id="description" name="description" class="form-control" readonly>{{ $aircraft->description }}
                </textarea>
            </div>
          </div>



        </p>
      </div>

  </div>

@endsection
