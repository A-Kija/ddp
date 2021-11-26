@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>Create product</h1>
                </div>
                <div class="card-body">
                    <form class="data" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-8 form-group">
                                <label>Title:</label>
                                <input type="text" class="form-control" name="product_title" value="{{old('product_title')}}">
                                <small class="form-text text-muted">Product title.</small>
                            </div>
                            <div class="col-4 form-group">
                                <label>Amount:</label>
                                <input type="text" class="form-control" name="product_amount" value="{{old('product_amount')}}">
                                <small class="form-text text-muted">Product amount in package.</small>
                            </div>
                            <div class="col-10 form-group">
                                <label>Description:</label>
                                <input type="text" class="form-control" name="product_description" value="{{old('product_description')}}">
                                <small class="form-text text-muted">Short product description.</small>
                            </div>
                            <div class="col-2 form-group">
                                <label>Price:</label>
                                <input type="text" class="form-control" name="product_price" value="{{old('product_price')}}">
                                <small class="form-text text-muted">Price for one unit.</small>
                            </div>
                            <div class="col-6 form-group">
                                <label>Select category</label>
                                <select class="form-control" name="cat_id">
                                    <option value="0">Select category</option>
                                    @foreach ($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Select in which category product will appear.</small>
                            </div>
                            <div class="col-8 form-group">
                                <label>Info:</label>
                                <div id="toolbar"></div>
                                <div id="run-quill"></div>
                                <textarea class="form-control" name="product_info" style="display:none;">{{old('product_info')}}</textarea>
                                <small class="form-text text-muted">Product calories table.</small>
                            </div>
                            <div class="col-4 form-group">
                                <label>Photo:</label>
                                <input type="file" class="form-control" name="product_photo">
                            </div>
                            <div class="col-12 big-top-margin">
                                <button type="button" class="submit btn btn-success mt-2">New Product</button>
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
