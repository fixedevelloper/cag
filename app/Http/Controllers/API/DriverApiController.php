<?php


namespace App\Http\Controllers\API;


use App\Helpers\Helper;
use App\Helpers\UploadableTrait;
use App\Models\Annonce;
use App\Models\AnnonceSelected;
use App\Models\DriverVehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverApiController extends BaseController
{
    use UploadableTrait;

    function createDriver(Request $request)
    {
        //  logger($request->all());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => '',
            'photo' => '',
            'phone' => 'required|min:5|max:20|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->getMessages(), 403);
        }
        try {


            $driver = new User();
            $driver->first_name = $request->first_name;
            $driver->phone = $request->phone;
            $driver->last_name = $request->last_name;
            $driver->email = $request->email;
            if ($request->has('date_born')) {
                $driver->date_born = $request->date_born;
            }
            $driver->password = bcrypt($request->get('password'));
            $driver->user_type = User::DRIVER_TYPE;
            if ($request->has('photo')) {
                $driver->photo = $this->uploadOne($request->file('photo'), 'drivers');
            }
            if ($request->has('driver_card_from')) {
                $driver->driving_license_from = Helper::base64Tofile("photo/", [
                    'image' => $request->driver_card_from,
                    'image_type' => $request->driver_card_from_image_type,
                ]);
            }
            if ($request->has('driver_card_back')) {
                $driver->driving_license_back = Helper::base64Tofile("photo/", [
                    'image' => $request->driver_card_back,
                    'image_type' => $request->driver_card_back_image_type,
                ]);
            }
            $driver->driving_license_number = $request->driving_license_number;
            // $driver->email=$request->email;

            $driver->save();
            $driver->update(['last_active_at' => now()]);
            $success['token'] = $driver->createToken('ApiToken')->plainTextToken;
            $success['first_name'] = $driver->first_name;
            $success['last_name'] = $driver->last_name;
            $success['phone'] = $driver->phone;
            $success['photo'] = $driver->photo;
            $success['id'] = $driver->id;
            $success['user_type'] = $driver->user_type;
            return $this->sendResponse($success, 'request successfully.');
        } catch (\Exception $exception) {
            logger($exception->getMessage());
            return $this->sendError($exception->getMessage());
        }
    }

    function createVehiculeDriver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'driver_id' => 'required',
            'brand' => 'required',
            'number' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->getMessages(), 403);
        }
        $vehicle = new DriverVehicle();
        $vehicle->driver_id = $request->driver_id;
        $vehicle->brand = $request->brand;
        $vehicle->number = $request->number;
        $vehicle->color = $request->color;
        if ($request->has('image_from')) {
            $vehicle->image_from = Helper::base64Tofile("vehicles/", [
                'image' => $request->image_from,
                'image_type' => $request->image_fromk_type,
            ]);
        }
        if ($request->has('image_back')) {
            $vehicle->image_back = Helper::base64Tofile("vehicles/", [
                'image' => $request->image_back,
                'image_type' => $request->image_back_type,
            ]);
        }
        if ($request->has('image_left')) {
            $vehicle->image_left = Helper::base64Tofile("vehicles/", [
                'image' => $request->image_left,
                'image_type' => $request->image_left_type,
            ]);
        }
        if ($request->has('image_right')) {
            $vehicle->image_right = Helper::base64Tofile("vehicles/", [
                'image' => $request->image_right,
                'image_type' => $request->image_right_type,
            ]);
        }
        $vehicle->save();
        return $this->sendResponse($vehicle, 'request successfully.');

    }


    function getVehicle(Request $request, $driver_id)
    {
        $data = [];
        $lists = DriverVehicle::query()->where(['driver_id' => $driver_id])->get();
        foreach ($lists as $list) {
            $data[] = [
                'id' => $list->id,
                'brand' => $list->brand,
                'number' => $list->number,
                'color' => $list->color,
                'image_from' => $list->image_from,
                'image_back' => $list->image_back,
                'image_left' => $list->image_left,
                'image_right' => $list->image_right,
            ];
        }
        return $this->sendResponse($data, 'request successfully.');
    }

    public function addAnnonce(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'driver_vehicle_id' => 'required',
            'city_from_id' => 'required',
            'city_to_id' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors()->getMessages(), 403);
        }
        $announce = new Annonce();
        $announce->driver_id = $request->driver_id;
        $announce->driver_vehicle_id = $request->driver_vehicle_id;
        $announce->city_from_id = $request->city_from_id;
        $announce->city_to_id = $request->city_to_id;
        $announce->price = $request->price;
        $announce->distance = $request->distance;
        $announce->number_person = $request->number_person;
        $announce->date_start = $request->date_start;
        $announce->time_start = $request->time_start;
        $announce->departure_place = $request->departure_place;
        $announce->departure_latitude = $request->departure_latitude;
        $announce->departure_longitude = $request->departure_longitude;
        $announce->save();
        return $this->sendResponse($announce, 'request successfully.');
    }

    public function listAnonces(Request $request, $id)
    {
        $offset = $request->get("offset");
        if (!isset($offset)) {
            $offset = 0;
        }
        $limit = $request->get('limit');
        if (!isset($limit)) {
            $limit = 20;
        }
        try {
            $annonces = Annonce::query()->where('driver_id', '=', $id)->orderByDesc('created_at')->paginate($limit)->appends($id);
            $list = [];
            foreach ($annonces as $annonce) {
                $list[] = [
                    'id' => $annonce->id,
                    'driver_name' => $annonce->driver->first_name . ' ' . $annonce->driver->last_name,
                    'driver_id' => $annonce->driver->id,
                    'city_from_id' => $annonce->city_from_id,
                    'city_from_name' => $annonce->city_from->name,
                    'city_to_id' => $annonce->city_to_id,
                    'city_to_name' => $annonce->city_to->name,
                    'number_person' => $annonce->number_person,
                    'reserved_place' => $annonce->reserved_place,
                    'driver_vehicle_id' => $annonce->driver_vehicle_id,
                    'vehicle_brand' => $annonce->driver_vehicle->brand,
                    'vehicle_color' => $annonce->driver_vehicle->color,
                    'vehicle_image_from' => 'storage/' . $annonce->driver_vehicle->image_from,
                    'vehicle_image_back' => 'storage/' . $annonce->driver_vehicle->image_back,
                    'vehicle_image_left' => 'storage/' . $annonce->driver_vehicle->image_left,
                    'vehicle_image_right' => 'storage/' . $annonce->driver_vehicle->image_right,
                    "vehicle_number" => $annonce->driver_vehicle->number,
                    'distance' => $annonce->distance,
                    'price' => $annonce->price,
                    'namedeparture_place' => $annonce->namedeparture_place,
                    'departure_latitude' => $annonce->departure_latitude,
                    'departure_longitude' => $annonce->departure_longitude,
                    'time_start' => $annonce->time_start,
                    'date_start' => $annonce->date_start,

                ];
            }
        } catch (\Exception $exception) {
            logger($exception);
            return $this->sendError($exception->getMessage(), [$exception->getMessage()]);
        }

        return $this->sendResponse($list, 'request successfully.');
    }

    public function getPassagers(Request $request, $id)
    {
        $announceds = AnnonceSelected::query()->where(['annonce_id' => $id])->get();
        $list = [];
        foreach ($announceds as $announced) {
            $list[] = [
                "first_name" => $announced->customer->first_name,
                "last_name" => $announced->customer->last_name,
                "phone" => $announced->customer->phone,
                "date_born" => $announced->customer->date_born,
                'age' => is_null($announced->customer->date_born) ? 0 :Helper::getAge($announced->customer->date_born),
                'photo' => $announced->customer->photo,
                'facebook' => $announced->customer->facebook,
                'youtube' => $announced->customer->youtube,
                'balance' => $announced->customer->balance,
                'phone_verified' => $announced->customer->phone_verified,
                'email_verified' => $announced->customer->email_verified,
                'city_id' => $announced->customer->city_id,
                'city_name' => is_null($announced->customer->city) ? "" : $announced->customer->city->name,
                'postal_code' => $announced->customer->postal_code,
            ];
        }
        return $this->sendResponse($list, 'request successfully.');
    }
}
