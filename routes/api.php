<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return 'server is runing';
});
Route::get('/main-character/book/{book_id}', [CharacterController::class, 'index']);
Route::get('/book-cover', [BookController::class, 'showCoverByIsbn']);
Route::get('/book-by-character/{character_id}', [BookController::class, 'showBookByCharacter']);
Route::get('/character-details', [CharacterController::class, 'ShowDetails']);
