<?php

use App\jobs\ReconcileAccount;
use App\jobs\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');

    $user = User::first();

    // dispatch(new ReconcileAccount($user));

    ReconcileAccount::dispatch($user);
    SendWelcomeEmail::dispatch();
    

    // foreach (range(1, 100) as $i) {
    //     SendWelcomeEmail::dispatch();
    // }

    return 'Finished';
});
