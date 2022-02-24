@extends('layouts.app')
@section('title') Show @endsection
@section('content')
<div class='container'>
<div class="card mt-5">
  <div class="card-header ">
    Posts
  </div>
  <div class="card-body">
  
   

<div class="row"> <h5 class=" col-3">title : </h5>
    <p class=" col-9 justify-content-start">
      {{ $posts->title}}

    </p>
    <h5 class=" col-3 justify-content-start">posted_by : </h5>
    <p class="card-text col-9">
       {{$posts->posted_by}} </p>

       <h5 class=" col-3">created_at : </h5>
   <p class="card-text col-9">
   {{$posts->created_at}}

 </p>
</div>
    
  
  
  </div>
</div>


</div>






















@endsection