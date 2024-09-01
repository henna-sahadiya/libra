<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cntrool;    

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('login',[cntrool::class,'loginn'])->name('logi');
Route::post('login',[cntrool::class,'log']);
Route::group(['middleware'=>['mylogin']],function(){

Route::get('language',[cntrool::class,'langg']);
Route::post('language',[cntrool::class,'lang']);
ROute::get('delang/{laid}',[cntrool::class,'deletela']);
Route::get('url/{id}',[cntrool::class,'lan_url']);
Route::get('uurl/{a}/{b}/{c}/{d}',[cntrool::class,'lanurl']);

Route::get('author',[cntrool::class,'authh']);
Route::post('author',[cntrool::class,'auth']);
ROute::get('delauth/{auid}',[cntrool::class,'deleteau']);

Route::get('booktype',[cntrool::class,'bookttype']);
Route::post('booktype',[cntrool::class,'boty']);
ROute::get('delbt/{btid}',[cntrool::class,'deletebt']);
Route::get('bturl/{id}',[cntrool::class,'bt_url']);
Route::get('btuurl/{j}/{k}/{l}',[cntrool::class,'bturl']);

Route::get('publisher',[cntrool::class,'publi']);
Route::post('publisher',[cntrool::class,'pub']); 
ROute::get('delpub/{puid}',[cntrool::class,'deletepu']);

Route::get('logout',[cntrool::class,'logout']);

Route::get('password',[cntrool::class,'password']);
Route::post('password',[cntrool::class,'pasword']);

});

Route::fallback(function(){return view('jkp');});

