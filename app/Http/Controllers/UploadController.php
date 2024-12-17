<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // Validasi file
        ]);

        $path = $request->file('image')->store('uploads', 'public');

        return response()->json([
            'success' => true,
            'imageUrl' => Storage::url($path), // Menghasilkan URL file
        ]);
    }
}