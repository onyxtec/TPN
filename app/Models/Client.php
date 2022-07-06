<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable
{
    use HasFactory;
    protected $guard_name = 'client';
    // Fillable Method
    protected $fillable = [
        'fullName',
        'email',
        'password',
        'confirm_password',
        'contact_no' ,
        'emergency_contact',
        'dob',
        'address'
    ];
}
