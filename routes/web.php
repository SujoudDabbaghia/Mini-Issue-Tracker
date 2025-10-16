<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return redirect()->route('issues.index');
});

/*
|--------------------------------------------------------------------------
| Project Routes
|--------------------------------------------------------------------------
*/
Route::resource('projects', ProjectController::class)->only(['index','show','create','store']);

/*
|--------------------------------------------------------------------------
| Issue Routes
|--------------------------------------------------------------------------
*/
Route::resource('issues', IssueController::class)->only(['index','show','create','store']);

/*
|--------------------------------------------------------------------------
| Comment Routes
|--------------------------------------------------------------------------
*/
Route::post('issues/{issue}/comments', [CommentController::class,'store'])->name('comments.store');
