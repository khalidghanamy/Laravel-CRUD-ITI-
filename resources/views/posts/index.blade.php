

@extends('layouts.app')

@section('title') Index @endsection

@section('content')
<div class='container dark:bg-gray-900'>
        <div class="text-center mt-5">
            <a href="{{route('posts.create')}}" class="btn btn-success ">Create Post</a>

        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                
                <th scope="col">slug</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : 'not found'}}</td>
                    <td>{{$post->slug }}</td>
                    <td>{{$post->created_at}}</td>
                    <td><a href="{{route('posts.show', ['id'=>$post->id])}}" class="btn btn-info">View</a></td>
                    <td><a href="{{route('posts.edit', ['id'=>$post->id])}}" class="btn btn-success">Edite</a></td>

                    <td>
                      
                      <form method="Post" action="{{route('posts.destroy',['id'=>$post->id])}}">
                      @CSRF
                    
                      @method('delete')
                    <input class='btn btn-danger' type="submit" onclick=" return confirm('are you sure ?')" value="Delete">
                    </form>
                  </td>
                </tr>
            @endforeach
            </tbody>
          </table>
          {{$posts->links()}}
        </div>

@endsection
