@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Tag</div>
               <div class="card-body">
                 <form method="POST" action="{{route('tag.update',$tag)}}">
                    <div class="form-group">
                        <label>Title: </label>
                        <input type="text" class="form-control" name="tag_title" value="{{old('tag_title', $tag->title)}}">
                        <small class="form-text text-muted">Tag title.</small>
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
