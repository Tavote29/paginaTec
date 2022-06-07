<?php

use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Models\Files;

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
    return view('home');
})-> middleware('auth');

Route::get('forget-password',[ForgotPasswordController::class, 'ForgetPassword'])-> name('forget_password.get');

Route::post('forget-password',[ForgotPasswordController::class, 'ForgetPasswordStore'])->name('forget_password.post');

Route::get('reset-password/{token}',[ForgotPasswordController::class, 'ResetPassword'])->name('reset_password.get');

Route::post('reset-password',[ForgotPasswordController::class, 'ResetPasswordStore'])->name('reset_password.post');

Route::get('/register',[RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register',[RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login',[SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login',[SessionsController::class, 'store'])
    ->name('login.store ');
    
Route::get('/logout',[SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

Route::resource('files', FilesController::class);

Route::get('files/{uuid}/download', [FilesController::class, 'download'])->name('files.download');

Route::resource('user', UserController::class)->middleware('auth');



