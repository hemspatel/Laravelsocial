<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/google/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('googleauth');

Route::get('/google/callback',[SocialController::class, 'googleauth']);

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/google/callback', function () {
//     $user = Socialite::driver('google')->user();
//     echo "<pre>";
//   	print_r($user);
//   	echo "</pre>";die;
// });
