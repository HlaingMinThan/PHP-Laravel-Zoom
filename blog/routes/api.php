<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

///api
Route::get('/users', function () {
    try {
        return response()->json([
            'users' => User::all()
        ], 200);
    } catch (Exception $e) {
        return response()->json([
            'message' => $e->getMessage()
        ], 500);
    }
});

//sample create users api
// Route::post('/users', function () {
//     try {
//         //$user = User::create
//         return response()->json([
//             'message' => 'post created successfully',
//             'user' => $user
//         ]);
//     } catch (Exception $e) {
//         return response()->json([
//             'message' => $e->getMessage()
//         ], 500);
//     }
// });
