<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            
            $image = new Image();
            $image->image_path = 'images/'.$imageName;
            $image->save();
        }

        return redirect()->route('image')->with('success', 'Image uploaded successfully.')->with('imagePath', $image->image_path ?? null);
    }
}
