<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandUser extends Model
{
    public $timestamps = false;
    use HasFactory;

    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'brand_id',
    ];

    protected $table = 'brand_user';

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scopeCheckRecordExists($query, $userId, $brandId) : bool
    {
        return $query->where('user_id', $userId)
        ->where('brand_id', $brandId)
        ->exists();
    }
}
