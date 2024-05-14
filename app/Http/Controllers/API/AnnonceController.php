<?php


namespace App\Http\Controllers\API;


use App\Helpers\Helper;
use App\Models\Annonce;
use App\Models\AnnonceSelected;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnnonceController extends  BaseController
{

    public function listAnnonces(Request $request){
        $offset=$request->get("offset");
        if (!isset($offset)){
            $offset=0;
        }
        $limit=$request->get('limit');
        if (!isset($limit)){
            $limit=20;
        }
        $annonces=Annonce::query()->where('date_start','>=',date('Y-m-d'))->orderByDesc('id')->paginate($limit);
        return $this->sendResponse($annonces, 'request successfully.');
    }
    public function getOne(Request $request,$id){
        try {
            $annonce=Annonce::query()->find($id);
            $list=[
                'id'=>$annonce->id,
                'driver_name'=>$annonce->driver->first_name.' '.$annonce->driver->last_name,
                'driver_id'=>$annonce->driver->id,
                'city_from_id'=>$annonce->city_from_id,
                'city_from_name'=>$annonce->city_from->name,
                'city_to_id'=>$annonce->city_to_id,
                'city_to_name'=>$annonce->city_to->name,
                'number_person'=>$annonce->number_person,
                'reserved_place'=>$annonce->reserved_place,
                'driver_vehicle_id'=>$annonce->driver_vehicle_id,
                'vehicle_brand'=>$annonce->driver_vehicle->brand,
                'vehicle_color'=>$annonce->driver_vehicle->color,
                'vehicle_image_from'=>'storage/'.$annonce->driver_vehicle->image_from,
                'vehicle_image_back'=>'storage/'.$annonce->driver_vehicle->image_back,
                'vehicle_image_left'=>'storage/'.$annonce->driver_vehicle->image_left,
                'vehicle_image_right'=>'storage/'.$annonce->driver_vehicle->image_right,
                "vehicle_number"=>$annonce->driver_vehicle->number,
                'distance'=>$annonce->distance,
                'price'=>$annonce->price,
                'namedeparture_place'=>$annonce->namedeparture_place,
                'departure_latitude'=>$annonce->departure_latitude,
                'departure_longitude'=>$annonce->departure_longitude,
                'time_start'=>$annonce->time_start,
                'date_start'=>$annonce->date_start,

            ];
            return $this->sendResponse($list, 'request successfully.');
        }catch (\Exception $exception){
            return  $this->sendError($exception->getCode(),[$exception->getMessage()]);
        }

    }
    public function searchAnnonces(Request $request){
        $departure=$request->get('depature_id');
        $arrival=$request->get('arrival_id');
        $date=$request->get('date');
        logger($date);
        try {
            $annonces=Annonce::query()->where('date_start','>=',$date)
                ->where(['city_from_id'=>$departure,'city_to_id'=>$arrival])->orderByDesc('created_at')->get();
            $list=[];
            foreach ($annonces as $annonce){
                $list[]=[
                    'id'=>$annonce->id,
                    'driver_name'=>$annonce->driver->first_name.' '.$annonce->driver->last_name,
                    'driver_id'=>$annonce->driver->id,
                    'city_from_id'=>$annonce->city_from_id,
                    'city_from_name'=>$annonce->city_from->name,
                    'city_to_id'=>$annonce->city_to_id,
                    'city_to_name'=>$annonce->city_to->name,
                    'number_person'=>$annonce->number_person,
                    'reserved_place'=>$annonce->reserved_place,
                    'driver_vehicle_id'=>$annonce->driver_vehicle_id,
                    'vehicle_brand'=>$annonce->driver_vehicle->brand,
                    'vehicle_color'=>$annonce->driver_vehicle->color,
                    'vehicle_image_from'=>'storage/'.$annonce->driver_vehicle->image_from,
                    'vehicle_image_back'=>'storage/'.$annonce->driver_vehicle->image_back,
                    'vehicle_image_left'=>'storage/'.$annonce->driver_vehicle->image_left,
                    'vehicle_image_right'=>'storage/'.$annonce->driver_vehicle->image_right,
                    "vehicle_number"=>$annonce->driver_vehicle->number,
                    'distance'=>$annonce->distance,
                    'price'=>$annonce->price,
                    'namedeparture_place'=>$annonce->namedeparture_place,
                    'departure_latitude'=>$annonce->departure_latitude,
                    'departure_longitude'=>$annonce->departure_longitude,
                    'time_start'=>$annonce->time_start,
                    'date_start'=>$annonce->date_start,

                ];
            }
        }catch (\Exception $exception){
            logger($exception);
           return $this->sendError($exception->getMessage(),[$exception->getMessage()]);
        }

        return $this->sendResponse($list, 'request successfully.');
    }
    public function seletedAnnonce(Request $request){
        $validator = Validator::make($request->all(), [
            'announce_id' => 'required',
            'customer_id' => 'required',
            'number_place' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => Helper::error_processor($validator)], 403);
        }
        $anounce=Annonce::query()->find($request->announce_id);
        $customer=User::query()->find($request->announce_id);
        if (is_null($anounce) || is_null($customer)){
            return $this->sendError('annonce or customer not correct');
        }

        if (($anounce->number_person-$anounce->reserved_place)<$request->number_place){
            return $this->sendError('Place indisponible');
        }
        //for ($i=0;$i<$request->number_place;$i++){
            $seleted=new AnnonceSelected();
            $seleted->annonce_id=$request->announce_id;
            $seleted->customer_id=$request->customer_id;
            $seleted->method_payment=$request->method_payment;
            $seleted->passenger=$request->number_place;
            $seleted->total=$anounce->price*$request->number_place;
           $seleted->code_follow=Helper::generatenumber();
            $seleted->save();
       // }
        $anounce->number_person-=$request->number_place;
        $anounce->save();
        $seleteds=AnnonceSelected::query()->where(['annonce_id'=>$request->announce_id])->get();
        return $this->sendResponse([$seleteds], 'request successfully.');
    }
    public function createAnnonce(Request $request){
        $validator = Validator::make($request->all(), [
            'announce_id' => 'required',
            'customer_id' => 'required',
            'number_place' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => Helper::error_processor($validator)], 403);
        }
        $anounce=Annonce::query()->find($request->announce_id);
        $customer=User::query()->find($request->announce_id);
        if (is_null($anounce) || is_null($customer)){
            return $this->sendError('annonce or customer not correct');
        }

        if (($anounce->number_person-$anounce->reserved_place)<$request->number_place){
            return $this->sendError('Place indisponible');
        }
        for ($i=0;$i<$request->number_place;$i++){
            $seleted=new AnnonceSelected();
            $seleted->annonce_id=$request->announce_id;
            $seleted->customer_id=$request->customer_id;
            $seleted->save();
        }
        $seleteds=AnnonceSelected::query()->where(['announce_id'=>$request->announce_id])->get();
        return $this->sendResponse([$seleteds], 'request successfully.');
    }
    public function listSelectedAnnonces(Request $request){
        $announce_id=$request->get("announce_id");
        $annonces=AnnonceSelected::query()->where(['announce_id'=>$announce_id])->get();
        return $this->sendResponse($annonces, 'request successfully.');
    }

}
