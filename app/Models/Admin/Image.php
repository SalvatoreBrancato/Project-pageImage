<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Tag;
use App\Models\User;
use App\Models\Admin\Comment;

class Image extends Model
{
    use HasFactory;
    
    protected $table = 'images';
    
    protected $fillable = [
        'user_id',
        'visibility',
        'image',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected function comment(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
