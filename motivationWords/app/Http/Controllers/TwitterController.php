<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    //

    public function redirectToProvider(){
        return Socialite::driver('twitter')->user();
    }

    public function handleProviderCallback(){
        try{
            $twitterUser = Socialite::driver('twitter')->user();
        }catch (Exception $e){
            return redirect('auth/twitter');
        }
    }
}
