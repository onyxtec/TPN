<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'token',
        'client_id',
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
