<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;

class FacebookController extends Controller
{
    public function getInfo($facebook)
    {
        return Socialite::driver($facebook)->redirect();
    }

    public function checkInfo($facebook)
    {
        $info = Socialite::driver($facebook)->user();
        dd($info);
    }


}
