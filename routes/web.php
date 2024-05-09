<?php
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ColorController;
use App\Livewire\Admin\Brand\Index;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;

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
//Route login
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class,'postUser']) -> name('auth.postUser');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'Checklogin'])->name('auth.Checklogin');
Route::get('logOut', [AuthController::class, 'logOut'])->name('logOut');


Route::get('/strayusers', [HomeController::class, 'strayusers'])->name('strayusers'); //Báo lỗi người dùng cố truy cập đến trang admin

Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('home');

//Route Admin
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index']);

    Route::controller(CategoryProductController::class)->group(function (){
        Route::get('/category','index');
        Route::get('/add-category','create');
        Route::post('/category','store');
        Route::get('/category/{category_product}/edit','edit');
        Route::put('/category/{category_product}','update');
    });

    Route::controller(ProductController::class)->group(function (){
        Route::get('/product','index');
        Route::get('/add-product','create');
        Route::post('/product','store');
        Route::get('/product/{product}/edit','edit');
        Route::put('/product/{product}','update');
        Route::get('/product/{product_id}/delete','destroy');
        Route::get('/product-image/{product_image_id}/delete','destroyImage');

        Route::post('/product-color/{product_color_id}','updateProductColorQuantity');
        Route::get('product-color/{product_color_id}/delete','deleteProductColor');
    });

    Route::get('/brands',Index::class);

    Route::controller(UserController::class)->group(function (){
        Route::get('/user','index');
        Route::get('/add-user','create');
        Route::post('/user', 'store');
        Route::get('/user/{user}/edit','edit');
        Route::put('/user/{user}','update');
        Route::get('/user/{user}/delete','destroy');
    });
    Route::controller(ColorController::class)->group(function (){
       Route::get('/color','index');
       Route::get('/add-color','create');
       Route::post('/color','store');
       Route::get('/color/{colors}/edit','edit');
       Route::put('/color/{colors}','update');
       Route::get('/color/{colors}/delete','destroy');
    });

});


