<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
        protected $with = ['bus']; // for mass Eager loading.
    //    protected $with = ['fromStation']; // for mass Eager loading.

    protected $fillable = ['name', 'from_station_id', 'to_station_id', 'bus_id', 'timing'];


    public function fromStation()
    {
        return $this->hasMany(Stations::class); //Orders has many Order item inside that.

//        return $this->hasMany(Stations::class, 'stations', 'from_station_id', 'id');
//        return $this->belongsToMany('Namespace\Modules\Email\Models\Participant', 'PIVOT', 'message_id', 'user_id')->withTimestamps();

    }
    //     public function fromStation()
    //     {
    // //        return $this->belongsTo(Stations::class, 'station_id', "id");
    //         return $this->belongsToMany(Stations::class, 'stations', 'station_id', 'id');

    //     }


    public function bus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Buses::class, 'bus_id');
    }

    protected $casts = [
        'begin' => 'date:hh:mm'
    ];
}
