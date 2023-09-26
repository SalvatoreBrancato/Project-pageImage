<?php

namespace App\Models;
use App\Commands\SuperAdminRegister;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
     protected $fillable = [
        // 'roles',
        'name',
        'email',
        'password'
        
    ];

    //protected $roles = ['superadmin'];
        

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function images(){
        return $this->hasMany(Image::class);
    }

    //creazione superadmin
    // public static function createSuperAdmin($name, $email, $password)
    // {
    //     $user = new User();
    //     $user->name = $name;
    //     $user->email = $email;
    //     $user->password = Hash::make($password);
    //     $user->roles = ['superadmin'];

    //     $user->save();

    //     return $user;
    // }

    // public static function superAdminExists()
    // {
    //     return DB::table('users')->where('roles', '=', ['superadmin'])->exists();
    // }
}
