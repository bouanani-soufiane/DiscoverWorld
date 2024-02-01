<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aventure extends Model
{
    use HasFactory;
    protected $with = ['images'];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters["search"] ?? false, fn($query, $search) => $query
            ->where("titre", "like", "%" . $search . "%")
            ->orWhere("aventureDescription", "like", "%" . $search . "%"));

        $query->when($filters["destination"] ?? false, fn($query, $destination) => $query
            ->whereHas('continent', fn($query) => $query->where("nameContinent", $destination)
            )
        );
        $sort = $filters["sort"] ?? '';
        $isOldest = $sort === "oldest";

        $query->when($isOldest, function ($query) {
            return $query->oldest();
        }, function ($query) {
            return $query->latest();
        });
        if (!count(array_filter($filters))) {
            $query->latest();
        }
    }
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

