<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageCompressController extends Controller
{
    public function uploadForm()
    {
        return view('imageUpload.index');
    }

    public function viewImage()
    {
        return view('imageUpload.view');
    }

    public function uploadImage(Request $request)
    {
        // Validate the image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:25000', // max size 25MB
        ]);

        // Get the image from the request
        $image = $request->file('image');

        // Get the original name of the image
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        // Generate a unique name using the original name to avoid duplicates
        $imageName = $originalName . '_' . time() . '.' . $image->getClientOriginalExtension();

        // Load the image using Intervention Image
        $img = Image::make($image->getRealPath());

        // Get the size of the image (in MB) before compression
        $imageSizeBefore = filesize($image->getRealPath()) / (1024 * 1024); // size in MB

        // Quality variable: Start from 90, and decrease based on the original size
        $quality = 90;

        // If image is larger than 10MB, lower quality to 80
        if ($imageSizeBefore > 10) {
            $quality = 80;
        }

        // If image is larger than 15MB, lower quality to 70
        if ($imageSizeBefore > 15) {
            $quality = 70;
        }

        // Resize image without cropping, maintaining aspect ratio (no forced resizing)
        // Resize only if the width exceeds 2000px to avoid unnecessary resizing
        if ($img->width() > 2000) {
            $img->resize(2000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        // Compress and encode the image
        $img->encode('jpg', $quality);

        // Save the compressed image to the public folder
        $imagePath = public_path('ngo_images/' . $imageName);
        $img->save($imagePath);

        // Get the size of the image after compression
        $imageSizeAfter = filesize($imagePath) / (1024 * 1024); // size in MB

        // Return the image details and size info in JSON response

        $data = [
            'success' => true,
            'message' => 'Image uploaded and compressed successfully',
            'image_name' => $imageName,
            'preview_link' => url('ngo_images/' . $imageName),
            'download_link' => route('download-image', ['fileName' => $imageName]),
            'original_size_mb' => round($imageSizeBefore, 2) . ' MB',
            'compressed_size_mb' => round($imageSizeAfter, 2) . ' MB',
        ];

        return view('imageUpload.view', compact('data'));
    }

    // Method to download the image
    public function downloadImage($fileName)
    {
        $filePath = public_path('ngo_images/' . $fileName);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json([
                'error' => 'File not found'
            ], 404);
        }
    }
}
