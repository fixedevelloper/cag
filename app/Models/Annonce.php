<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    public function driver()
    {
        return $this->belongsTo(User::class,'driver_id','id');
    }
    public function city_from()
    {
        return $this->belongsTo(City::class,'city_from_id','id');
    }
    public function city_to()
    {
        return $this->belongsTo(City::class,'city_to_id','id');
    }
    public function driver_vehicle()
    {
        return $this->belongsTo(DriverVehicle::class,'driver_vehicle_id','id');
    }
}
