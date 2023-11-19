<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AzamPaymentController;
use App\Http\Controllers\SwahiliesController;
use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/payment', [AzamPaymentController::class, 'initiateMobileCheckout']);
Route::get('/sms-send', [SmsController::class, 'sendSms']);
Route::get('/sms-balance', [SmsController::class, 'checkSmsBalance']);



Route::get('/initiate-payment', [SwahiliesController::class, 'initiatePayment']);
Route::post('/handle-webhook', [SwahiliesController::class, 'handleWebhook']);


require __DIR__.'/auth.php';

