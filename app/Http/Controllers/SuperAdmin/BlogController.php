<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Auth;
use Carbon\Carbon;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        return view('SuperAdmin.blog.index');
    }

    public function createBlog(Request $request){
         $validatedData = $request->validate([
            "blog_title" => 'required|string',
            "blog_description" => 'required|string',
            "blog_images[]" => 'nullable|mimes:png,jpg,jpeg,svg,gif',
            "facebook_link" => 'nullable',
            "twitter_link" => 'nullable',
            "instagram_link" => 'nullable',
            "youtube_link" => 'nullable',
        ]);

        try{
              // Handle multiple banner image uploads
            $bannerPaths = [];
            if ($request->hasFile('blog_images')) {
                foreach ($request->file('blog_images') as $bannerImage) {
                    $bannerName = time() . '_' . $bannerImage->getClientOriginalName(); // Create a unique name
                    $bannerImage->move(public_path('blog'), $bannerName); // Move to public/banners
                    $bannerPaths[] = 'blog/' . $bannerName; // Add the file path to the array
                }
                $validatedData['blog_images'] = json_encode($bannerPaths); // Store as JSON in the database
            }

            Blog::create([
                'blog_title' => $validatedData['blog_title'] ?? null,
                'blog_description' => $validatedData['blog_description'] ?? null,
                'blog_images' => $validatedData['blog_images'] ?? null,
                'added_by' => Auth::user()->id,
                'blog_start_date' => Carbon::now(),
                'facebook_link' => $validatedData['facebook_link'] ?? null,
                'twitter_link' => $validatedData['twitter_link'] ?? null,
                'instagram_link' => $validatedData['instagram_link'] ?? null,
                'youtube_link' => $validatedData['youtube_link'] ?? null,
            ]);

        } catch( Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
         }
    }

    public function blogList(){
        $blogs = Blog::all();
        return view('SuperAdmin.blog.blog_list',compact('blogs'));
    }
}
