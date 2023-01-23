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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;


Auth::routes();
//会社
//  Route::group(['prefix' => 'company'], function(){
//       Route::get('login','Company\Auth\LoginController@showLoginForm')->name('company.login');
//       Route::post('login','Company\Auth\LoginController@login')->name('company.authenticate');
//       Route::get('/home', 'Company\HomeController@index')->name('company.dashboard');
//       Route::get('/logout', 'Company\Auth\LoginController@logout')->name('company.logout');
//      //新規登録
//       Route::get('register', 'Company\Auth\RegisterController@showRegistrationForm')->name('company.register');
//       Route::post('register', 'Company\Auth\RegisterController@register')->name('conpany.register');

Route::get('/topLogin', 'TopLoginController@topLogin')->name('top.login');

Route::group(['middleware' => 'auth:user'], function(){
   Route::get('/user/home', 'HomeController@index')->name('home');
   //新規登録
//    Route::get('/register', 'Auth\RegisterController@getRegister')->name('register');
//    Route::post('/register', 'Auth\RegisterController@postRegister')->name('register');
   Route::get('/test', function() {
    return view("welcome");
   });
   //folder
   Route::get('/folders/production', 'ProductionController@HomeFolder')->name('product.homefolder');
   Route::get('/folders/{id}/production', 'ProductionController@folder')->name('product.folder');
   Route::delete('/folders/{id}/productio/menberdelete', 'FolderController@menberdelete');
   Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
   Route::post('/folders/create', 'FolderController@create');

//クリエイター登録
   Route::get('/folders/createList',  'FolderController@createList')->name('create.list');
   Route::get('/folders/createRegister', 'FolderController@createUserForm')->name('create.Form');
   Route::post('/folders/createRegister', 'FolderController@createUser')->name('create.User');
   Route::get('/folders/{id}/userlist', 'FolderController@UserList')->name('user.list');
   Route::post('/folders/{id}/userlist', 'FolderController@FolderUserSave')->name('user.save');
   Route::delete('/folders/{id}/userlist', 'FolderController@userdalete');
   Route::delete('folders/createList/{id}', 'FolderController@createdalete');


   //詳細
   Route::get('/folder/{id?}/productio', 'ProductionController@preview')->name('product.preview');
   Route::get('/folders/check{data}/production', 'ProductionController@unfinished')->name('product.unfinished');

   //編集
   Route::get('/folders/check/{id}/upform', 'ProductionController@updateForm')->name('product.upForm');
   Route::patch('/folders/check/{id}/update', 'ProductionController@update')->name('prodct.update');
   //削除
   Route::delete('/folders/check/{id}/delete', 'ProductionController@delete')->name('product.delete');

   //一覧
   Route::get('/production/all', 'ProductionController@index')->name('product_all');

   // 完成品リスト
   Route::get('/productio/completeAll', 'ProductionController@completeAll')->name('complete.All');
   //詳細
   Route::get('/productio/completeAll/{id}', 'ProductionController@preview');


   //制作依頼
   Route::get('/production/{id}/create', 'ProductionController@product_form')->name('production.create');
   Route::post('/production/{id}/create', 'ProductionController@create');

   //支給材リスト一覧
   Route::get('/supply_material/all', 'ProductionController@SupplyMaterial')->name('supply.all');
   Route::get('/supply_material/create', 'ProductionController@SupplyMaterialForm')->name('supply.form');
   Route::get('/supply_material/{id}/preview', 'ProductionController@Previewz')->name('supply.preview');
   Route::post('/supply_material/create', 'ProductionController@SupplyMaterialCreate')->name('supply.create');

   //カレンダー
   Route::get('/production/calendar', 'CalenderController@index')->name('calendar');
   Route::get('/load-events', 'CalenderController@loadEvents')->name('routeLoadEvents');

   //検索
   Route::get('/production/searchlist', 'ProductionController@search')->name('search.list');

     // 課金
     Route::get('subscription', 'Stripe\SubscriptionController@index');
     Route::post('subscription/afterpay', 'Stripe\SubscriptionController@afterpay')->name('stripe.afterpay');
     Route::get('ajax/subscription/status', 'Ajax\SubscriptionController@status');
     Route::post('ajax/subscription/subscribe', 'Ajax\SubscriptionController@subscribe');
     Route::post('subscription/cancel/{user}', 'Stripe\SubscriptionController@cancelsubscription')-> name('stripe.cancel');
     Route::post('ajax/subscription/resume', 'Ajax\SubscriptionController@resume');
     Route::post('ajax/subscription/change_plan', 'Ajax\SubscriptionController@change_plan');
     Route::post('ajax/subscription/update_card', 'Ajax\SubscriptionController@update_card');
     //カスタマーポータル
     Route::get('subscription/cancel/{user}', 'Stripe\SubscriptionController@portalsubsucription')->name('stripe.portalsubscription');
     Route::post('stripe/webhook', 'WebhookController@handleWebhook');

    //  Route::post('/charge', 'Ajax\SubscriptionController@charge')->name('stripe.charge');
});



//管理者
Route::group(['prefix' => 'admin'],function(){
    Route::get('login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login','Admin\Auth\LoginController@login')->name('admin.authenticate');
    Route::get('/home', 'Admin\HomeController@index')->name('admin.dashboard');
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
//新規登録
    Route::get('register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');
//一覧
 });

 //ログイン後
 Route::group(['prefix' => 'admin'],function(){
    Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
 //営業登録リスト
    Route::get('/saleslist', 'Admin\admin\UserListController@salesList')->name('admin.sales.list');
 //新規社員登録（受注側）
    Route::get('/userRegister', 'Admin\admin\UserLIstController@createUserForm')->name('create.user');
    Route::post('/userRegister', 'Admin\admin\UserLIstController@createUser')->name('post.user');
//編集
    Route::get('/userlist/{id}/upform', 'Admin\admin\UserListController@updateForm')->name('admin.up.form');
    Route::post('/userlist/{id}/upform', 'Admin\admin\UserListController@update');
//消去
    Route::delete('/user/{id}', 'Admin\admin\UserListController@userdalete');
//製造登録リスト
    Route::get('/creatorlist', 'Admin\admin\UserListController@creatorlist')->name('admin.creator.list');
//消去
    Route::delete('/creator/{id}', 'Admin\admin\UserListController@creatordalete');
//chart
    Route::get('/chart', 'Admin\admin\ChartController@index')->name('chart'); // 👈 ブラウザでアクセス
    Route::get('/ajax/chart', 'Ajax\ProductController@index'); // 👈 売上データ取得
    Route::get('/ajax/chart/years', 'Ajax\ProductController@years'); // 👈 年データ取得（セレクトボックス用）
  });


//製造
  Route::group(['prefix' => 'creator'],function(){
    Route::get('/login','Creator\Auth\LoginController@showLoginForm')->name('creator.login');
    Route::post('login','Creator\Auth\LoginController@login')->name('creator.authenticate');
    Route::get('/', 'Creator\HomeController@index')->name('creator.dashboard');
    Route::post('/logout', 'Creator\Auth\LoginController@logout')->name('creator.logout');
//新規登録
    Route::get('register', 'Creator\Auth\RegisterController@showRegistrationForm')->name('creator.register');
    Route::post('register', 'Creator\Auth\RegisterController@register')->name('creator.register');
 });

//ログイン後
 Route::group(['prefix' => 'creator','middleware' => 'auth:creator'],function(){
    Route::get('/home', 'Creator\HomeController@index')->name('creator.home');
    //一覧
    Route::get('/production/all', 'Creator\Product\ProdctionController@index')->name('creator.prodcto.all');
//詳細
    Route::get('/all/{id}/productio', 'Creator\Product\ProdctionController@preview')->name('product.preview');
//検索
    Route::get('/production/search', 'Creator\Product\ProdctionController@search')->name('search');
//カレンダー
    Route::get('/production/calendar', 'Creator\Product\CalenderController@index')->name('creator.calendar');
    Route::get('/load-events', 'Creator\Product\CalenderController@loadEvents')->name('creator.routeLoadEvents');
//支給材リスト
    Route::get('/production/supply_material', 'Creator\Product\ProdctionController@SupplyMaterial')->name('creator.supply.All');
    Route::get('/production/supply_material/{id}/preview', 'Creator\Product\ProdctionController@Previewz')->name('creator.supply.preview');
//完了フォーム
    Route::get('/production/{id}/complete', 'Creator\Product\CreatorController@index')->name('creator.completeForm');
    Route::post('/production/complete', 'Creator\Product\CreatorController@complete')->name('complere.post');
// 完成品リスト
    Route::get('/production/CompleteAll', 'Creator\Product\CreatorController@completeAll')->name('creator.complete.all');
//制作データ
    Route::get('/production/completeAll/{id}', 'Creator\Product\CreatorController@ProductionData')->name('complete.data');


  });


//   });



