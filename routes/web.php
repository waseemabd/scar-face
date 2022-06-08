<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\UserInterfaceController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\PageLayoutController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChartsController;

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

// Main Page Route
// Route::get('/', [DashboardController::class,'dashboardEcommerce'])->name('dashboard-ecommerce')->middleware('verified');
//Route::get('/', [DashboardController::class, 'dashboardEcommerce'])->name('dashboard-ecommerce');


Route::get('/', [\App\Http\Controllers\EndUser\HomeController::class, 'index'])->name('user-home');

Route::get('/login', function () {
    return redirect('admin/login');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('lang/{locale}', [\App\Http\Controllers\Admin\LanguageController::class, 'swap'])->name('admin-lang');


    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('auth-login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

    Route::group(['middleware' => ['auth', 'is_admin']], function () {


//        Route::get('/', [\App\Http\Controllers\Admin\CurrencyController::class, 'index'])->name('admin-admin-currency');
        Route::get('/currency', [\App\Http\Controllers\Admin\CurrencyController::class, 'index'])->name('admin-currency');
        Route::post('/currency', [\App\Http\Controllers\Admin\CurrencyController::class, 'update'])->name('admin-update-currency');

        Route::get('/features', [\App\Http\Controllers\Admin\FeatureController::class, 'index'])->name('admin-features');
        Route::get('/allFeatures', [\App\Http\Controllers\Admin\FeatureController::class, 'getAllFeatures'])->name('admin-ajax-features');
        Route::get('/add-feature', [\App\Http\Controllers\Admin\FeatureController::class, 'create'])->name('admin-create-feature');
        Route::post('/store-feature', [\App\Http\Controllers\Admin\FeatureController::class, 'store'])->name('admin-store-feature');
        Route::get('/edit-feature/{id}', [\App\Http\Controllers\Admin\FeatureController::class, 'edit'])->name('admin-edit-feature');
        Route::post('/update-feature/{id}', [\App\Http\Controllers\Admin\FeatureController::class, 'update'])->name('admin-update-feature');
        Route::delete('/delete-feature/{id}', [\App\Http\Controllers\Admin\FeatureController::class, 'destroy'])->name('admin-delete-feature');


        Route::get('/partners', [\App\Http\Controllers\Admin\PartnerController::class, 'index'])->name('admin-partners');
        Route::get('/allPartners', [\App\Http\Controllers\Admin\PartnerController::class, 'getAllPartners'])->name('admin-ajax-partners');
        Route::get('/add-partner', [\App\Http\Controllers\Admin\PartnerController::class, 'create'])->name('admin-create-partner');
        Route::post('/store-partner', [\App\Http\Controllers\Admin\PartnerController::class, 'store'])->name('admin-store-partner');
        Route::get('/edit-partner/{id}', [\App\Http\Controllers\Admin\PartnerController::class, 'edit'])->name('admin-edit-partner');
        Route::post('/update-partner/{id}', [\App\Http\Controllers\Admin\PartnerController::class, 'update'])->name('admin-update-partner');
        Route::delete('/delete-partner/{id}', [\App\Http\Controllers\Admin\PartnerController::class, 'destroy'])->name('admin-delete-partner');

        Route::get('/plan', [\App\Http\Controllers\Admin\PlanController::class, 'index'])->name('admin-plan');
        Route::post('/plan', [\App\Http\Controllers\Admin\PlanController::class, 'update'])->name('admin-update-plan');


        Route::get('/images', [\App\Http\Controllers\Admin\ImageController::class, 'index'])->name('admin-images');
        Route::get('/add-image', [\App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin-create-image');
        Route::post('/store-image', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin-store-image');
        Route::get('/edit-image/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'edit'])->name('admin-edit-image');
        Route::post('/update-image/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'update'])->name('admin-update-image');
        Route::delete('/delete-image/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin-delete-image');



        Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin-settings');
        Route::post('/update-social', [\App\Http\Controllers\Admin\SettingController::class, 'updateSocial'])->name('settings-update-social');
        Route::post('/update-paper', [\App\Http\Controllers\Admin\SettingController::class, 'updatePaper'])->name('settings-update-paper');
        Route::post('/update-contacts', [\App\Http\Controllers\Admin\SettingController::class, 'updateContacts'])->name('settings-update-contacts');

        Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



    });

});
