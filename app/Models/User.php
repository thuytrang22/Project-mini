<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
<<<<<<< HEAD
=======

    public $timestamps = true;
>>>>>>> develop

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'birthday',
        'email',
        'phone',
        'address',
    ];
<<<<<<< HEAD
=======

>>>>>>> develop
}
