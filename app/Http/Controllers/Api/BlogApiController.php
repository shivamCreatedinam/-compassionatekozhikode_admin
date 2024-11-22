<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Exception;

class BlogApiController extends Controller
{
    public function blogs(){
        try{
            $blogs = Blog::all();
            return response()->json(['success' => true, 'blogs' => $blogs]);
        } catch( Exception $e){
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
