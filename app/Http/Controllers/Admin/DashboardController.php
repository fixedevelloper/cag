<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CryptoMonaire;
use App\Models\Trading;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        return view("admin.dashboard");
    }
    public function profil(Request $request){
        return view("admin.profile");
    }
    public function countries(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        $iso = $request->iso;
        if ($request->has('search')) {
            $countries = Country::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $countries = new Country();
        }
        $countries = $countries->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('admin.country',[
            'items'=>$countries
        ]);
    }
    public function cryptos(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        $iso = $request->iso;
        if ($request->has('search')) {
            $cryptos = CryptoMonaire::query()->where('name', 'like', "%$search%")
                ->orWhere('symbol', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $cryptos = new CryptoMonaire();
        }
        $cryptos = $cryptos->orderByDesc('status')->paginate(20)->appends($query_param);

        return view('admin.cryptos',[
            'items'=>$cryptos
        ]);
    }
    public function taux_modal(Request $request)
    {   $crypto=CryptoMonaire::query()->find($request->id);
        if ($request->method() == "POST"){
            if ($crypto->status==false){
                toastr()->success("Crypto not activate", 'Error request', ["Failed loggedIn"]);
                return back();
            }
            $crypto->taux=$request->get('taux_buy');
            $crypto->taux_sell=$request->get('taux_sell');
            $crypto->save();
            toastr()->success("Wallet add successful", 'Successful request', ["Failed loggedIn"]);
            return redirect()->back();
        }

        return view('admin.modals.taux_echange', [
            'crypto'=>$crypto,
            'quantity'=>$request->quantity,
            'currency_sell'=>$request->currency_sell,
        ]);
    }
    public function activeOrDesactive($id,Request $request)
    {
        $crypto=CryptoMonaire::query()->find($id);
        if ($crypto->status){
            $crypto->status=false;
        }else{
            $crypto->status=true;
        }
        $crypto->save();
        return back();
    }
    }
