<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ManageProductController;


// Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store')->middleware('auth');

// Route::get('/manage-product', [ManageProductController::class, 'index'])->name('market.manage');

/*
|--------------------------------------------------------------------------
| Basic Pages
|--------------------------------------------------------------------------
*/
Route::view('/', 'auth/auth')->name('auth');
Route::view('/terms-and-conditions', 'termsandconditions')->name('terms');

/*
|--------------------------------------------------------------------------
| Feedback
|--------------------------------------------------------------------------
*/
Route::view('/feedback', 'feedback')->name('feedback');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::view('/profile', 'viewprofile')->name('profile.view');
Route::view('/profile/new', 'newprofile')->name('profile.new');

/*
|--------------------------------------------------------------------------
| Market / Marketplace
|--------------------------------------------------------------------------
*/
Route::prefix('market')->group(function () {
    Route::view('/manage', 'manageproduct')->name('market.manage');
    Route::view('/dashboard', 'marketdashboard')->name('market.dashboard');
    Route::view('/dashboard/new', 'newmarketdashboard')->name('market.dashboard.new');
    Route::view('/grid', 'marketgrid')->name('market.grid');
    Route::view('/inspect', 'minspect')->name('market.inspect');
    Route::view('/new', 'newmarket')->name('market.new');
    Route::view('/settings', 'newmarketsetting')->name('market.settings');
});

/*
|--------------------------------------------------------------------------
| Wallet & Payments
|--------------------------------------------------------------------------
*/
Route::view('/wallet', 'wallet')->name('wallet');
Route::view('/pay', 'pay')->name('pay');

/*
|--------------------------------------------------------------------------
| Uploads / API
|--------------------------------------------------------------------------
*/
Route::view('/upload-api', 'uploadapi')->name('upload.api');
