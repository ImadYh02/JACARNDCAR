<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\IndexController;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    ['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
    function () {
    Route::get('/',[IndexController::class, 'getData'])->name('home.index');
    Route::get('/cars',[IndexController::class, 'showAllCars'])->name('home.cars');
    // Route::view('/cars','cars')->name('home.cars');
    Route::get('/test/{id}',[IndexController::class, 'showCarDetails'])->name('car_details');
    Route::view('/print-order', 'pdf_booking')->name('home.test');
    Route::view('/about', 'about')->name('home.about');
    Route::view('/faq', 'faq')->name('home.faq');
    Route::view('/contact','contact')->name('home.contcat');
    Route::post('/contact-us', [IndexController::class, 'mailContactUs'])->name('get_contact');
    Route::post('/new-order', [IndexController::class, 'mailNewOrder'])->name('new_order');
    Route::get('/allCategories',[IndexController::class, 'showAllCat'])->name('home.showAllCat');
    Route::get('/categories/{marque}', [IndexController::class,'show'])->name('home.show');
    Route::get('/show-cars', [IndexController::class,'showCars'])->name('cars.show');
    Route::get('/show-car-details/{id}',[IndexController::class, 'showCarDetails'])->name('car_details');
    Route::post('/ajax-search', [IndexController::class,'ajax_search'])->name('search_by_name');
    Route::post('/check-out/{id}',[IndexController::class, 'checkOut'])->name('check_out');
    Route::post('/pay-by-cc', [IndexController::class,'pay_by_cc'])->name('pay_by_cc');
    Route::get('/payment',[PaypalController::class, 'payment'])->name('payment');
    Route::get('/cancel',[PaypalController::class,'cancel'])->name('payment.cancel');
    Route::get('/payment/success',[PaypalController::class, 'success'])->name('payment.success');
    Route::get('/admin/add/GetSubCatAgainstMainCatEdit/{id}',[AdminController::class, 'GetSubCatAgainstMainCatEdit']);
    Route::get('/admin/add/available-cars/{id}', [AdminController::class,'available_cars']);
    Route::get('/admin/edit/order/GetSubCatAgainstMainCatUpdate/{id}',[AdminController::class, 'GetSubCatAgainstMainCatUpdate']);
    Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home'); Auth::routes();
    Route::prefix('admin')->middleware(['auth','user-access:admin'])->group(function () {
        // Route::get('/admin/dashboard',[AdminController::class, 'adminHome'])->name('admin.home');
        Route::get('/dashboard', [AdminController::class,'getStatic'])->name('admin.home');
        Route::get('/customers',[AdminController::class, 'getCustomers'])->name('admin.customers');
        Route::get('/cars', [AdminController::class, 'getCars'])->name('admin.cars');
        Route::get('/orders', [AdminController::class,'getOrders'])->name('admin.orders');
        Route::get('/coupons',[AdminController::class, 'getCoupons'])->name('admin.coupons');
        Route::get('/categories', [AdminController::class,'getCategories'])->name('admin.categories');
        Route::get('/locations', [AdminController::class,'getLocations'])->name('admin.locations');
        Route::get('/cars-opp',[AdminController::class, 'getCarsOpp'])->name('admin.cars_opp');
        Route::get('/add/user', [AdminController::class,'addNewUser'])->name('admin.addUser');
        Route::get('/add/admin',[AdminController::class, 'addNewAdmin'])->name('admin.addAdmin');
        Route::get('/add/car', [AdminController::class,'addNewCar'])->name('admin.addCar');
        Route::get('/add/order',[AdminController::class, 'addNewOrder'])->name('admin.addOrder');
        Route::get('/add/coupon', [AdminController::class,'addNewCoupon'])->name('admin.addCoupon');
        Route::get('/add/category',[AdminController::class, 'addNewCategory'])->name('admin.addCategory');
        Route::get('/add/location',[AdminController::class, 'addNewLocation'])->name('admin.addLocation');
        Route::post('/store/user', [AdminController::class,'storeUser'])->name('users.store');
        Route::post('/store/admin',[AdminController::class, 'storeAdmin'])->name('admin.store');
        Route::post('/store/car', [AdminController::class,'storeCar'])->name('cars.store');
        Route::post('/store/order',[AdminController::class, 'storeOrder'])->name('orders.store');
        Route::post('/store/coupon', [AdminController::class,'storeCoupon'])->name('coupons.store');
        Route::post('/store/category',[AdminController::class, 'storeCategory'])->name('categories.store');
        Route::post('/store/location',[AdminController::class, 'storeLocation'])->name('location.store');
        Route::get('/edit/user/{user}', [AdminController::class,'editUser'])->name('admin.editUser');
        Route::get('/edit/car/{car}',[AdminController::class, 'editCar'])->name('admin.editcar');
        Route::get('/edit/order/{order}', [AdminController::class,'editOrder'])->name('admin.editOrder');
        Route::get('/edit/coupon/{coupon}',[AdminController::class, 'editCoupon'])->name('admin.editcoupon');
        Route::get('/edit/category/{category}', [AdminController::class,'editCategory'])->name('admin.editcategory');
        Route::get('/edit/location/{location}', [AdminController::class,'editLocation'])->name('admin.editlocation');
        Route::put('/update/user/{user}',[AdminController::class, 'updateUser'])->name('admin.updateUser');
        Route::put('/update/car/{car}', [AdminController::class,'updateCar'])->name('admin.updateCar');
        Route::put('/update/order/{order}',[AdminController::class, 'updateOrder'])->name('admin.updateOrder');
        Route::put('/update/coupon/{coupon}', [AdminController::class,'updateCoupon'])->name('admin.updateCoupon');
        Route::put('/update/category/{category}', [AdminController::class,'updateCategory'])->name('admin.updateCategory');
        Route::put('/update/location/{location}', [AdminController::class,'updateLocation'])->name('admin.updateLocation');
        Route::delete('/delete/user/{id}', [AdminController::class,'removeUser'])->name('user.delete');
        Route::delete('/delete/car/{id}',[AdminController::class, 'removeCar'])->name('car.delete');
        Route::delete('/delete/order/{id}', [AdminController::class,'removeOrder'])->name('order.delete');
        Route::delete('/delete/coupon/{coupon}',[AdminController::class, 'removeCoupon'])->name('coupon.delete');
        Route::delete('/delete/category/{category}', [AdminController::class,'removeCategory'])->name('category.delete');
        Route::delete('/delete/location/{location}', [AdminController::class,'removeLocation'])->name('location.delete');
        Route::get('/admin/add/GetSubCatAgainstMainCatEdit/{id}',[AdminController::class, 'GetSubCatAgainstMainCatEdit']);
        Route::get('/admin/add/available-cars/{id}', [AdminController::class,'available_cars']);
        Route::get('/admin/edit/order/GetSubCatAgainstMainCatUpdate/{id}', [AdminController::class, 'GetSubCatAgainstMainCatUpdate']); });
        Route::get('/settings', [UserController::class,'getInfoPerso'])->name('settings');
    Route::prefix('user')->middleware(['auth','user-access:user'])->group(function() {
        Route::get('/index',[HomeController::class, 'userHome'])->name('user.index');
        Route::get('/orders/{id}', [UserController::class,'getOrders'])->name('user.orders');
    });
    Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');
        // Route::get('/home',[HomeController::class, 'showHome'])->name('home.index');
});
