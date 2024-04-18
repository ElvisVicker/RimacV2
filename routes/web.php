<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CarCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\Admin\BuyOrderController as AdminBuyOrderController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarImagesController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ExportOrderController;
use App\Http\Controllers\Admin\FunctionController;
use App\Http\Controllers\Admin\ImportOrderController;
use App\Http\Controllers\Admin\OrderCategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RentOrderController as AdminRentOrderController;
use App\Http\Controllers\Client\BuyController;
use App\Http\Controllers\Client\CarController as ClientCarController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ContactController as ClientContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LibraryController;
use App\Http\Controllers\Client\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff\BuyerController as StaffBuyerController;
use App\Http\Controllers\Staff\BuyOrderController;
use App\Http\Controllers\Staff\ContactController as StaffContactController;
use App\Http\Controllers\Staff\RentOrderController;
use App\Mail\MailToCustomer;
use App\Models\Car;
use Illuminate\Support\Facades\Mail;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ->middleware('auth.admin')
Route::prefix('')->middleware('auth.admin')->name('admin.')->group(function () {
    // Function
    // Route::resource('functions', FunctionController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permission}/restore', [PermissionController::class, 'restore'])->name('permissions.restore');
    // Route::resource('account', AccountController::class);
    Route::resource('employees', EmployeeController::class);
    Route::get('employees/{employee}/restore', [EmployeeController::class, 'restore'])->name('employees.restore');

    Route::resource('order_categories', OrderCategoryController::class);
    // // Account
    // Route::resource('account', AccountController::class);
    // Route::get('account/{account}/restore', [AccountController::class, 'restore'])->name('account.restore');

    // // Car Category
    Route::resource('car_category', CarCategoryController::class);
    Route::get('car_category/{car_category}/restore', [CarCategoryController::class, 'restore'])->name('car_category.restore');


    // // Brand
    Route::resource('brand', BrandController::class);
    Route::get('brand/{brand}/restore', [BrandController::class, 'restore'])->name('brand.restore');

    // // Buyer
    // Route::resource('buyer', BuyerController::class);
    // Route::get('buyer/{buyer}/restore', [BuyerController::class, 'restore'])->name('buyer.restore');

    // // Car
    Route::resource('car', CarController::class);
    Route::get('car/{car}/restore', [CarController::class, 'restore'])->name('car.restore');
    Route::post('car/slug', [CarController::class, 'createSlug'])->name('car.create.slug');


    Route::resource('import_order', ImportOrderController::class);


    Route::resource('export_order', ExportOrderController::class);










    // // Contact
    // Route::resource('contact', ContactController::class);

    // //Buy Order
    // Route::resource('buy_order', AdminBuyOrderController::class);

    // //Dashboard
    // Route::get('chart', [ChartController::class, 'index'])->name('chart');
});


// Route::prefix('staff')->middleware('auth.staff')->name('staff.')->group(function () {
//     Route::resource('buyer', StaffBuyerController::class);
//     Route::get('buyer/send_to_order/{id}', [StaffBuyerController::class, 'sendToOrder'])->name('buyer.send_to_order');
//     Route::resource('contact', StaffContactController::class);
//     Route::resource('buy_order', BuyOrderController::class);
// });
// ->middleware('auth.customer')

Route::prefix('client')->name('client.')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('cars', [ClientCarController::class, 'index'])->name('cars');
    Route::post('cars', [ClientCarController::class, 'index'])->name('cars');
    Route::get('fetch_data_pagination', [ClientCarController::class, 'fetch_data_pagination'])->name('fetch_data_pagination');

    Route::get('fetch_data_search', [ClientCarController::class, 'fetch_data_search'])->name('fetch_data_search');


    Route::get('detail/{id?}/{slug}', [ClientCarController::class, 'detail'])->name('detail');
    Route::post('detail/store', [BuyController::class, 'store'])->name('detail.store');

    Route::resource('library', LibraryController::class);

    Route::get('contact', [ClientContactController::class, 'index'])->name('contact');
    Route::post('contact', [ClientContactController::class, 'store'])->name('contact.store');
    Route::get('about', [PageController::class, 'toAbout'])->name('about');
    Route::get('blog', [PageController::class, 'toBlog'])->name('blog');
    Route::get('blog_detail', [PageController::class, 'toBlogDetail'])->name('blog_detail');
    Route::get('team', [PageController::class, 'toTeam'])->name('team');
    Route::get('testimonials', [PageController::class, 'toTestimonials'])->name('testimonials');
    Route::get('faq', [PageController::class, 'toFaq'])->name('faq');
    Route::get('terms', [PageController::class, 'toTerms'])->name('terms');
    Route::post('add-to-cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::delete('cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('vnpay-callback', [BuyController::class, 'vnpayCallback'])->name('vnpay-callback');
});
Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']);
