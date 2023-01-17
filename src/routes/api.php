<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DataDinkes;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('dinkes')->name('dinkes.')->group(function () {
    Route::get('data', [DataDinkes::class, 'index'])->name('getdata'); // Get data
    Route::get('detail', [DataDinkes::class, 'show'])->name('detail');
});
