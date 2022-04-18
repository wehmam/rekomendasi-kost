<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function kriteria(){
        return $this->hasOne(Criteria::class);
    }

    public function photo(){
        return $this->hasMany(KostPhoto::class);
    }
}
