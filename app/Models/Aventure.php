<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aventure extends Model
{
    use HasFactory;
    protected $with = ['images'];
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function continent(){
        return $this->belongsTo(Continent::class);
    }
}

