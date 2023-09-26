<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Image;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    
    protected $fillable = [
        'tag',
        
    ];
    
    //metodo image crea l'appartenenza tramite model Image
    public function images(){
        return $this->belongsToMany(Image::class);
    }
}
