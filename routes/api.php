<?php

use Illuminate\Http\Request;

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

/*
 * The auth route is outside of the middleware block, since it generates the token that is needed when accessing routes
 * that are protected with the "jwt" middleware.
 */
Route::get("/auth", "Auth\LoginController@authenticateApiUser");

/*
 * The API routes are protected via JWT authentication
 */
Route::middleware(['api', 'jwt'])->get('/user', function (Request $request) {
    return $request->user();
});