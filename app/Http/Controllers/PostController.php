<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class PostController extends Controller
{
   // ===========//  static data //========//
    // private $posts = [
    //     ['id' => 1, 'title' => 'first post','description' => 'first post', 'posted_by' => 'ahmed', 'created_at' => '2022-02-19 10:00:00'],
    //     ['id' => 2, 'title' => 'second post', 'description' => 'first post','posted_by' => 'mohamed', 'created_at' => '2022-02-15 05:00:00'],
    // ];
    

    public function index()
    {
        paginator::useBootstrap();
        $posts= Post::paginate(10);

        
       
     

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

// +++++++++++++++++++++++++++++++++++++++++++++++ //
// +++++++++++++++++++++++create++++++++++++++++++++++++ //


    public function create()
    {
        $users=User::all();
        return view('posts.create',

       [ 'users' =>$users,]
 );
    }
    
    // +++++++++++++++++++++++++++++++++++++++++++++++ //
    // +++++++++++++++++++++++store++++++++++++++++++++++++ //

    public function store(PostRequest $request)
    { 
       

        $requestedData=request()->all();
        
        $img=request()->file('image');
        $ext=$img->getClientOriginalExtension();

        $imgName='image-' . uniqid() ."."."$ext";

        $img->move(public_path("images"),$imgName);
        $requestedData['image']=$imgName;


        Post::create($requestedData);

        return redirect()->route('posts.index');

    
    }
    
    // +++++++++++++++++++++++++++++++++++++++++++++++ //
    // ++++++++++++++++++++++show+++++++++++++++++++++++++ //

    public function show($id){
        $posts= Post::find($id);
      

                return view('posts.show', [
                    'posts' => $posts
                ]);
            
    }
    





   // +++++++++++++++++++++++++++++++++++++++++++++++ //
// +++++++++++++++++++++update++++++++++++++++++++++++++ //

    public function update($id ,PostRequest $request){

        $formDAta=request()->all();

       $post=Post::find($id)->update($formDAta);

        return redirect()->route('posts.index');

          
        

    }

 // +++++++++++++++++++++++++++++++++++++++++++++++ //
// +++++++++++++++++++++edite++++++++++++++++++++++++++ //
    public function edit($id){

        $posts= Post::find($id);
     

                return view('posts.update', [
                    'post' => $posts
                ]);
           
            

        
    
   
    }
     // +++++++++++++++++++++++++++++++++++++++++++++++ //
 // +++++++++++++++++++++delete++++++++++++++++++++++++++ //

    public function destroy($id){
        $posts= Post::find($id);

        $posts->delete();


                    return redirect()->route('posts.index');
                
        
    }
}
