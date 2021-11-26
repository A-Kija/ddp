@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Edit product</h1>
                </div>
                <div class="card-body edit-container">
                    <form class="data" action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-8 form-group">
                                <label>Title:</label>
                                <input type="text" class="form-control" name="product_title" value="{{old('product_title', $product->title)}}">
                                <small class="form-text text-muted">Product title.</small>
                            </div>
                            <div class="col-4 form-group">
                                <label>Amount:</label>
                                <input type="text" class="form-control" name="product_amount" value="{{old('product_amount', $product->amount)}}">
                                <small class="form-text text-muted">Product amount in package.</small>
                            </div>
                            <div class="col-10 form-group">
                                <label>Description:</label>
                                <input type="text" class="form-control" name="product_description" value="{{old('product_description', $product->description)}}">
                                <small class="form-text text-muted">Short product description.</small>
                            </div>
                            <div class="col-2 form-group">
                                <label>Price:</label>
                                <input type="text" class="form-control" name="product_price" value="{{old('product_price', $product->price)}}">
                                <small class="form-text text-muted">Price for one unit.</small>
                            </div>
                            <div class="col-6 form-group">
                                <label>Select category</label>
                                <select class="form-control" name="cat_id">
                                    <option value="0">Without category</option>
                                    @foreach ($cats as $cat)
                                        <option value="{{$cat->id}}" @if($cat->id == $catId) selected @endif>{{$cat->title}}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Select in which category product will appear.</small>
                            </div>
                            <div class="col-8 form-group">
                                <label>Info:</label>
                                <div id="toolbar"></div>
                                <div id="run-quill">
                                    <div class="ql-editor">{!!old('product_info', $product->info)!!}</div>
                                </div>
                                <textarea class="form-control" name="product_info" style="display:none;">{{old('product_info')}}</textarea>
                                <small class="form-text text-muted">Product calories table.</small>
                            </div>
                            <div class="col-4 form-group">
                                <label>portret:</label>
                                 <input type="file" class="form-control" name="product_photo">
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" name="delete_photo">
                                    <label class="form-check-label mb-3">
                                        delete photo
                                    </label>
                                </div>
                                <div class="col-3 edit-container__image">
                                    @if ($product->photo)
                                    <img src="{{$product->photo}}">
                                    @else
                                    <img src="{{asset('img/no-image.png')}}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-12  big-top-margin">
                                <button type="button" class="submit btn btn-success mt-2">Edit Product</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
