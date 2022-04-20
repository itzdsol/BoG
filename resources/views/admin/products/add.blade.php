@extends('layouts.admin')
@if(isset($product))
  @section('title','Edit Product')
@else
  @section('title','Add Product')
@endif

@section('styles')
  <style type="text/css">
  .error{
    color: red;
  }
</style>
@endsection

@section('content')
<div class="content_inner">
    <div class="main_title">{{ isset($product) ? 'Edit a Product' : 'Add a Product' }}</div>
    <div class="sub_title">Product Information</div>
    @if(!isset($product))
      <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data" id="add_product_form">
      @else
      <form method="post" action="{{ route('admin.product.update') }}" enctype="multipart/form-data" id="add_product_form">
        <input type="hidden" name="id" value="{{ $product->id }}">
      @endif
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <label class="custom_label">Product Name</label>
            <input type="text" class="custom_input" placeholder="Product Name" name="name" value="{{ @$product->name ?: old('name') }}"/>
            <span class="error">{{ $errors->first('name') }}</span>
        </div>
        <div class="col-md-6">
            <label class="custom_label">Product Category</label>
            <select class="custom_input" name="category_id">
                <option value="null" selected="" disabled="">Select Category</option>
                @if(count($categories) > 0)
                @foreach($categories as $key => $category)
                    <option value="{{ $category->id }}" <?php if(isset($product->category_id) && $product->category_id == $category->id) { echo 'selected'; } else if(old('category_id') == $category->id) { echo 'selected'; } ?> >{{ $category->name }}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="sub_title">Product Details</div>
    <div class="row">
        <div class="col-md-6">
            <label class="custom_label">Price Per Item</label>
            <select class="custom_input">
                <option>Naira</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="custom_label">Minimum Purchase</label>
            <input type="text" class="custom_input" placeholder="1" name="price" value="{{ @$product->price ?: old('price') }}"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label class="custom_label">Weight</label>
            <div class="input_outer">
                <input type="text" class="custom_input" placeholder="20" name="weight" value="{{ @$product->weight ?: old('weight') }}"/>
                <span>KG</span>
            </div>
        </div>
        <div class="col-md-6">
            <label class="custom_label">Stocks</label>
            <input type="text" class="custom_input" placeholder="10" name="stock" value="{{ @$product->stock ?: old('stock') }}"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="drop_outer">
                <div class="drop_inner">
                    <img src="/assets/images/Camera.png" alt="Camera" />
                    <p>Drag Your Images to Upload or <span>Browse</span></p>
                    <input type="file" name="" />
                </div>
            </div>
        </div>
    </div>
    <div class="sub_title">Product Description</div>
    <div class="row">
        <div class="col-md-6">
                <textarea id="mytextarea" name="description" placeholder="Enter description here">{{ @$product->description ?: old('description') }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="save_btn">Save</button>
        </div>
    </div>
    </form>
</div>
@endsection
