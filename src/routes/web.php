<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ItemController::class, 'index'])->name('item.index');
Route::get('/item/{item_id}', [ItemController::class, 'show'])->name('item.show');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/email/verify', function () {
  return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect()->route('mypage.create');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();

  return back();
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('/mypage', [ProfileController::class, 'index'])->name('mypage.index');
  Route::get('/mypage/profile', [ProfileController::class, 'create'])->name('mypage.create');
  Route::post('/mypage/profile', [ProfileController::class, 'store'])->name('mypage.store');
  Route::get('/sell', [ExhibitionController::class, 'create'])->name('item.create');
  Route::post('/sell', [ExhibitionController::class, 'store'])->name('item.store');
  Route::get('/purchase/{item_id}', [PurchaseController::class, 'create'])->name('purchase.create');
  Route::post('/purchase/{item_id}', [PurchaseController::class, 'store'])->name('purchase.store');
  Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'edit'])->name('purchase.edit');
  Route::put('/purchase/address/{item_id}', [PurchaseController::class, 'update'])->name('purchase.update');
  Route::post('/item/{item_id}/like', [LikeController::class, 'store'])->name('like.store');
  Route::delete('/item/{item_id}/unlike', [LikeController::class, 'destroy'])->name('like.destroy');
  Route::post('/item/{item_id}', [CommentController::class, 'store'])->name('comment.store');
});