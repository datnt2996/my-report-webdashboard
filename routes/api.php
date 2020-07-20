<?php

use Illuminate\Http\Request;
use App\article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/articles','ArticleController');

// Route::group(['prefix'=>'article'], function(){
//     Route::apiResource('/{ariticle}/show','ArticleController');
// });

Route::get('user_managers',function()
{
    return App\UserManager::all();
});
// Route::get('user_managers/{id}',function($id)
// {
//     return App\UserManager::find($id);
// });
// Route::get('articles',function()
// {
//     return article::all();
// });
Route::get('articles/{managerID}', function($id) {
    return article::find($id);
});
Route::post('articles', function(Request $request) {
    return article::create($request->all);
});
// Route::put('articles/{managerID}', function(Request $request, $id) {
//     $article = article::findOrFail($id);
//     $article->update($request->all());
//     return $article;
// });
// Route::delete('articles/{managerID}', function($id) {
//     article::find($id)->delete();
//     return 204;
// });
