@extends('layout.app')
@section('content')

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ URL::to('aircraft') }}">Models</a></li>
    <li class="breadcrumb-item"><a href="{{ URL::to('aircraft/'.$aircraft->id) }}">Details</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>


<h1>Edit Aircraft</h1>

{{ Form::model($aircraft, array('route' => array('aircraft.update', $aircraft->id), 'method' => 'PUT','enctype' => 'multipart/form-data')) }}

  <div class="form-group">
      <label for="product_code">Product Code</label>
      <input type="text" class="form-control" id="prod_code" name="product_code" placeholder="Enter product code..." value="{{ $aircraft->product_code }}">
  </div>

  <div class="form-group">
      <label for="name">Aircraft Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter airplane name..." value="{{ $aircraft->name }}">
  </div>

  <div class="form-group">
      <label for="price">Price</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="Enter price..." value="{{ $aircraft->price }}">
  </div>

  <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity..." value="{{ $aircraft->quantity }}">
  </div>

  <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" rows="3" id="description" name="description" class="form-control">{{ $aircraft->description }}</textarea>
  </div>

  <div class="form-group">
    <label for="uploadImg">Choose an image</label>
    <input type="file" name="image" id="image" class="image">
  </div>

  <input type="submit" class="btn btn-primary" name="submit" value="Update">

{{ F