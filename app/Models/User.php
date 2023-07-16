<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Myparent;
use App\Models\Service;
use App\Models\Commande;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


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
        'password' => 'hashed',
    ];

    public function parent(){
        return $this->belongsTo(Myparent::class, "myparent_id");
    }

    public function services(){
        return $this->belongsToMany(Service::class, "services_users", "user_id", "service_id")->withPivot("pay_day", "date_end", "nbr_mount_payed")->withTimestamps();
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function getPhoto(){
        return $this->image?? "images/default.png";
    }

}
