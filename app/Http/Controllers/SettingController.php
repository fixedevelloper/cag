<?php


namespace App\Http\Controllers;


use App\Helpers\UploadableTrait;
use App\Models\Country;
use App\Models\CryptoMonaire;
use App\Models\Trading;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    use UploadableTrait;
    public function profil(Request $request)
    {
        $user=Auth::user();
        if ($request->method()=="POST"){
            if ($request->has('first_name')){
                $user->first_name=$request->first_name;
                $user->last_name=$request->last_name;
                $user->email=$request->email;
                $user->country_id=$request->country_id;
                $user->city=$request->city;
                $user->phone=$request->phone;
                $user->date_born=$request->date_born;
                $user->address=$request->address;
                $user->postal_code=$request->postal_code;
                $user->first_name=$request->first_name;
            }

            if ($request->hasFile('photo') && $request->file('photo') instanceof UploadedFile) {
                $photo = $this->storeFile($request->file('photo'), 'photos');
                $user->photo = $photo;
            }
            $user->save();
        }
        return view('back.settings.profil', [
            'user'=>$user,
            'countries'=>Country::all()
        ]);
    }
    public function application(Request $request)
    {
        return view('back.settings.application', []);
    }
    public function security(Request $request)
    {
        return view('back.settings.security', []);
    }
    public function activity(Request $request)
    {
        return view('back.settings.activity', []);
    }
    public function privacy(Request $request)
    {
        return view('back.settings.privacy', []);
    }
    public function fees(Request $request)
    {
        return view('back.settings.fees', []);
    }

    public function add_wallet($id,Request $request)
    {
        if ($request->method() == "POST"){
            $short = new Wallet();
        $short->crypto_id = $id;
        $short->user_id = Auth::user()->id;
        $short->total = 0.0;
        $short->address = $request->get('address');
        $short->total_cfa = 0.0;
        $short->total_btc = 0.0;
        $short->save();
        toastr()->success("Wallet add successful", 'Successful request', ["Failed loggedIn"]);
        return redirect()->back();
    }
        $cripto=CryptoMonaire::query()->find($id);
        return view('back.modals.add_wallet', [
            'crypto'=>$cripto
        ]);
    }
    public function getCryptoSell(Request $request)
    {
        $quantity=$request['quantity'];
        $crypto=CryptoMonaire::query()->find($request['id']);
        return response()->json(['data' => [
            "amount"=>$quantity/$crypto->taux,
            'taux'=>1/$crypto->taux,
            'crypto'=>$crypto->symbol
        ], 'status' => true]);

    }
    public function getCryptoBuy(Request $request)
    {
        $amount=$request['amount'];
        $crypto=CryptoMonaire::query()->find($request['id']);
        return response()->json(['data' => [
            "qte"=>$amount*$crypto->taux,
            'taux'=>1/$crypto->taux,
            'crypto'=>$crypto->symbol
        ], 'status' => true]);

    }
    public function getCryptoExchange(Request $request)
    {
        $quantity_send=$request['quantity'];
        $crypto_send=CryptoMonaire::query()->find($request['id_send']);
        $crypto_receive=CryptoMonaire::query()->find($request['id_receive']);
        return response()->json(['data' => [
            "qte"=>($crypto_receive->btcPrice*$quantity_send)/$crypto_send->btcPrice,
            "taux"=>$crypto_send->taux,
            "taux_receive"=>$crypto_receive->taux,
            'crypto'=>$crypto_receive->symbol
        ], 'status' => true]);

    }
    public function sell_modal(Request $request)
    {
        if ($request->method() == "POST"){
            $short = new Trading();
            $short->crypto_id = $request->get('crypto_id');
            $short->user_id = Auth::user()->id;
            $short->amount = $request->get('currency_sell');
            $short->quantity = $request->get('quantity');
            $short->type_trade = Trading::TRADE_SELL;
            $short->save();
            toastr()->success("Wallet add successful", 'Successful request', ["Failed loggedIn"]);
            return redirect()->back();
        }
        $crypto=CryptoMonaire::query()->find($request->id);
        $wallet=Wallet::query()->firstWhere(['user_id'=>Auth::user()->id,'crypto_id'=>$request->id]);
        return view('back.modals.sell_crypto', [
            'crypto'=>$crypto,
            'quantity'=>$request->quantity,
            'currency_sell'=>$request->currency_sell,
            'wallet'=>$wallet
        ]);
    }
    public function exchange_modal(Request $request)
    {
        if ($request->method() == "POST"){
            $short = new Trading();
            $short->crypto_id = $request->get('crypto_id');
            $short->user_id = Auth::user()->id;
            $short->amount = $request->get('currency_sell');
            $short->quantity = $request->get('quantity');
            $short->type_trade = Trading::TRADE_EXCHANGE;
            $short->save();
            toastr()->success("Wallet exchange successful", 'Successful request', ["Failed loggedIn"]);
            return redirect()->back();
        }
        if (!isset($request->id)){
            //return back();
        }
        $crypto=CryptoMonaire::query()->find($request->id);
        $wallet=Wallet::query()->firstWhere(['user_id'=>Auth::user()->id,'crypto_id'=>$request->id]);
        $crypto_receive=CryptoMonaire::query()->find($request->id_receive);
        return view('back.modals.exchange_crypto', [
            'crypto'=>$crypto,
            'crypto_receive'=>$crypto_receive,
            'quantity_send'=>$request->quantity_send,
            'quantity_receive'=>$request->quantity_receive,
            'currency_sell'=>$request->currency_sell,
            'wallet'=>$wallet
        ]);
    }
    public function buy_modal(Request $request)
    {

        if ($request->method() == "POST"){
            if ($request->amount > Auth::user()->balance) {
            toastr()->error("Balance insufficient", 'Request error', ["Failed loggedIn"]);
            return back();
        }
            $short = new Trading();
            $short->crypto_id = $request->get('crypto_id');
            $short->user_id = Auth::user()->id;
            $short->amount = $request->get('amount');
            $short->quantity = $request->get('quantity');
            $short->type_trade = Trading::TRADE_BUY;
            $short->save();
            toastr()->success("Buy Crypto add successful", 'Successful request', ["Failed loggedIn"]);
            return redirect()->back();
        }
        $crypto=CryptoMonaire::query()->find($request->id);
        $wallet=Wallet::query()->firstWhere(['user_id'=>Auth::user()->id,'crypto_id'=>$request->id]);
        return view('back.modals.buy_crypto', [
            'crypto'=>$crypto,
            'quantity'=>$request->quantity,
            'amount'=>$request->amount,
            'wallet'=>$wallet
        ]);
    }
}
