<?php


namespace App\Http\Controllers\API;


use App\Helpers\Helper;
use App\Helpers\UploadableTrait;
use App\Models\Annonce;
use App\Models\AnnonceSelected;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerApiController extends BaseController
{
    use UploadableTrait;

    public function myAnnounce(Request $request,$id){
        $offset=$request->get("offset");
        if (!isset($offset)){
            $offset=0;
        }
        $limit=$request->get('limit');
        if (!isset($limit)){
            $limit=20;
        }
        $annonceselects=AnnonceSelected::query()->where('customer_id','=',$id)->orderByDesc('id')->paginate($limit);
        $list=[];
        foreach ($annonceselects as $annonceselect){
            $annonce=$annonceselect->annonce;
            $list[]=[
                'id'=>$annonceselect->id,
                'code_follow'=>$annonceselect->code_follow,
                'total'=>$annonceselect->total,
                'passenger'=>$annonceselect->passenger,
                'method_payment'=>$annonceselect->method_payment,
                'announce_id'=>$annonce->id,
                'driver_name'=>$annonce->driver->first_name.' '.$annonce->driver->last_name,
                'driver_id'=>$annonce->driver->id,
                'city_from_id'=>$annonce->city_from_id,
                'city_from_name'=>$annonce->city_from->name,
                'city_to_id'=>$annonce->city_to_id,
                'city_to_name'=>$annonce->city_to->name,
                'number_person'=>$annonce->number_person,
                'reserved_place'=>$annonce->reserved_place,
                'driver_vehicle_id'=>$annonce->driver_vehicle_id,
                'driver_vehicle_brand'=>$annonce->driver_vehicle->brand,
                'distance'=>$annonce->distance,
                'price'=>$annonce->price,
                'namedeparture_place'=>$annonce->namedeparture_place,
                'departure_latitude'=>$annonce->departure_latitude,
                'departure_longitude'=>$annonce->departure_longitude,
                'time_start'=>$annonce->time_start,
                'date_start'=>$annonce->date_start,

            ];
        }
        return $this->sendResponse($list, 'request successfully.');
    }
    function createCustomer(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            // 'photo' => '',
            'phone' => 'required|min:5|max:20|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->getMessages(),Helper::error_processor($validator),403);
            //return response()->json(['errors' => Helper::error_processor($validator)], 403);
        }
        $customer=new User();
        $customer->first_name=$request->first_name;
        $customer->phone=$request->phone;
        $customer->last_name=$request->last_name;
        $customer->email=$request->email;
        if($request->has('date_born')) {
            $customer->date_born = $request->date_born;
        }
        $customer->password = bcrypt($request->get('password'));
        $customer->user_type=User::CUSTOMER_TYPE;
        if($request->has('photo')){
            $customer->photo = $this->uploadOne($request->file('photo'), 'customers');
        }
        $customer->save();
        return $this->sendResponse($customer, 'request successfully.');
    }
    function getPositionDriverByPlace(Request $request){
        $start_latitude=$request->start_latitude;
        $end_latitude=$request->end_latitude;
        $end_longitude=$request->end_longitude;
        $start_longitude=$request->start_longitude;
        $drivers=User::query()->where('user_type','=',User::DRIVER_TYPE)
            ->where('online','=',true)
            ->whereBetween('longitude',[$start_longitude,$end_longitude])
            ->whereBetween('latitude',[$start_latitude,$end_latitude])->get();

        if (sizeof($drivers)<=0){
            $drivers=User::query()->where('user_type','=',User::DRIVER_TYPE)
                ->where('online','=',true)->limit(20)->get();
        }
        return $this->sendResponse([
            $drivers
        ], 'request successfully.');
    }
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
    public function add_rating(Request $request){

        $input = $request->all();
        $validator = Validator::make($input, [
            'trip_id' => 'required',
            'ratings' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        Trip::where('id',$input['trip_id'])->update([ 'customer_rating' => $input['ratings']]);
        $trip = Trip::where('id',$input['trip_id'])->first();
        if(is_object($trip)){
            $this->customer_rating($trip->customer_id);
            return response()->json([
                "result" => $trip,
                "message" => 'Success',
                "status" => 1
            ]);
        }else{
            return response()->json([
                "message" => 'Something went wrong',
                "status" => 0
            ]);
        }

    }

}
