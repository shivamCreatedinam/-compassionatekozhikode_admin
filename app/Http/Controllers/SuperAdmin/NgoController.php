<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Ngo;
use Exception;
use Illuminate\Http\Request;

class NgoController extends Controller
{
    public function index()
    {
        $data['ngos'] = Ngo::latest()->get();
        return view('SuperAdmin.ngo.index', $data);
    }
    public function registerForm()
    {
        return view('SuperAdmin.ngo.register');
    }

    public function storeNGO(Request $request)
    {
        $validatedData = $request->validate([
            "ngo_name" => 'required|string',
            "ngo_reg_no" => 'required|string',
            "ngo_logo" => 'required|image|mimes:png,jpg,jpeg,svg,gif',
            "ngo_banner_images[]" => 'nullable|mimes:png,jpg,jpeg,svg,gif',
            "ngo_start_date" => 'required',
            "ngo_email" => 'nullable|email',
            "ngo_website" => 'nullable',
            "contact_numbers" => 'required',
            "facebook_link" => 'nullable',
            "twitter_link" => 'nullable',
            "instagram_link" => 'nullable',
            "youtube_link" => 'nullable',
            "ngo_address" => 'required',
            "ngo_description" => 'nullable',
        ]);
        try {
            // Handle the logo upload
            if ($request->hasFile('ngo_logo')) {
                $logoFile = $request->file('ngo_logo');
                $logoName = time() . '_' . $logoFile->getClientOriginalName(); // Create a unique name
                $logoFile->move(public_path('logos'), $logoName); // Move file to public/logos
                $validatedData['logo'] = 'logos/' . $logoName; // Save the path to the database
            }

            // Handle multiple banner image uploads
            $bannerPaths = [];
            if ($request->hasFile('ngo_banner_images')) {
                foreach ($request->file('ngo_banner_images') as $bannerImage) {
                    $bannerName = time() . '_' . $bannerImage->getClientOriginalName(); // Create a unique name
                    $bannerImage->move(public_path('banners'), $bannerName); // Move to public/banners
                    $bannerPaths[] = 'banners/' . $bannerName; // Add the file path to the array
                }
                $validatedData['banner_images'] = json_encode($bannerPaths); // Store as JSON in the database
            }

            // Create the NGO record
            Ngo::create([
                'ngo_name' => $validatedData['ngo_name'],
                'ngo_reg_no' => $validatedData['ngo_reg_no'],
                'logo' => $validatedData['logo'] ?? null,
                'ngo_start_date' => $validatedData['ngo_start_date'],
                'email' => $validatedData['ngo_email'] ?? null,
                'contact_number' => $validatedData['contact_numbers'],
                'address' => $validatedData['ngo_address'],
                'description' => $validatedData['ngo_description'] ?? null,
                'banner_images' => $validatedData['banner_images'] ?? null,
                'website' => $validatedData['ngo_website'] ?? null,
                'facebook_link' => $validatedData['facebook_link'] ?? null,
                'twitter_link' => $validatedData['twitter_link'] ?? null,
                'instagram_link' => $validatedData['instagram_link'] ?? null,
                'youtube_link' => $validatedData['youtube_link'] ?? null,
            ]);

            return redirect()->route('sadmin.ngo_list')->with("success", "NGO Registration successfully completed.");
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function deleteNGO($id)
    {
        try {
            $ngo = Ngo::find($id);
            if ($ngo) {
                $ngo->delete();
            } else {
                return redirect()->back()->with("error", "Some error Occured");
            }
            return redirect()->back()->with("success", "NGO Deleted successfully completed.");
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
