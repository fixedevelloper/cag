<?php


namespace App\Http\Controllers\API;


use App\Helpers\Helper;
use App\Helpers\UploadableTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverApiController extends BaseController
{
    use UploadableTrait;

    function createDriver(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => '',
            'photo' => '',
            'phone' => 'required|min:5|max:20|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helper::error_processor($validator)], 403);
        }
        $driver=new User();
        $driver->first_name=$request->first_name;
        $driver->phone=$request->phone;
        $driver->last_name=$request->last_name;
        $driver->email=$request->email;
        if($request->has('date_born')) {
            $driver->date_born = $request->date_born;
        }
        $driver->password = bcrypt($request->get('password'));
        $driver->user_type=User::DRIVER_TYPE;
        if($request->has('photo')){
            $driver->photo = $this->uploadOne($request->file('photo'), 'drivers');
        }

        $driver->save();
        return $this->sendResponse($driver, 'request successfully.');
    }
    function createVehiculeDriver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'driver_id' => 'required',
            'vehicle_type_id' => 'required',
            'model' => '',
            'number_of_vehicle' => 'required',
            'number_passenger' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helper::error_processor($validator)], 403);
        }
        $vehicle=new Vehicule();
        $vehicle->driver_id=$request->driver_id;
        $vehicle->vehicle_type_id=$request->vehicle_type_id;
        $vehicle->model=$request->model;
        $vehicle->name=$request->name;
        $vehicle->brand=$request->brand;
        $vehicle->number_place=$request->number_place;
        $vehicle->color=$request->color;
        $vehicle->register_number=$request->register_number;
        $vehicle->save();
        return $this->sendResponse($vehicle, 'request successfully.');

    }
    function addImageVehicule(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required',
            'src' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helper::error_processor($validator)], 403);
        }
        $vehicle_image=new VehiculeImage();
        $vehicle_image->src=$request->src;
        $vehicle_image->vehicule_id=$request->vehicule_id;
        $vehicle_image->save();
        return $this->sendResponse($vehicle_image, 'request successfully.');

    }
    function getDriverByPosition(Request $request){
        $longitude=$request->longitude;
        $latitude=$request->longitude;
        return $this->sendResponse([], 'request successfully.');
    }
    function getRideDriver(Request $request){
        if ($request->has('date')){
            $rides=Ride::query()->where('start_date','=',$request->date)->where('driver_id','=',$request->driver_id)->get();
        }else{
            $rides=Ride::query()->where('start_date','=',$request->date)->get();
        }
        return $this->sendResponse([
            $rides
        ], 'request successfully.');
    }
}
