<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Trading;
use App\Models\User;
use Illuminate\Http\Request;

class TradeController extends Controller
{

    public function pending(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $countries = Trading::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $countries = new Trading();
        }
        $countries = $countries->where(['status'=>Trading::PENDING])->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('admin.trade.pending',[
            'items'=>$countries
        ]);
    }
    public function all_trade(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $countries = Trading::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $countries = new Trading();
        }
        $countries = $countries->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('admin.trade.trade_all',[
            'items'=>$countries
        ]);
    }
    public function trade_detail($id,Request $request)
    {
        $trade=Trading::query()->find($id);
        if ($request->has('status')){
            if ($trade->status==Trading::ACCEPTED || $trade->status==Trading::DENIED){
                return back();
            }
            if ($request->status==Trading::ACCEPTED){
                switch ($trade->type_trade){
                    case Trading::TRADE_BUY:
                        $this->processBuy($trade);
                        break;
                    case Trading::TRADE_SELL:
                        $this->processSell($trade);
                        break;
                    case Trading::TRADE_EXCHANGE:
                        $this->processExchange($trade);
                        break;
                }
            }
            $trade->status=$request->status;
            $trade->save();
        }
        return view('admin.trade.trade_detail',[
            'item'=>$trade
        ]);
    }
    private function processBuy($trade){
        $user=User::query()->find($trade->user_id);
        $user->balance=$user->balance-$trade->amount;
        $user->save();
    }
    private function processSell($trade){
        $user=User::query()->find($trade->user_id);
        $user->balance=$user->balance+$trade->amount;
        $user->save();
    }
    private function processExchange($trade){

    }
}
