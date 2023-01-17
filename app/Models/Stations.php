<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];


    // public function fromRoutes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    // {
    //     return $this->belongsTo(Routes::class, 'from_station_id');
    // }

    // public function toRoutes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    // {
    //     return $this->belongsTo(Routes::class, 'to_station_id');
    // }

    // public function buses(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->hasMany(Stations::class); //Routes has many Station item inside that.
    // }

}
