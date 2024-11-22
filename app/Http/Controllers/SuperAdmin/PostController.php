<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngo;
use App\Models\Post;
class PostController extends Controller
{

    public function postList(){
        $posts = Post::with('ngo')->get();
        return view('SuperAdmin.post.post_list',compact('posts'));
    }
    public function addPost(){
        $ngos = Ngo::all();
        return view('SuperAdmin.post.post-form', compact('ngos'));
    }

    public function createPost(Request $request){
        $validatedData = $request->validate([
            "ngo_id" => 'required|string',
            "post_title" => 'required|string',
            "post_desc" => 'required|string',
            "post_banner_images[]" => 'nullable|mimes:png,jpg,jpeg,svg,gif',
            "post_slider_images[]" => 'nullable|mimes:png,jpg,jpeg,svg,gif',
        ]);
        try {

            $bannerPaths = [];
            if ($request->hasFile('post_banner_images')) {
                foreach ($request->file('post_banner_images') as $bannerImage) {
                    $bannerName = time() . '_' . $bannerImage->getClientOriginalName(); // Create a unique name
                    $bannerImage->move(public_path('post-banners'), $bannerName); // Move to public/banners
                    $bannerPaths[] = 'post-banners/' . $bannerName; // Add the file path to the array
                }
                $validatedData['post_banner_images'] = json_encode($bannerPaths); // Store as JSON in the database
            }

            $sliderPaths = [];
            if ($request->hasFile('post_slider_images')) {
                foreach ($request->file('post_slider_images') as $sliderImage) {
                    $sliderName = time() . '_' . $bannerImage->getClientOriginalName();
                    $sliderImage->move(public_path('post-sliders'), $sliderName);
                    $sliderPaths[] = 'post-sliders/' . $sliderName; // Add the file path to the array
                }
                $validatedData['post_slider_images'] = json_encode($sliderPaths); // Store as JSON in the database
            }

            Post::create([
                'ngo_id' => $validatedData['ngo_id'] ?? null,
                'post_title' => $validatedData['post_title'] ?? null,
                'post_desc' => $validatedData['post_desc'] ?? null,
                'post_banner_images' => $validatedData['post_banner_images'] ?? null ,
                'post_slider_images' =>  $validatedData['post_slider_images'] ?? null,
            ]);
            return redirect()->route('sadmin.post_list')->with("success", "Post created successfully.");
        }
        catch(Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
       
    }

    public function editPost($id){
        try{
            $post = Post::with('ngo')->find($id);
            $ngos = Ngo::all();
            if($post){
                return view('SuperAdmin.post.edit_post',compact('post','ngos'));
            }

        }
        catch(Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function updatePost(Request $request, $id){
        $validatedData = $request->validate([
            'ngo_id' => 'required|integer',
            'post_title' => 'required|string',
            'post_desc' => 'required|string',
            'post_slider_images.*' => 'nullable|mimes:jpg,jpeg,png,gif',
            'post_banner_images.*' => 'nullable|mimes:jpg,jpeg,png,gif',
         ]);

         $bannerPaths = [];
            if ($request->hasFile('post_banner_images')) {
                foreach ($request->file('post_banner_images') as $bannerImage) {
                    $bannerName = time() . '_' . $bannerImage->getClientOriginalName(); // Create a unique name
                    $bannerImage->move(public_path('post-banners'), $bannerName); // Move to public/banners
                    $bannerPaths[] = 'post-banners/' . $bannerName; // Add the file path to the array
                }
                $validatedData['post_banner_images'] = json_encode($bannerPaths); // Store as JSON in the database
            }

            $sliderPaths = [];
            if ($request->hasFile('post_slider_images')) {
                foreach ($request->file('post_slider_images') as $sliderImage) {
                    $sliderName = time() . '_' . $bannerImage->getClientOriginalName();
                    $sliderImage->move(public_path('post-sliders'), $sliderName);
                    $sliderPaths[] = 'post-sliders/' . $sliderName; // Add the file path to the array
                }
                $validatedData['post_slider_images'] = json_encode($sliderPaths); // Store as JSON in the database
            }

        $post = Post::findOrFail($id);
        // Update logic for images and other fields
        // ...

        $post->update($validatedData);

        return redirect()->route('sadmin.post_list')->with('success', 'Post updated successfully.');
    }

    public function deletePost($id){
        try{
            $post = Post::find($id);
            if($post){
                $post->delete();
                return redirect()->route('sadmin.post_list')->with("success", "Post Deleted Successfully");
            }

        }
        catch(Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
