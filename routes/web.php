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



Route::get('/', 'OutletController@index')->name('index');

// Route::get('/abc', function () {
//     return view('sagufa');
// });


Route::post('/', 'RawMaterialController@store')->name('store');
	Route::post('/', 'FinishedGoodController@store')->name('store2');


Route::group(['prefix' => 'factory', 'as' => 'factory.', 'middleware' => 'auth'], function()
{

  Route::get('admin', function () {
    return view('adminTemplate/admin_template');
});



	Route::group(['prefix' => 'supplier', 'as' => 'supplier.'], function()
	{
		/*Supplier */

		Route::get('/', 'SupplierController@create')->name('create');
		Route::post('', 'SupplierController@store')->name('store');
	   Route::get('{supplier}/edit', 'SupplierController@edit')->name('edit');
	    Route::post('{supplier}/update', 'SupplierController@update')->name('update');





	});

	Route::group(['prefix' => 'raw', 'as' => 'raw.'], function()
	{

		/*Raw Material*/
		Route::post('save', 'RawMaterialController@store')->name('store');

		Route::get('/', 'RawMaterialController@index')->name('index');
		Route::get('create', 'RawMaterialController@create')->name('create');
/*		Route::post('/', 'RawMaterialController@store')->name('store');
*/		Route::get('{rawMaterial}/edit', 'RawMaterialController@edit')->name('edit');
		Route::post('{rawMaterial}/update', 'RawMaterialController@update')->name('update');

		Route::get('challan', 'RawMaterialController@challan')->name('challan');
	    Route::get('challanList', 'RawMaterialController@challanList')->name('challanList');
	    Route::post('search', 'RawMaterialController@challanSearch')->name('challanSearch');
		Route::post('challansave', 'RawMaterialController@challansave')->name('challansave');




	});

	/*Finished Goods*/


   Route::group(['prefix' => 'finished', 'as' => 'finished.'], function()
	{



		Route::get('/', 'FinishedGoodController@index')->name('index');
		Route::get('create', 'FinishedGoodController@create')->name('create');
		Route::post('', 'FinishedGoodController@store')->name('store2');
		Route::get('{finishedGood}/edit', 'FinishedGoodController@edit')->name('edit');
		Route::post('{finishedGood}/update', 'FinishedGoodController@update')->name('update');
		Route::get('challan', 'FinishedGoodController@challan')->name('challan');
		Route::post('', 'FinishedGoodController@challansave')->name('challansave');

		  Route::get('challanList', 'FinishedGoodController@challanList')->name('challanList');
	      Route::post('search', 'FinishedGoodController@challanSearch')->name('challanSearch');

	      Route::get('existingProduct', 'ReportController@existingProduct')->name('existingProduct');
	       Route::get('releasedGood', 'ReportController@existingProduct')->name('releasedGood');


	});







    		/*Stock*/

	Route::group(['prefix' => 'stock', 'as' => 'stock.'], function()
	{



		Route::get('/', 'StockManagementController@index')->name('index');
		Route::get('create', 'StockManagementController@create')->name('create');
		Route::post('store', 'StockManagementController@store')->name('store');


	});



});




   Route::group(['prefix' => 'clients', 'as' => 'clients.'], function()
	{



		Route::get('/', 'ClientsController@index')->name('index');
		Route::get('create', 'ClientsController@create')->name('create');

		Route::post('', 'ClientsController@store')->name('store');



	});



/* Sales */

   	Route::group(['prefix' => 'invoices', 'as' => 'invoices.'], function()
	{

		 Route::get('create', 'InvoicesController@create')->name('create');
		 Route::post('store', 'InvoicesController@store')->name('store');
		 Route::get('petty','InvoicesController@petty')->name('petty');




	});


 /*Outlet */
	Route::group(['prefix' => 'outlet', 'as' => 'outlet.'], function()
	{



		Route::get('/', 'OutletController@index')->name('index');
		// Route::get('create', 'ClientsController@create')->name('create');

		// Route::post('', 'ClientsController@store')->name('store');
		Route::get('/projects/chart/data', 'OutletController@projectChartData');

		Route::get('highestsellingProduct', 'OutletController@highestSellingProduct');





	});



/*Report*/

	Route::get('/raw_report/{mode}', 'ReportController@raw_material')->name('raw_material');
	Route::get('/raw_pdf/{raws}', 'ReportController@raw_material')->name('raw_pdf');

	Route::get('clients_list', 'ReportController@clients_list')->name('clients_list');
	Route::get('due_clients', 'ReportController@due_clients')->name('due_clients');

	Route::get('clientsIndex', 'ReportController@clients')->name('clientsIndex');
	Route::get('topPaid', 'ReportController@clients_top')->name('topPaid');
	Route::get('duePaid', 'ReportController@duePaid')->name('duePaid');
	Route::get('finishedIndex', 'ReportController@finishedIndex')->name('finishedIndex');

Route::post('clientSearch', 'ClientsController@clientSearch')->name('clientSearch');

 /*Petty*/

	Route::group(['prefix' => 'petty', 'as' => 'petty.'], function()
	{
		Route::get('/', 'PettyController@index')->name('index');
	    Route::post('/management', 'PettyController@management')->name('management');
	    Route::post('/type', 'PettyController@type')->name('type');
	    Route::get('/petty','PettyController@petty')->name('petty');



		// Route::get('create', 'ClientsController@create')->name('create');
	});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


