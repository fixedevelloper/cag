<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnonceSelected extends Model
{

    use HasFactory;
    public function annonce()
    {
        return $this->belongsTo(Annonce::class,'annonce_id','id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }
}
