<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->post('/login',function (Request $request){
    $input = $request->only('email');
    $jwt_token = null;
    $user=\App\Models\User::where('email','=',$input)->first();

    if (!$jwt_token = JWTAuth::fromUser($user)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid Email',
        ], Response::HTTP_UNAUTHORIZED);
    }

    return response()->json([
        'success' => true,
        'token' => $jwt_token,
    ]);
});
Route::middleware('jwt')->get('/users', function () {
   $data =  DB::table('users')->get();
    return response()->json([
        'success' => true,
        'data' => $data,
    ]);
});
