@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Tag</div>
               <div class="card-body">
                 <form method="POST" action="{{route('tag.store')}}">
                     <div class="form-group">
                        <label>Title: </label>
                        <input type="text" class="form-control" name="tag_title" value="{{old('tag_title')}}">
                        <small class="form-text text-muted">Tag title.</small>
                    </div>
                     @csrf
                     <button type="submit" class="btn btn-primary">Add</button>
                  </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') New Tagegory @endsection



