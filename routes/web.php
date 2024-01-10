<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeStepController;
use App\Http\Controllers\RecipeCategoryController;
use App\Http\Controllers\IngredientCategoryController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    /* users */
    Route::name('users.')->prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])
            ->name('index')
            ->middleware(['permission:users.index']);
    });
    /* ingredients */
    Route::resource('ingredient_categories', IngredientCategoryController::class)->only(
        [
            'index', 'create', 'edit'
        ]
    );
    Route::get('ingredient_categories/async', [IngredientCategoryController::class, 'async'])->name('ingredient_categories.async');
    Route::resource('ingredients', IngredientController::class)->only(
        [
            'index', 'create', 'edit'
        ]
    );

    /* recipes */
    Route::resource('recipe_categories', RecipeCategoryController::class)->only(
        [
            'index', 'create', 'edit'
        ]
    );
    Route::get('recipe_categories/async', [RecipeCategoryController::class, 'async'])->name('recipe_categories.async');
    Route::resource('recipes', RecipeController::class)->only(
        [
            'index', 'show', 'create', 'edit'
        ]
    );
    Route::resource('recipes.steps', RecipeStepController::class)->only(
        [
            'index', 'create', 'edit'
        ]
    );
});
