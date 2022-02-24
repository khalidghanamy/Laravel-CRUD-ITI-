<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\GoogleLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return 'hello world';
 });

Route::group(['middleware'=>'auth'],function(){                  
Route::get('/posts',[PostController::class,'index'])->name("posts.index");

Route::get('/posts/create',[PostController::class,'create'])->name("posts.create");
Route::delete('/posts/{id}',[PostController::class,'destroy'])->name("posts.destroy");
Route::get('/posts/{id}/edit',[PostController::class,'edit'])->name("posts.edit");
Route::put('/posts/{id}',[PostController::class,'update'])->name("posts.update");
Route::post('/posts',[PostController::class,'store'])->name("posts.store");

Route::get('/posts/{id}',[PostController::class,'show'])->name("posts.show");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//===================>>GitHub<<======================//


 
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();

})->name('github.login');


Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->stateless()->user();

  
    $user = User::where('email', $githubUser->email)->first();

    if (!$user) {
        $user =  User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'remember_token' => $githubUser->token
        ]);
    }

    Auth::login($user);
    return redirect('/posts');
});
  
///////////////////////////////////////Google/////////////////////////////////////////

 
    Route::get('/auth/google/redirect', function () {
        return Socialite::driver('google')->redirect();
    
    })->name('google.login');
    
    
    Route::get('/auth/google/callback', function () {
        $googleUser = Socialite::driver('google')->stateless()->user();
    

        $user = User::where('email', $googleUser->email)->first();
       
        if (!$user) {
            $user =  User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
               
              
            ]);
        }
    
        Auth::login($user);
        return redirect('/posts');
    });
      