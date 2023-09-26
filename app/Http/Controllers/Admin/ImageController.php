<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Image;
use App\Models\Admin\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        $tags = Tag::all();

        return view('admin.index', compact('images', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $images = Image::all();
        
        return view('admin.create', compact('tags', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    $request->validate([
    //         'image'=>'required',
    //         'visibility'=>'required'
    //     ]);
        
        $form_data = $request->all();
        $new_image = new Image();
        //$new_tag = new Tag();
        //$current_image = Image::find($id); 

       //$new_image->user_id = Auth::id();

        // if($request->has('visibility')){
        //     $form_data['visibility'] = 1;
        //     dd('suca');
        // }else {
        //     $form_data['visibility'] = 0;
        // }

        if($request->has('visibility')){
            if($request->has('visibilty') == 1){
                $form_data['visibility'] = 1;
            }else{
                $form_data['visibility'] = 0;
            }
        }

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('img', $request->image);
            $form_data['image'] = $path;
        }

        

        $new_image->fill($form_data);

        //  salvo le informazioni
        $new_image->save();

        
        if ($request->has('tags')) {
            // $new_tag = new Tag();
            // dd($new_tag); 
            //$new_tag->images()->sync($request->image_id);
            $new_image->tags()->sync($form_data['tags']);
        }

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);
        return view('admin.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $image = Image::find($id);
        return view('admin.edit', compact('image','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = Image::find($id);
        $new_image = new Image();

        $form_data = $request->all();
        // $new_image = new Image();

        //$image->user_id = Auth::id();

       //condizione per passare true o false come numeri poiché mysql accetta per valori boolean 0 e 1 e non stringhe
       if($request->has('visibility')){

            if ($request->input('visibility') == 1 ) {

                $form_data['visibility'] = 1;
            } else {
                $form_data['visibility'] = 0;
            }
        }

        if ($request->hasfile('image')) {

            // solo se il file esiste dentro la tabella 'image'
            if( $image->image ){
                //cancellalo
                Storage::delete( $image->image );
            }

            if ($form_data['image']->isValid()) {
                //aggiorna il file all'interno della cartella dedicata per le immagini image
                $path = Storage::disk('public')->put('img', $request->image);

                $form_data['image'] = $path; 
            }
        }

        $image->fill($form_data);

        //  salvo le informazioni
        $image->update($form_data);

        if($request->has('tags')) {
            $image->tags()->sync($request->tags);

        // altrimenti va svuotato
        } else {
            $image->tags()->sync([]);
        }

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         $image_del = Image::find($id);  
        if($image_del->image){
            Storage::delete($image_del->image);
        }

        $image_del->tags()->sync([]);

        $image_del->delete();

        return redirect()->route('admin.index');
    }
}
