<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    use HasFactory;
    public function image(){
        return $this->hasOne(Image::class);
    }
    public function aventures(){
        return $this->hasMany(Aventure::class);
    }
}
