<?php


namespace App\Http\Controllers;


use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }

    public function signin(Request $request)
    {

        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), $rules = [
                'email' => ['required', 'email'],
                'password' => 'required',

            ], $messages = [
                'email.required' => 'Email field is required!',
                'password.required' => 'password  is required!',
            ]);
            if ($validator->fails()) {
                toastr()->error("Email or password required", 'Request failed', ["Failed loggedIn"]);
                return redirect()->back()
                    ->withErrors($validator)->with(['message' => $messages])
                    ->withInput();
            }
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
          //  Auth::guard('web')->logout();
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'activated' => true], $request->remember)) {
                toastr()->success("Authentication successful", 'Request Success', ["Success loggedIn"]);
                $request->session()->regenerate();
                if (Auth::user()->user_type==User::CUSTOMER_TYPE || Auth::user()->user_type==User::DRIVER_TYPE){
                    return redirect()->route('back.dashboard');
                }elseif (Auth::user()->user_type==User::ADMIN_TYPE){
                    return redirect()->route('admin.bc_dashboard');
                }

            }
            toastr()->error("User not found or User not activate", 'Request failed', ["Failed loggedIn"]);
            return redirect()->route('auth.signin');
        }
        return view('auth.signin');
    }

    public function lock(Request $request)
    {

        return view('auth.lock');
    }

    public function register(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), $rules = [
                'email' => ['required', 'email'],
                'first_name' => 'required',
                'phone' => 'required',
                'password' => 'required',

            ], $messages = [
                'email.required' => 'Email field is required!',
                'password.required' => 'password  is required!',
                'first_name.required' => 'name  is required!',
                'phone.required' => 'phone  is required!',
            ]);
            if ($validator->fails()) {
                toastr()->error($validator->getException(), 'Request failed', ["Failed loggedIn"]);
                return redirect()->back()
                    ->withErrors($validator)->with(['message' => $messages])
                    ->withInput();
            }

            $user=new User();
            $user->first_name=$request->first_name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->password=bcrypt($request->password);
            $user->user_type=User::CUSTOMER_TYPE;
            $user->unique_number=Helper::generatenumber();
            $user->save();
            toastr()->success("User save successfull", 'Request success', ["Failed loggedIn"]);
        /*    Helper::send_creation_account([
                'email'=>$user->email,
                'first_name'=>$user->first_name,
                'activate_key'=>$user->unique_number
            ]);*/
            return redirect()->route('auth.email_verified',['putrezasetup'=>$user->unique_number]);
        }
        return view('auth.register');
    }
    public function register_driver(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), $rules = [
                'email' => ['required', 'email'],
                'first_name' => 'required',
                'phone' => 'required',
                'password' => 'required',

            ], $messages = [
                'email.required' => 'Email field is required!',
                'password.required' => 'password  is required!',
                'first_name.required' => 'name  is required!',
                'phone.required' => 'phone  is required!',
            ]);
            if ($validator->fails()) {
                toastr()->error($validator->getException(), 'Request failed', ["Failed loggedIn"]);
                return redirect()->back()
                    ->withErrors($validator)->with(['message' => $messages])
                    ->withInput();
            }

            $user=new User();
            $user->first_name=$request->first_name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->password=bcrypt($request->password);
            $user->user_type=User::DRIVER_TYPE;
            $user->unique_number=Helper::generatenumber();
            $user->save();
            toastr()->success("User save successfull", 'Request success', ["Failed loggedIn"]);
            /*    Helper::send_creation_account([
                    'email'=>$user->email,
                    'first_name'=>$user->first_name,
                    'activate_key'=>$user->unique_number
                ]);*/
            return redirect()->route('auth.email_verified',['putrezasetup'=>$user->unique_number]);
        }
        return view('auth.register_driver');
    }
    public function email_verified(Request $request)
    {
        $user=User::query()->firstWhere(['unique_number'=>$request->get("putrezasetup")]);
        if (is_null($user)){
            return back();
        }
        if ($request->has('activate_key')){
            $user->email_verified=true;
            $user->activated=true;
            $user->save();
            return redirect()->route('back.dashboard');
        }
        return view('auth.email_verified',[
            'user'=>$user
        ]);
    }

    public function password_forget(Request $request)
    {

        return view('auth.register');
    }

    public function step_verified(Request $request)
    {

        return view('auth.register');
    }
}
