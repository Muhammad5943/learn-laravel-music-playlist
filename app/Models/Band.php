<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // This method function made for define picture to showed in home page
    // public function picture()
    // {
    //     return asset("storage/". $this->thumbnail);
    // }
    // if you using the method function above you must pass this script [src="{{ $band->picture() }}"] to displayed the picture

    // Or you can make it as attribute
    public function getPictureAttribute()
    {
        return asset("storage/". $this->thumbnail);
    }
    // if you using the method function getPictureAttribute() above you must pass this script [src="{{ $band->picture }}"] to displayed the picture

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    /* This function in album method used to displayed the last album in the home page */
    public function album()
    {
        return $this->hasOne(Album::class)->latest();
    }

    public function lyrics()
    {
        return $this->hasMany(Lyric::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

}
