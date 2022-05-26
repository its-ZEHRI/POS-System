<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TempProductController;

Auth::routes();

Route::group(['middleware'=>['auth']],function(){
    Route::get('/dashboard',        [DashboardController::class,   'index'  ]);
    Route::get('/purchase',         [PurchaseController::class,    'index'  ]);
    Route::get('/supplier',         [SupplierController::class,    'index'  ]);
    Route::get('/refreshPurchase',  [TempProductController::class, 'refresh']);
    Route::get('/refreshSupplier',  [SupplierController::class,    'refresh']);
    Route::get('/inventory',        [InventoryController::class,   'index'  ]);

    Route::group(['prefix'=>'/purchase'],function(){
        Route::post('/tempCreateData',  [TempProductController::class, 'tempCreate' ]);
        Route::post('/tempUpdateData',  [TempProductController::class, 'tempUpdate' ]);
        Route::get ('/destroy/{id}',    [TempProductController::class, 'destroy'    ]);
    });

    Route::group(['prefix' => '/supplier'],function(){
        Route::post('/createSupplier',  [SupplierController::class, 'create' ]);
    });

    Route::group(['prefix'=> '/setting'],function(){
        Route::post('/createCategory',  [CategoryController::class, 'createCategory']);
    });

    Route::get('setting', [CategoryController::class, 'index']);


    Route::get('sale',function(){
        return view('app.sale');
    });

});// END OF AUTH MIDDLEWARE

Route::get('/', function () {
    return view('home');
});



Route::get('accounts', function(){
    return view('app.accounts');
});


