<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'brand_user');
    }

    /**
     * Get the categories that owns the brand.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
