<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}/edit', [AuthController::class, 'edit'])->name('users.edit');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegisterData'])->name('register.store');
Route::put('/user/{id}/update', [AuthController::class, 'Update'])->name('users.update');
Route::delete('/user/{id}/delete', [AuthController::class, 'destroy'])->name('users.delete');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/list', function () {

    $users = User::all(); //select * from table users
    return view('users.index', compact('users'));
})->name('users.index');

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth');


Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products/store', [ProductController::class, 'store'])->name('products.store');

// Route::get('/', function () {

//     $users = User::where('id', 1)->first(); //select * from table users
//     return $users;

//     $items = [
//         [
//             'name' => "Item1",
//             'type' => "new"

//         ],
//         [
//             'name' => "Item2",
//             'type' => "test"

//         ],
//         [
//             'name' => "Item3",
//             'type' => "latest"

//         ]
//     ];
//     return view('home', compact('items'));
// });
Route::get('/about', function () {
    return view('about');
});

Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/view', [ItemController::class, 'view']);
Route::get('/items/{item}/show', [ItemController::class, 'show']);


// Route::resource('/items', ItemController::class);

Route::post('/store', function () {
    return "store";
});

Route::get('/about/{b}', function ($b) {
    $a = 10;

    function Sum($a, $b)
    {
        return $a + $b;
    }

    $sum = Sum($a, $b);
    return $sum;
})->name('about');

Route::redirect('/home', '/admin/dashboard');

// Route::fallback(function () {
//     // return response()->json(['message' => 'Page not found'], 404);
//     // return response()->json(['message' => 'Page not found'], 500);
//     // return response()->json(['message' => 'Page not found'], 403);
//     // return response()->json(['message' => 'Page not found'], 401);
//     // return response()->json(['message' => 'Page not found'], 419);
//     return response()->json(['message' => 'Page not found'], 429);
//     return response()->json(['message' => 'Page not found'], 503);
//     return response()->json(['message' => 'Page not found'], 419);
//     return response()->json(['message' => 'Page not found'], 500);
//     return response()->view('errors.404', [], 500);
// });




Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return "admin dashboard";
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return "admin users";
    })->name('admin.users');
});
