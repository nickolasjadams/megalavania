<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'sms',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function b2bBusiness()
    {
       return $this->belongsTo(B2bBusiness::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
