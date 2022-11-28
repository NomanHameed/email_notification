<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailerController;

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
    return redirect('/login');
});

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contacts');
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::get('/set_mailer', [MailerController::class, 'index'])->name('set_mailer.index');
Route::get('/set_mailer/create', [MailerController::class, 'create'])->name('set_mailer.create');
Route::post('/set_mailer', [MailerController::class, 'store'])->name('set_mailer.store');


Route::get('/import_contact', [ContactController::class, 'getImport'])->name('import');
Route::post('/import_process', [ContactController::class, 'processImport'])->name('import_process');

Route::get('send-email', [ContactController::class, 'listView'])->name('send.listView');
Route::post('send-email', [ContactController::class, 'send'])->name('send.mail');

