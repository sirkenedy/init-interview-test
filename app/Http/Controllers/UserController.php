<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('session.check');
    // }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInfo(UserStoreRequest $request)
    {
        $data = $request->all();
        $user = User::updateOrCreate(
            ['email' => $data['email']],
            $data
        );
        session(['user_key' => $data['email']]);
        return redirect('/entries');
    }

    public function removeInfo(Request $request)
    {
        $request->session()->flush();
        
        return redirect('/');
    }
}
