<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['firstName', 'lastName', 'email', 'phone', 'password'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

}
