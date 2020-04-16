<?php

namespace App\Http\Controllers\API;

use App\User;
use App\TestAPI;
use App\Http\Controllers\API\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\billingtable;

class UserController extends Controller
{

  public function callback(Request $request)
    {
        //dd($request->username);

        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string'],
            'mobile_number' => ['required', 'string'],
            'amount_to_bill' => ['required', 'string'],
            ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], 400);
        }
        $info = billingtable::create([
            'username'=>$request['username'],
            'mobile_number'=>$request['mobile_number'],
            'amount_to_bill'=>$request['amount_to_bill']
        ]);
    return response()->json([compact('info'), 'message' => 'data inserted successfully'],201);
    }

}