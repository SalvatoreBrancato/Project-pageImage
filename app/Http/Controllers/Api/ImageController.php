<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Image;
use App\Models\Admin\Comment;

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
    
    public function show($id){

        

        $image = Image::with('tags', 'user')->where('id', $id)->first();
       
        $comments = Comment::where('image_id', $image->id)->get();

            return response()->json([

                'success' => true,
                'image' => $image,
                'comments' => $comments
            ]);
      
           

    }
}

