<?php


namespace App\Http\Controllers;


use App\Models\Annonce;
use App\Models\AnnonceSelected;
use App\Models\DriverVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function my_trip(Request $request)
    {  $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $items = AnnonceSelected::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $items = new AnnonceSelected();
        }
        $items = $items->where(['driver_id'=>Auth::user()->id])->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('back.customer.my_trip', [
            'items'=>$items,

        ]);
    }
    public function my_favorite(Request $request)
    {  $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $items = AnnonceSelected::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $items = new AnnonceSelected();
        }
        $items = $items->where(['driver_id'=>Auth::user()->id])->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('back.customer.my_favorite', [
            'items'=>$items,

        ]);
    }
    public function list_announcement(Request $request)
    {  $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $items = Annonce::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $items = new Annonce();
        }
        $items = $items->where('date_start','>=',date('Y-m-d'))->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('back.customer.list_announcement', [
            'items'=>$items,
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
        return view('back.customer.setting',[
            'item'=>Auth::user()
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
        return view('back.customer.follow_annonce',[
            'item'=>$item,
        ]);
    }
}
