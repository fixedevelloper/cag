<?php


namespace App\Http\Controllers\API;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SecurityController extends BaseController
{
    function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator, 'User login failed.');
        }
        $user=User::query()->firstWhere(['phone'=>$request->phone]);
        //availability check
        if (!isset($user)) {
            return $this->sendError("Phone not register", 'User login failed.');
        }
        if ($user->user_type != User::CUSTOMER_TYPE && $user->user_type != User::DRIVER_TYPE
        ) {
            return $this->sendError("User have not access on this resource", 'User login failed.');
        }
        //status active check
        if (isset($user->is_active) && !$user->is_active) {
            return $this->sendError("Not activate", 'User login failed.');
        }
        if (!Hash::check($request['password'], $user['password'])) {
            return $this->sendError("Not match password", 'User login failed.');
        }
        $user->update(['last_active_at' => now()]);
        $success['token'] = $user->createToken('ApiToken')->plainTextToken;
        $success['first_name'] = $user->first_name;
        $success['last_name'] = $user->last_name;
        $success['phone'] = $user->phone;
        $success['photo']=$user->photo;
        $success['id'] = $user->id;
        $success['user_type'] = $user->user_type;
        return $this->sendResponse($success, 'User login successfully.');
    }
    function create(Request $request){

        return $this->sendResponse([], 'request successfully.');
    }
    function checkAccount(Request $request){
        $status=false;
        $userMobile=UserMobile::query()->firstWhere(['user_id'=>$request->user_id]);
        if (is_null($userMobile)){
            $userMobile=new UserMobile();
            $userMobile->device_id=$request->device_id;
            $userMobile->fcm_id=$request->fcm_id;
            $userMobile->user_id=$request->user_id;
            $userMobile->save();
        }
        return $this->sendResponse([
            $userMobile
        ], 'request successfully.');
    }
    function updateFcm(Request $request){
        $status=false;
        $userMobile=UserMobile::query()->firstWhere(['user_id'=>$request->user_id]);
        if (is_null($userMobile)){
            $userMobile=new UserMobile();
            $userMobile->device_id=$request->device_id;
            $userMobile->fcm_id=$request->fcm_id;
            $userMobile->user_id=$request->user_id;
            $userMobile->save();
        }
        return $this->sendResponse(
            $userMobile
            , 'request successfully.');
    }
    function getCustomerAccount(Request $request,$id){
        $customer=User::query()->find($id);
        return $this->sendResponse([
            'first_name'=>$customer->first_name,
            'last_name'=>$customer->last_name,
            'phone'=>$customer->phone,
            'email'=>$customer->email,
            'date_born'=>$customer->date_born,
            'photo'=>$customer->photo,
            'facebook'=>$customer->facebook,
            'youtube'=>$customer->youtube,
            'balance'=>$customer->balance,
            'phone_verified'=>$customer->phone_verified,
            'email_verified'=>$customer->email_verified,
            'city_id'=>$customer->city_id,
            'city_name'=> is_null($customer->city)?"":$customer->city->name,
            'postal_code'=>$customer->postal_code,
        ], 'request successfully.');
    }
    function getDriverAccount(Request $request,$id){
        $customer=User::query()->find($id);
        return $this->sendResponse([
            'first_name'=>$customer->first_name,
            'last_name'=>$customer->last_name,
            'phone'=>$customer->phone,
            'email'=>$customer->email,
            'date_born'=>$customer->date_born,
            'photo'=>$customer->photo,
            'facebook'=>$customer->facebook,
            'youtube'=>$customer->youtube,
            'balance'=>$customer->balance,
            'phone_verified'=>$customer->phone_verified,
            'email_verified'=>$customer->email_verified,
            'city_id'=>$customer->city_id,
            'city_name'=> is_null($customer->city)?"":$customer->city->name,
            'postal_code'=>$customer->postal_code,
            'document_id'=>$customer->document_id,
            'document_type'=>$customer->document_type,
            'document_recto'=>$customer->document_recto,
            'document_verso'=>$customer->document_verso,
            'driving_license_number'=>$customer->driving_license_number,
            'driving_license_from'=>$customer->driving_license_from,
            'driving_license_back'=>$customer->driving_license_back,
            'unique_number'=>$customer->unique_number,
        ], 'request successfully.');
    }
}
