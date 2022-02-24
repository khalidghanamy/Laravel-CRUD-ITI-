<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;

class ApiPostController extends Controller
{
    
    public function index(){



        $posts=Post::all();

        return  PostResource::collection($posts);
    } 
    
    
    
    public function show($postId){



        $posts=Post::find($postId);

        return new PostResource($posts);
    }
                        
    public function store(PostRequest $request){


        $requestedData=request()->all();
        $requestedData=Post::create();

        return new PostResource($posts);
    }
    
}
