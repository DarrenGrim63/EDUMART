<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\CandidateController;

Route::get('/', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth.session')->group(function () {
    Route::get('/vote', [VotingController::class, 'index']);
    Route::post('/vote', [VotingController::class, 'store']);

    Route::get('/hasil', [VotingController::class, 'hasil']);

    Route::middleware('guru')->group(function () {
        Route::get('/kandidat', [CandidateController::class, 'index']);
        Route::post('/kandidat', [CandidateController::class, 'store']);
        Route::post('/kandidat/{id}/hapus', [CandidateController::class, 'destroy']);
    });
});
