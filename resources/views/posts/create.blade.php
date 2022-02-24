@extends('layouts.app')

@section('title') Create @endsection

@section('content')

        <form method="POST" action="{{route('posts.store')}}" class="mt-5" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3 w-100">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Description</label>
              <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Post Creator</label>
                <select name="user_id" class="form-control">
                  @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>

                  @endforeach

                </select>
                <div>
                  <label for="img" class="form-label">Large file input example</label>
                  <input class="form-control form-control-lg" id="img" name='image'type="file">
                </div>
              </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>

@endsection