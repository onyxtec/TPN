<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyPeer extends Model
{
    use HasFactory;
    protected $fillable = [
        'token',
        'peer_id',
    ];
    public function peer(){
        return $this->belongsTo(Peer::class);
    }
}
