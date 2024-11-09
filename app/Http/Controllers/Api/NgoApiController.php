<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Controllers\Api\AuthApiController;

class NgoApiController extends Controller
{
    public function index()
    {
        $data = Ngo::latest()->get();
        return response()->json(['success' => true, 'Ngos' => $data]);
        
    }

    public function storeNGO(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            "ngo_name" => 'required|string',
            "ngo_reg_no" => 'required|string',
            "logo" => 'required|image|mimes:png,jpg,jpeg,svg,gif',
            "banner_images.*" => 'nullable|image|mimes:png,jpg,jpeg,svg,gif',
            "ngo_start_date" => 'required|date',
            "email" => 'nullable|email',
            "description" => 'nullable|string',
            "website" => 'nullable|url',
            "contact_number" => 'required|string',
            "facebook_link" => 'nullable|url',
            "twitter_link" => 'nullable|url',
            "instagram_link" => 'nullable|url',
            "youtube_link" => 'nullable|url',
            "address" => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $validator->validated();

            // Handle the logo upload
            if ($request->hasFile('logo')) {
                $logoFile = $request->file('logo');
                $logoName = time() . '_' . $logoFile->getClientOriginalName();
                $logoFile->move(public_path('logos'), $logoName);
                $data['logo'] = 'logos/' . $logoName;
            }

            // Handle multiple banner image uploads
            $bannerPaths = [];
            if ($request->hasFile('banner_images')) {
                foreach ($request->file('banner_images') as $bannerImage) {
                    $bannerName = time() . '_' . $bannerImage->getClientOriginalName();
                    $bannerImage->move(public_path('banners'), $bannerName);
                    $bannerPaths[] = 'banners/' . $bannerName;
                }
                $data['banner_images'] = json_encode($bannerPaths);
            }

            // Create the NGO record
            $ngo = Ngo::create([
                'ngo_name' => $data['ngo_name'],
                'ngo_reg_no' => $data['ngo_reg_no'],
                'logo' => $data['logo'] ?? null,
                'ngo_start_date' => $data['ngo_start_date'],
                'email' => $data['email'] ?? null,
                'contact_number' => $data['contact_number'],
                'address' => $data['address'],
                'description' => $data['description'] ?? null,
                'banner_images' => $data['banner_images'] ?? null,
                'website' => $data['website'] ?? null,
                'facebook_link' => $data['facebook_link'] ?? null,
                'twitter_link' => $data['twitter_link'] ?? null,
                'instagram_link' => $data['instagram_link'] ?? null,
                'youtube_link' => $data['youtube_link'] ?? null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'NGO Registration successfully completed.',
                'data' => $ngo
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error occurred while registering the NGO.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteNGO($id)
    {
        try {
            $ngo = Ngo::find($id);
            if ($ngo) {
                $ngo->delete();
            } else {
                return response()->json(['success' => false, 'msg' => 'Some Erorr Occured']);
            }
            return response()->json(['success' => true, 'msg' => "NGO Deleted successfully completed."]);
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }



}
