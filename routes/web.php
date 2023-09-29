<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ImageController;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Image;
use App\Models\Admin\Tag;
use App\Models\Admin\Comment;
use App\Models\User;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user_id = Auth::id();
    $images = Image::all();
    
    foreach($images as $image){
        $image->user = $image->user()->get();
        $image->tag = $image->tags()->get();
        $image->comment = Comment::where('image_id', $image->id)->get();

    }
    $tag = Tag::all();
    $comment = Comment::all();
    return view('dashboard', compact('user_id', 'images', 'tag', 'comment'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/dashboard/admin', ImageController::class);
});

require __DIR__.'/auth.php';
