<?php


namespace App\Http\Controllers;


use App\Helpers\Helper;
use App\Helpers\UploadableTrait;
use App\Models\Annonce;
use App\Models\City;
use App\Models\DriverVehicle;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
use UploadableTrait;
    public function my_announce(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $annonces = Annonce::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $annonces = new Annonce();
        }
        $annonces = $annonces->where(['driver_id'=>Auth::user()->id])->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('back.driver.annonce.list',[
            'items'=>$annonces
        ]);
    }
    public function create_announce(Request $request)
    {
        if ($request->method()=="POST"){
            $validator = Validator::make($request->all(), [
                'driver_vehicle_id' => 'required',
                'city_from_id' => 'required',
                'city_to_id' => 'required',
                'price' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => Helper::error_processor($validator)], 403);
            }
            $annonce=new Annonce();
            $annonce->city_from_id=$request->city_from_id;
            $annonce->city_to_id=$request->city_to_id;
            $annonce->distance=$request->distance;
            $annonce->number_person=$request->number_person;
            $annonce->price=$request->price;
            $annonce->date_start=$request->date_start;
            $annonce->time_start=$request->time_start;
            $annonce->departure_place=$request->departure_place;
            $annonce->departure_latitude=$request->departure_latitude;
            $annonce->departure_longitude=$request->departure_longitude;
            $annonce->driver_vehicle_id=$request->driver_vehicle_id;
            $annonce->driver_id=Auth::user()->id;
            $annonce->save();
            return back();
        }
        return view('back.driver.annonce.create',[
            'cities'=>City::all(),
            'vehicles'=>DriverVehicle::query()->where(['driver_id'=>Auth::user()->id])->get()
        ]);
    }
    public function setting(Request $request)
    {
        $user=Auth::user();
        if ($request->has("email")){
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->phone=$request->phone;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->postal_code=$request->postal_code;
            $user->save();
        }
        return view('back.driver.setting',[
            'item'=>Auth::user()
        ]);
    }
    public function my_cars(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $items = DriverVehicle::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $items = new DriverVehicle();
        }
        $items = $items->where(['driver_id'=>Auth::user()->id])->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('back.driver.vehicle',[
            'items'=>$items,
        ]);
    }
    public function my_trip(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $items = DriverVehicle::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $items = new DriverVehicle();
        }
        $items = $items->where(['driver_id'=>Auth::user()->id])->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('back.driver.mytrip',[
            'items'=>$items,
        ]);
    }
    public function follow_annonce(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        $item=new Annonce();
        if ($request->has('search')) {
            $item = Annonce::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
        }
        return view('back.driver.follow_annonce',[
            'item'=>$item,
        ]);
    }
    public function add_car_modal(Request $request)
    {
        $user=Auth::user();
        if ($request->has("brand")){
            logger($request->allFiles());
            $car=new DriverVehicle();
            $car->brand=$request->brand;
            $car->number=$request->number;
            $car->color=$request->color;
            $car->driver_id=$user->id;
            if ($request->hasFile('image_from') && $request->file('image_from') instanceof UploadedFile) {
                $image_from = $this->storeFile($request->file('image_from'), 'vehicules');
                $car->image_from = $image_from;
            }
            if ($request->hasFile('image_back') && $request->file('image_back') instanceof UploadedFile) {
                $image_back= $this->storeFile($request->file('image_back'), 'vehicules');
                $car->image_back = $image_back;
            }
            if ($request->hasFile('image_left') && $request->file('image_left') instanceof UploadedFile) {
                $image_left= $this->storeFile($request->file('image_left'), 'vehicules');
                $car->image_left = $image_left;
            }
            if ($request->hasFile('image_right') && $request->file('image_right') instanceof UploadedFile) {
                $image_right = $this->storeFile($request->file('image_right'), 'vehicules');
                $car->image_right = $image_right;
            }
            $car->save();
            return back();
        }
        return view('back.driver.add_vehicle',[
            'item'=>Auth::user(),
            'vehicles'=>DriverVehicle::query()->where(['driver_id'=>Auth::user()->id])
        ]);
    }
}
