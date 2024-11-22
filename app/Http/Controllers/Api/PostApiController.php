<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Exception;

class PostApiController extends Controller
{
     public function postList(){
        try{
            $posts = Post::with('ngo')->get();
            return response()->json(['success' => true, 'posts' => $posts]);
        }
        catch(Exception $e){
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
