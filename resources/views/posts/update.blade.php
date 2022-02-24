

@extends('layouts.app')

@section('title') Show @endsection

@section('content')


@error('title')
<div class='alert-danger'>

  {{$message}}
  
  
    
  </div>
@enderror
<div class='container'>

        <form method="POST" action="{{route('posts.update', ['id'=>$post['id']])}}" class="mt-5">
            @csrf
            @method('put')
            <div class="mb-3 w-100">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input name="title" type="text" value="{{$post['title']}}"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Description</label>
              <textarea name="description" class="form-control">{{$post['description']}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Post Creator</label>
                <select name="post_creator" class="form-control">
                    <option value="1">Ahmed</option>
                    <option value="2">Mohamed</option>
                </select>
              </div>
              <input type="hidden" name='id' value="{{$post->id}}">
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>

@endsection