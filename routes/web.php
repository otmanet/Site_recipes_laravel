<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('recipes.first_page');
});
Route::get('/pagerecipe', function () {
return view('recipes.PageRecipe');
});
Route::get('/welcome', function () {
return view('welcome');
});
// Route::get('/first', function () {
// return view('recipes.first_page');
// });
Route::get('/dashboard', function () {
    return view('recipes.dashboard');
});
/**********************************Type *************************************************/
Route::post('/addtype', 'TypeController@create');
Route::delete('/deletype/{id}','TypeController@destroy');
Route::put('/updatetype','TypeController@update');
/*********************************Recipe/vue.js******************************************/
Route::get('/getrecipe', 'RecipeController@getRecipe');
Route::post('/addrecipe', 'RecipeController@addRecipe');
Route::delete('/deleterecipe/{id}', 'RecipeController@deleteRecipe');
Route::put('/updaterecipe', 'RecipeController@updateRecipe');
Route::get('/show/{id}', 'RecipeController@show');
/******************************Recipe image ***************************************/
Route::post('/addimage/{recipeid}', 'RecipeController@addImage');
Route::get('/getimage/{id}', 'RecipeController@getImage');
Route::delete('/deleteimage/{id}', 'RecipeController@deleteImage');

/************************************Ingredient recipe*************************************/
Route::post('/addingerdient/{id}', 'RecipeController@addIngredient');
Route::delete('/deleteingredient/{id}', 'RecipeController@deleteIngredient');
Route::put('/updateingredient', 'RecipeController@updateIngredient');
/***********************************Steps recipe******************************************/
Route::post('/addstep/{id}', 'RecipeController@addSteps');
Route::delete('/deletestep/{id}', 'RecipeController@deletestep');
Route::put('/updatesteps', 'RecipeController@updatesteps');
/**********************************Users recipe************************************************/
Route::get('/user_recipe', 'UserController@user_recipe');
Route::get('/getrecipe/{id}', 'UserController@Show_recipe');
Route::get('showrecipe/{id}','UserController@showtype');
Route::get('search/{search}','UserController@search');
/*************************************Auth User *********************************************/
Route::delete('/deleteuser/{id}', 'RecipeController@deleteUser');
Route::put('/UpdateUser', 'RecipeController@UpdateUser');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');