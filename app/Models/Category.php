<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the brands for this cateogry.
     */
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'category_user');
    }
}
