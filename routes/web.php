<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InscrietController;
use App\Http\Controllers\VerificationEmailController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    session()->flush();
    return view('la_une',['inscriptioncheck'=>false]);
});
Route::get('/login',[LoginController::class ,'login']);
Route::get('/info/soutienscolaire',function(){
    return view('soutienScolaie');
});
Route::post('/home/me',[LoginController::class ,'datauserverification']
);
Route::get('/inscriptionetud',[InscrietController::class ,'verificationforinscription']
);
Route::get('/creataccount',[LoginController::class ,'creataccount']);
Route::post('/creataccount/new',[LoginController::class ,'datauserverification']);
Route::post('/verificationemail',[VerificationEmailController::class ,'verificationemail']);
Route::post('/getdata',[InscrietController::class ,'getdata']);
Route::get('/profile',[ProfileController::class,'main'])->name('posts.profile');
Route::post('/endinscription',[InscrietController::class ,'getdata']);
Route::post('/end',[InscrietController::class ,'inscriptionetu']);
Route::get('/home/me',function () {
    return view('homeaftersignin');
});
Route::delete('/profile/course/{id}', [ProfileController::class, 'deleteCourse'])->name('profile.course.delete');

Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
});