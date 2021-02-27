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
     * Return the selected brands associated with this user
     * untested. A start to researching using models with bridge tables
     * First I found this. https://stackoverflow.com/questions/34570242/using-relationships-in-laravel-eloquent-with-bridge-table
     * Which led me to the latest version of the docs here. https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-model-structure
     */
    public function selected_brands() {
        return $this->belongsToMany(Brand::class);
    }

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
        
        $users = User::select(['id', 'slug'])->get()->pluck('id', 'slug');
        if (isset($users[$business_slug])) {
            return $users[$business_slug];
        }

    }

    /**
     * Returns the business name slug from the user id.
     */
    public static function getSlugFromId($user_id) {
        $users = User::select(['id', 'slug'])->get()->pluck('slug', 'id');

        if (isset($users[$user_id])) {
            return $users[$user_id];
        }

    }
}
