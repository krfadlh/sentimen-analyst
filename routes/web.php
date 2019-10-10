<?php
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
    return view('landing');
});
Route::resource('opinions','OpinionsController');
Route::post('opinions-sentiment','OpinionsController@sentiment')->name('sentiment'); //fungsi OpinionsController@sentiment
Route::post('opinions-objek','OpinionsController@objek')->name('objek');

Route::get('category-chart','MentionCategoryController@categoryChart');
Route::get('allcategory-chart','MentionCategoryController@allCategory');

Route::get('positive-chart','SentimentController@PosSentimentChart');
Route::get('negative-chart','SentimentController@NegSentimentChart');
Route::get('jumlah-data','SentimentController@JumlahData');

Route::get('ranking-category','PercentCategoryController@RankingCategory');
Route::view('/about','about');

Route::get('gojek-wordcloud','WordCloudController@GojekWordCloud');
Route::get('grab-wordcloud','WordCloudController@GrabWordCloud');