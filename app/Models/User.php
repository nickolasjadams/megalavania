<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

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
        'slug',
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
     * Return an indexed array of all business_name slugs.
     */
    public static function businessSlugs() {
        $names = User::select(['business_name'])->get()->toArray();

        $slugs = [];
        foreach($names as $name) {
            array_push($slugs, Str::slug($name['business_name']));
        }

        return $slugs;

    }

    /**
     * Returns the user id for the business given the business slug.
     */
    public static function getIdFromSlug($business_slug) {
        $user = User::where('slug', '=', $business_slug)->first();
        return $user->id;
    }

    /**
     * Returns the business name slug from the user id.
     */
    public static function getSlugFromId($user_id) {
        $user = User::where('id', '=', $user_id)->first();
        return $user->slug;
    }

    /**
     * Return the selected brands.
     */
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_user');
    }

    /**
     * Return the associated categories.
     */
    public function categories()
    {
        return $this->hasManyThrough(Category::class, Brand::class);
    }
}
