<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Peer extends Authenticatable
{
    use HasFactory;
    protected $guard_name = 'peer';
    // Fillable Method
    protected $fillable = [
        'fullName',
        'email',
        'password',
        'confirm_password',
        'contact_no' ,
        'dob',
        'specialization_type',
        'sub_type',
    ];
}
