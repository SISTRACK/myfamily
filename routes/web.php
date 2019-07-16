<?php
use App\User;
use Modules\Address\Entities\State;
use App\Comment;
use App\Events\NewComment;
use \Stripe\Stripe;
use \Stripe\Plan;
use \Stripe\Token;
use \Stripe\Invoice;
use Spatie\PersonalDataExport\Jobs\CreatePersonalDataExportJob;

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

Route::group(['middleware'=>'guest'], function(){
   Route::get('/', function () {
     return view('welcome');
   });
});
Route::get('/blog/posts', 'PostController@index')->name('post.index');
Route::get('/blog/pages', 'PageController@viewPages')->name('page.index');
Route::get('/blog/page/{slug}/{page_id}/view', 'PageController@view')->name('page.view');
Route::post('/blog/page/{slug}/{page_id}/update', 'PageController@updatePage')->name('update.page');
Route::post('/blog/page/{page_slug}/{page_id}/update-content-content', 'PageController@updatePageContent')->name('update.page.content');

Route::post('/blog/pages/create', 'PageController@createPage')->name('page.create');

Route::resource('/posts', 'PostController');

Route::view('/family/member/death/page', 'Include.Pages.dead')->name('user.dead');

Auth::routes();

Route::get('user/create/account','Auth\RegisterController@showRegistrationForm')->name('signup');

Route::post('user/account/register','Auth\RegisterController@register')->name('register');                                               
Route::get('family/login','Auth\LoginController@showLoginForm')->name('family.login');

Route::post('user/login','Auth\LoginController@login')->name('user.login');

Route::get('/{family}/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@verifyUser');

















//Route::view('/room','room')->name('room');
// Route::get('/create_plan', function(){
// 	Stripe::setApiKey(env('STRIPE_SECRET'));
// 	$plan = Plan::create([
// 	  "amount" => 5000,
// 	  "interval" => "month",
// 	  "product" => [
// 	    "name" => "Email"
// 	  ],
// 	  "currency" => "ngn",
// 	  "id" => "email-plan"
// 	]);

// 	dd(response($plan));
// });
// Route::get('/get_plan', function(){
// 	Stripe::setApiKey(env('STRIPE_SECRET'));
// 	$plan = Plan::retrieve('gold-special');
// 	dd(response()->json($plan));
// });
// Route::view('/custom','Subscription.custom');
// Route::get('/get_invoice', function(){
// 	Stripe::setApiKey(env('STRIPE_SECRET'));
// 	$user = Auth::user();
// 	$invoice = $user->invoiceFor('One	Time	Fee',	500,	[
// 					'description'	=>	'the custome fee',
// 	]);
// 	dd($invoice);
// 	$invoice = Invoice::create([
// 	    "customer" => Auth::user()->stripe_id
// 	]);
// 	dd($invoice);
// });
// Route::get('/all_plans', function(){
// 	Stripe::setApiKey(env('STRIPE_SECRET'));
// 	$plans = Plan::all();
// 	foreach($plans->data as $plan){
// 		 dd($plan);
// 	}
	
// });



// Route::get('/get_token', function(){
// 	Stripe::setApiKey(env('STRIPE_SECRET'));
// 	$token = Token::create([
// 	  "card" => [
// 	    "number" => "4242424242424242",
// 	    "exp_month" => 12,
// 	    "exp_year" => 2019,
// 	    "cvc" => "314"
// 	  ]
// 	]);
// 	dd(response()->json($token));
// });


   // Route::get('/sms','SubscriptionController@sms')->name('sms-subs');
   // Route::get('/slack','SubscriptionController@slack')->name('slack-subs');
   // Route::get('/email','SubscriptionController@email')->name('email-subs');
   // Route::get('/Subscription','SubscriptionController@subscription')->name('join-subs');
   // Route::post('/Subscribe','SubscriptionController@subscribe')->name('subscribe');



// Route::PersonalDataExports('personal-data-exports');

// Route::get('create_personal_data', function(){
//     dispatch(new CreatePersonalDataExportJob(auth()->user()));
// });