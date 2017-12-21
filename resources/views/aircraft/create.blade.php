@extends('layout.app')
@section('content')
<div class="well">
<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ URL::to('aircraft') }}">Models</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>


<h1>Create Aircraft</h1>

{{ Form::open(array('url' => 'aircraft','enctype' => 'multipart/form-data'))}}

<div class="form-group">
    <label for="product_code">Product Code</label>
    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter product code...">
</div>

  <div class="form-group">
      <label for="name">Aircraft Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter airplane name...">
  </div>

  <div class="form-group">
      <label for="price">Price</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="Enter price...">
  </div>

  <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity...">
  </div>

  <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" rows="3" id="description" name="description" class="form-control"></textarea>
  </div>

  <div class="form-group">
    <label for="uploadImg">Choose an image</label>

    {!! Form::file('image', array('class' => 'image')) !!}
  </div>

  <input type="submit" class="btn btn-primary" name="submit" value="Submit">
  <a class="btn btn-danger" href="{{ URL::to('aircraft') }}">Cancel</a>

{{ Form::close() }}
</div>
@endsection
