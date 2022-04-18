<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AdminUsers extends EloquentUser
{
    use HasFactory;
    protected $table = 'admin_users';

    protected $hidden = [
        'remember_token',
    ];

    protected $guarded = [];

    protected $fillable = [
        'email',
        'password',
        'last_name',
        'first_name',
    ];
}
