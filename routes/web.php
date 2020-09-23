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



Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Auth::routes();

//Route::resource('client', 'ClientController');


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//Medicine Manage Route

Route::get('/addmedicine', 'MedicineController@addmedicineform');
Route::post('/addmedicinedata', "MedicineController@insermedicinedata");
Route::get('/viewmedicine', "MedicineController@viewmedicine");
Route::get('/viewmedicinewithid', "MedicineController@viewmedicinewithid");
Route::post('/upmedicine', "MedicineController@medicineupdate");
Route::get('/deletemedicinewithid', "MedicineController@deletemedicinewithid");
Route::get('/printmedicinewithid', "MedicineController@printmedicinewithid");

Route::get('/excel', "MedicineController@getExcel");

//Coustomer Manage Route
Route::get('/addcustomer', 'CoustomerController@addcoustomerform')->middleware('auth');
Route::post('/addcustomerdata', "CoustomerController@insertcoustomerdata");
Route::get('/coustomerview', 'CoustomerController@viewcoustomer');
Route::get('/viewcoustomerwithid', 'CoustomerController@viewcoustomerwithid');
Route::post('/upcoustomer', 'CoustomerController@customerupdate');
Route::get('/deletecustomerwithid', "CoustomerController@deletewithid");
Route::get('/cviewdemo', "CoustomerController@cviewdemo");

Route::get('/pacd', "CoustomerController@pacd");
Route::get('/showmail', function () {
    return view('maillayout');
});

Route::get('/sendmail', "CoustomerController@sendmail");
Route::get('/addnewcoustomer', "CoustomerController@Addnewc")->name('c.add');

Route::get('/cbill', function () {
    return view('cbill');
});
