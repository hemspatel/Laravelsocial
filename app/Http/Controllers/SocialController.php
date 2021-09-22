<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
      public function googleauth()
      {
          $guser = Socialite::driver('google')->stateless()->user();
          $user = User::where('email',$guser->email)->first();
           if(!empty($user)){
             $user->avatar = $guser->avatar;
             $user->save();
             Auth::login($user);
             return redirect(RouteServiceProvider::HOME);
           }
          $user = User::create([
              'name' => $guser->name,
              'email' => $guser->email,
              'avatar' => $guser->avatar,
              'password' => Hash::make($guser->id.$guser->email),
          ]);
          event(new Registered($user));
          Auth::login($user);
          return redirect(RouteServiceProvider::HOME);
      }
}
