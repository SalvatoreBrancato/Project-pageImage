<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Image;

class ImageController extends Controller
{
    public function index(Request $request)
    {
       $image = Image::with('tags')->get();
       return response()->json(
        [
            'success' => true,
            'image' => $image
        ]
        );
    }    
}

