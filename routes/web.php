<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController, HomeController, SearchController,
    User\ReviewController, User\UserController,
    Admin\AdminController, Admin\MemberController,
    Admin\ProductController, Admin\CategoryController
};

/* ---------- Public ---------- */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/search',          [SearchController::class, 'search'])->name('search');
Route::get('/reviews',         [UserController::class, 'allReviews'])->name('user.reviews');
Route::get('/review/form',     [ReviewController::class, 'create'])->name('review.form');
Route::post('/review/submit',  [ReviewController::class, 'store'])->name('review.submit');
Route::post('/newsletter/subscribe', [UserController::class, 'subscribe'])->name('newsletter.subscribe');

/* ---------- Auth (user) ---------- */
// Route::middleware('admin.access')->group(function () {
//     Route::post('add-to-cart/{id}',            [HomeController::class, 'addToCart'])->name('addToCart');
//     Route::get('cart',                         [HomeController::class, 'cart'])->name('cart');
//     Route::get('xoa-san-pham-gio-hang/{id}',   [HomeController::class, 'deleteCart'])->name('deleteCart');
// });

/* ---------- Login / Register ---------- */
Route::get('/login',    [LoginController::class, 'getLogin'])->name('login');
Route::post('/login',   [LoginController::class, 'postLogin'])->name('postlogin');
Route::get('/logout',   [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'getRegister'])->name('register');
Route::post('/register',[LoginController::class, 'postRegister'])->name('postregister');

/* ---------- Admin ---------- */
Route::prefix('admin')->middleware('admin.access')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    /* Members */
    Route::prefix('member')->name('member.')->group(function () {
        Route::get('/',            [MemberController::class, 'index'])->name('index');
        Route::get('create',       [MemberController::class, 'create'])->name('create');
        Route::post('store',       [MemberController::class, 'store'])->name('store');
        Route::get('edit/{id}',    [MemberController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [MemberController::class, 'update'])->name('update');
        Route::delete('delete/{id}',[MemberController::class, 'delete'])->name('delete');
    });

    /* Products */
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/',            [ProductController::class, 'index'])->name('index');
        Route::get('create',       [ProductController::class, 'create'])->name('create');
        Route::post('store',       [ProductController::class, 'store'])->name('store');
        Route::get('edit/{id}',    [ProductController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('delete/{id}',[ProductController::class, 'delete'])->name('delete');
    });

    /* Categories */
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/',            [CategoryController::class, 'index'])->name('index');
        Route::get('create',       [CategoryController::class, 'create'])->name('create');
        Route::post('store',       [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{id}',    [CategoryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('delete/{id}',[CategoryController::class, 'delete'])->name('delete');
    });

    /* Đơn hàng / giỏ hàng admin */
    Route::get('cart',          [AdminController::class, 'cart'])->name('cart');
    Route::get('success/{id}',  [AdminController::class, 'success'])->name('success');
    Route::get('cancel/{id}',   [AdminController::class, 'cancel'])->name('cancel');
});

/* ---------- User pages ---------- */
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/',                 [UserController::class, 'index'])->name('index');
    Route::get('/favorites',        [UserController::class, 'favorites'])->name('favorites');
    Route::post('/add-favorite/{id}', [UserController::class, 'addFavorite'])->name('add_favorite');
    Route::post('/remove-favorite/{id}', [UserController::class, 'removeFavorite'])->name('remove_favorite');
    Route::post('add-to-cart/{id}',            [HomeController::class, 'addToCart'])->name('addToCart');
    Route::get('cart',                         [HomeController::class, 'cart'])->name('cart');
    Route::get('xoa-san-pham-gio-hang/{id}',   [HomeController::class, 'deleteCart'])->name('deleteCart');
    Route::get('/orders',           [UserController::class, 'orders'])->name('orders');
    Route::get('contact',           [UserController::class, 'contact'])->name('contact');
    Route::post('contact',          [UserController::class, 'contactPost'])->name('contact.post');
    Route::get('categories',        [UserController::class, 'categories'])->name('categories');
    Route::get('single/{id}',       [UserController::class, 'single'])->name('single');
    Route::get('payment',           [UserController::class, 'payment'])->name('payment');
    Route::post('uppayment',        [UserController::class, 'uppayment'])->name('uppayment');
    Route::post('push',             [UserController::class, 'push'])->name('push');
    Route::get('data-category/{id}',[UserController::class, 'data_category'])->name('data_category');
});
