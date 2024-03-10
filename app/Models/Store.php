<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    const DAY_OF_WEEK = ['日','月','火','水','木','金','土'];

    public function setHolidayAttribute($holidays)
    {
        $results = [];
        foreach($holidays as $holiday){
            $results[] = Store::DAY_OF_WEEK[$holiday];
        }            
        $this->attributes['holiday'] = implode(",",$results);
    }
}
