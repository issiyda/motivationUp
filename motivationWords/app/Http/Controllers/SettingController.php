<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //

    public function settingColor($id ,Request $request){

        $user = \App\User::find($id);

        $user->fill($request->all())->update();

        return response()->json([
            'success' => 'user color setting!',
            'data' => $request
        ],200);

    }
}
