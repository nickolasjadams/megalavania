<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_name',
        'email',
        'password',
        'package_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'admin_password',
        'remember_token',
        'godmode',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return the selected brands associated with this user
     * untested. A start to researching using models with bridge tables
     * First I found this. https://stackoverflow.com/questions/34570242/using-relationships-in-laravel-eloquent-with-bridge-table
     * Which led me to the latest version of the docs here. https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-model-structure
     */
    public function selected_brands() {
        return $this->belongsToMany(Brand::class);
    }
}
