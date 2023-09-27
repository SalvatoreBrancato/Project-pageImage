<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Comment;

class CommentController extends Controller
{
   
    public function store(Request $request)
    { 
    $data = $request->all();

    $prova = Comment::create($data);

    return response()->json([
        'success' => true,
        'prova' => $prova
    ]);
    }
}
