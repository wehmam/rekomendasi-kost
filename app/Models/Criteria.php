<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }

    public function setFasilitasAttribute($value)
    {
        $this->attributes['fasilitas'] = json_encode($value);
    }

    public function getFasilitasAttribute($value)
    {
        return $this->attributes['fasilitas'] = json_decode($value);
    }
}
