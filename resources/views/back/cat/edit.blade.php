@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Category</div>
               <div class="card-body">
                 <form method="POST" action="{{route('cat.update',$cat)}}">
                    <div class="form-group">
                        <label>Title: </label>
                        <input type="text" class="form-control" name="cat_title" value="{{old('cat_title', $cat->title)}}">
                        <small class="form-text text-muted">Category title.</small>
                    </div>
                     @csrf
                     <button type="submit" class="btn btn-primary">Edit</button>
                  </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
