<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    
    protected $fillable = [
        'image_id',
        'visibility',
        'comment',
        
    ];
    
    //metodo image crea l'appartenenza tramite model Image
    public function image(){
        return $this->belongsTo(Image::class);
    }
}
