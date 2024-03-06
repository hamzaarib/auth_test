<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitant extends Model
{
    use HasFactory;
    protected $fillable = ['cin','nom','prenom','ville_id','image'];
    public function villeName(){
        return $this->belongsTo(Ville::class,'ville_id','id');
    }
}

