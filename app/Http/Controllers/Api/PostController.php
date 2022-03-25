<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(){
        
        $posts_api = Post::with('category','tags')->get();
        
        return response()->json($posts_api);
    }
    public function show($slug){
        
        $post = Post::where("slug",$slug)->with("category", "tags")->first();
    
        return response()->json($post);
    }

    
}
