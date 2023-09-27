<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Image;
use App\Models\Admin\Comment;
use App\Models\Admin\Tag;

class ImageController extends Controller
{
    public function index(Request $request)
    {
       $query = Image::with('tags');

       $tag = Tag::all();

       if($request->has('tags_id')){
        $tags_id = explode(',', $request->tags_id);
        $query = Image::whereHas('tags', function($prova) use ($tags_id){
            $prova->whereIn('id', $tags_id);
        });
       }
       if($request->has('num_page')){
           $image = $query->paginate($request->num_page);

       }else{
            $image = $query->paginate(2);
       }
       return response()->json(
        [
            'success' => true,
            'image' => $image,
            'tag' => $tag
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

