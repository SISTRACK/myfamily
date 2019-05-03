<?php
use App\User;
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


Route::get('/test', function(){
       $name = 'isah.12';
        echo 'the name is '.substr($name, 0, strpos($name, '.')).'----------';
       
   
        echo 'the id is '.substr($name, strpos($name, '.')+1);
    
});

Auth::routes();
Route::get('/create_plan', function(){
	Stripe::setApiKey(env('STRIPE_SECRET'));
	$plan = Plan::create([
	  "amount" => 5000,
	  "interval" => "month",
	  "product" => [
	    "name" => "Email"
	  ],
	  "currency" => "ngn",
	  "id" => "email-plan"
	]);

	dd(response($plan));
});
Route::get('/get_plan', function(){
	Stripe::setApiKey(env('STRIPE_SECRET'));
	$plan = Plan::retrieve('gold-special');
	dd(response()->json($plan));
});
Route::view('/custom','Subscription.custom');
Route::get('/get_invoice', function(){
	Stripe::setApiKey(env('STRIPE_SECRET'));
	$user = Auth::user();
	$invoice = $user->invoiceFor('One	Time	Fee',	500,	[
					'description'	=>	'the custome fee',
	]);
	dd($invoice);
	$invoice = Invoice::create([
	    "customer" => Auth::user()->stripe_id
	]);
	dd($invoice);
});
Route::get('/all_plans', function(){
	Stripe::setApiKey(env('STRIPE_SECRET'));
	$plans = Plan::all();
	foreach($plans->data as $plan){
		 dd($plan);
	}
	
});

Route::get('/dashboard','DashboardController@index')->middleware(['auth','admin'])->name('dashboard');

Route::get('/get_token', function(){
	Stripe::setApiKey(env('STRIPE_SECRET'));
	$token = Token::create([
	  "card" => [
	    "number" => "4242424242424242",
	    "exp_month" => 12,
	    "exp_year" => 2019,
	    "cvc" => "314"
	  ]
	]);
	dd(response()->json($token));
});
Route::view('/room','room')->name('room');
Route::get('/home', 'HomeController@index')->middleware(['auth','dead'])->name('home');
Route::view('/user_dead', 'Include.Pages.dead')->name('user.dead');

   Route::get('/sms','SubscriptionController@sms')->name('sms-subs');
   Route::get('/slack','SubscriptionController@slack')->name('slack-subs');
   Route::get('/email','SubscriptionController@email')->name('email-subs');
   Route::get('/Subscription','SubscriptionController@subscription')->name('join-subs');
   Route::post('/Subscribe','SubscriptionController@subscribe')->name('subscribe');

Route::resource('/posts', 'PostController');
Route::group(['middleware'=>'auth'], function(){
   
});
Route::get('/subscribe', function (){
});


// Route::PersonalDataExports('personal-data-exports');

// Route::get('create_personal_data', function(){
//     dispatch(new CreatePersonalDataExportJob(auth()->user()));
// });