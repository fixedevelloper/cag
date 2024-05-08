<?php


namespace App\Http\Controllers\API;


use App\Models\AnnonceSelected;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class StaticController extends BaseController
{
    public function cities(Request $request){
        $cities=City::query()->orderBy('name','asc')->get();
        $list=[];
        foreach ($cities as $city){
            $list[]=[
                'id'=>$city->id,
              'name'=>$city->name,
              'longitude'=>$city->longitude,
              'latitude' =>$city->latitude,
              'region_id'=>$city->region_id
            ];
        }
        return $this->sendResponse($list, 'request successfully.');
    }
    public function regions(Request $request){
        $regions=Region::query()->orderByDesc('id')->get();
        return $this->sendResponse($regions, 'request successfully.');
    }
}
