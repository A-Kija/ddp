@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card layout-add">
                <div class="card-header">Add Product to Layout</div>
                <div class="card-body">
                    <form method="POST" action="{{route('layoutProduct.store')}}">
                        <div class="form-group">
                            <label>Select Product: </label>
                            <select class="form-control" name="layout_product_id">
                                <option value="0">Select Product</option>
                                @foreach ($products as $product)
                                <option value={{$product->id}}
                                @if (in_array($product->id, $usedProducts)) disabled @endif
                                @if (old('layout_product_id') == $product->id) selected @endif>{{$product->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <small class="form-text text-muted">Select Productegory to add it to Layout.</small>
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title') Add Productegory to Layout @endsection
