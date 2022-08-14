<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
Use App\Http\Controllers\CompanyController;
Use App\Http\Controllers\Settings\AccountController;
Use App\Http\Controllers\Settings\ProfileController;

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
    return view('welcome');
});
// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index'); 
// Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store'); 
// Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
// Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
// Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
// Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
// Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

Route::resources([
    '/contacts'=>ContactController::class,
    '/companies'=>CompanyController::class
]);

Auth::routes(['veryfy' => true]);

//Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/settings/profile', [ProfileController::class, 'edit'])->name('settings.profile.edit');

Route::put('/settings/profile', [ProfileController::class, 'update'])->name('settings.profile.update');

//Route::get('/dashboard','HomeController@index')->name('home');

//Route::get('/settings/account','Settings\AccountController@index');

//Route::get('/settings/profile','Settings\ProfileController@edit')->name('settings.profile.edit');

//Route::put('/settings/profile','Settings\ProfileController@update')->name('settings.profile.update');;


