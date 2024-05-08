<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $countries = User::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $countries = new User();
        }
        $countries = $countries->where(['user_type'=>User::ADMIN_TYPE])->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('admin.users.users',[
            'items'=>$countries
        ]);
    }
    public function customers(Request $request)
    {
        $query_param = [];
        $search = $request->search;
        if ($request->has('search')) {
            $countries = User::query()->where('name', 'like', "%$search%")
                ->orWhere('iso', 'like', "%$search%");
            $query_param = ['search' => $request['search']];
        } else {
            $countries = new User();
        }
        $countries = $countries->where(['user_type'=>User::CUSTOMER_TYPE])->orderByDesc('created_at')->paginate(20)->appends($query_param);

        return view('admin.users.customers',[
            'items'=>$countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $u)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $u)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $u)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $u)
    {
        //
    }
}
