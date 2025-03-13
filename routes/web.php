<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\MasterSubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerMainController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerStoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('admin.settings');
            Route::get('/manage/users', 'manageUser')->name('admin.manage.user');
            Route::get('/manage/stores', 'manageStore')->name('admin.manage.store');
            Route::get('/cart/history', 'cartHistory')->name('admin.cart.history');
            Route::get('/order/history', 'orderHistory')->name('admin.order.history');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/create', 'index')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage');
        });

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/subcategory/create', 'index')->name('subcategory.create');
            Route::get('/subcategory/manage', 'manage')->name('subcategory.manage');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/manage', 'index')->name('product.manage');
            Route::get('/product/review/manage', 'reviewManage')->name('product.review.manage');
        });

        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/productattribute/create', 'index')->name('productattribute.create');
            Route::get('/productattribute/manage', 'manage')->name('productattribute.manage');
            // Routes for Default Product Attribute
            Route::post('/default-product-attribute/store', 'store')->name('default.product.attribute.store');
            Route::get('/default-product-attribute/{defaultAttributeId}', 'showDefaultAttribute')->name('default.product.attribute.show');
            Route::put('/default-product-attribute/update/{defaultAttributeId}', 'updateDefaultAttribute')->name('default.product.attribute.update');
            Route::delete('/default-product-attribute/delete/{defaultAttributeId}', 'deleteDefaultAttribute')->name('default.product.attribute.delete');
        });

        Route::controller(ProductDiscountController::class)->group(function () {
            Route::get('/discount/create', 'index')->name('discount.create');
            Route::get('/discount/manage', 'manage')->name('discount.manage');
        });

        Route::controller(MasterCategoryController::class)->group(function (){
            Route::post('/store/category', 'storeCategory')->name('store.category');
            Route::get('/category/{categoryId}', 'showCategory')->name('show.category');
            Route::put('/update/category/{categoryId}', 'updateCategory')->name('update.category');
            Route::delete('/delete/category/{categoryId}', 'deleteCategory')->name('delete.category');
        });

        Route::controller(MasterSubCategoryController::class)->group(function (){
            Route::post('/store/subCategory', 'storeSubCategory')->name('store.subCategory');
            Route::get('/subCategory/{subCategoryId}', 'showSubCategory')->name('show.SubCategory');
            Route::put('/update/subCategory/{subCategoryId}', 'updateSubCategory')->name('update.SubCategory');
            Route::delete('/delete/subCategory/{subCategoryId}', 'deleteSubCategory')->name('delete.SubCategory');
        });
    });
});

// Seller(vendor) Routes
Route::middleware(['auth', 'verified', 'rolemanager:vendor'])->group(function () {
    Route::prefix('vendor')->group(function () {
        Route::controller(SellerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/order/history', 'orderHistory')->name('vendor.order.history');
        });

        Route::controller(SellerStoreController::class)->group(function () {
            Route::get('/product/create', 'index')->name('vendor.store.create');
            Route::get('/product/manage', 'manage')->name('vendor.store.manage');
            Route::post('/store/publish', 'store')->name('vendor.store.publish');
            Route::get('/store/{storeId}', 'show')->name('vendor.store.show');
            Route::put('/store/update/{storeId}', 'update')->name('vendor.store.update');
            Route::delete('/store/delete/{storeId}', 'delete')->name('vendor.store.delete');
        });

        Route::controller(SellerProductController::class)->group(function () {
            Route::get('/store/create', 'index')->name('vendor.product.create');
            Route::get('/store/manage', 'manage')->name('vendor.product.manage');
        });
    });
});

// Customer(Normal User) Routes
Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::controller(CustomerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/order/history', 'orderHistory')->name('customer.order.history');
            Route::get('/setting/payment', 'payment')->name('customer.payment');
            Route::get('/affiliate', 'affiliate')->name('customer.affiliate');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
