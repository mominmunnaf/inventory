<?php

use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//EMployee routes are here--------------------------
Route::get('/add_employee','EmployeeController@AddEmployee')->name('add.employee');
Route::post('/insert-employee','EmployeeController@InsertEmployee')->name('insert.employee');
Route::get('/all-employee','EmployeeController@AllEmployee')->name('all.employee');
Route::get('/view-employee/{id}','EmployeeController@ViewEmployee');
Route::get('/edit-employee/{id}','EmployeeController@EditEmployee');
Route::get('/delete-employee/{id}','EmployeeController@DeleteEmployee');
Route::post('/update.employee/{id}','EmployeeController@UpdateEmployee');


//Customer routes are here--------------------------
Route::get('/add_customer','CustomerController@AddCustomer')->name('add.customer');
Route::post('/insert_customer','CustomerController@InsertCustomer')->name('insert.customer');
Route::get('/all_customer','CustomerController@AllCustomer')->name('all.customer');
Route::get('/view-customer/{id}','CustomerController@ViewCustomer');
Route::get('/edit-customer/{id}','CustomerController@EditCustomer');
Route::get('/delete-customer/{id}','CustomerController@DeleteCustomer');
Route::post('/update.customer/{id}','CustomerController@UpdateCustomer');


//Supplier routes are here--------------------------
Route::get('/add_supplier','SupplierController@AddSupplier')->name('add.supplier');
Route::post('/insert_supplier','SupplierController@InsertSupplier')->name('insert.supplier');
Route::get('/all_supplier','SupplierController@AllSupplier')->name('all.supplier');
Route::get('/view-supplier/{id}','SupplierController@ViewSupplier');
Route::get('/edit-supplier/{id}','SupplierController@EditSupplier');
Route::get('/delete-supplier/{id}','SupplierController@DeleteSupplier');
Route::post('/update.supplier/{id}','SupplierController@UpdateSupplier');

//Category routes are here--------------------------
Route::get('/add_category','CategoryController@AddCategory')->name('add.category');
Route::post('/insert_category','CategoryController@InsertCategory')->name('insert.category');
Route::get('/all_category','CategoryController@AllCategory')->name('all.category');
Route::get('/view-category/{id}','CategoryController@ViewCategory');
Route::get('/edit-category/{id}','CategoryController@EditCategory');
Route::get('/delete-category/{id}','CategoryController@DeleteCategory');
Route::post('/update.category/{id}','CategoryController@UpdateCategory');


//Product routes are here--------------------------
Route::get('/add_product','ProductController@AddProduct')->name('add.product');
Route::post('/insert_product','ProductController@InsertProduct')->name('insert.product');
Route::get('/all_product','ProductController@AllProduct')->name('all.product');
Route::get('/view-product/{id}','ProductController@ViewProduct');
Route::get('/edit-product/{id}','ProductController@EditProduct');
Route::get('/delete-product/{id}','ProductController@DeleteProduct');
Route::post('/update.product/{id}','ProductController@UpdateProduct');
//Import Export Data Routes are here---
Route::get('/import-produt','ProductController@ImportProduct')->name('import.product');
Route::get('/export','ProductController@export')->name('export');
Route::post('/import','ProductController@import')->name('import');

//POS Routes are here--------------Order routes are here--------------------------------
Route::get('/pos','PosController@Index')->name('pos');
Route::get('/pending-order','Poscontroller@PendingOrder')->name('pending.order');
Route::get('/view-order-status/{id}','Poscontroller@ViewOrder');
Route::get('/pos.done/{id}','Poscontroller@PosDone');
Route::get('/success-order','Poscontroller@SuccessOrder')->name('success.order');


//Cart Routes are here----------------------------------------------
Route::post('/add-cart','CartController@Index')->name('add.cart');
Route::post('/cart.update/{rowId}','CartController@Update');
Route::get('/cart.delete/{rowId}','CartController@Delete');
Route::post('/invoice','CartController@Invoice');
Route::post('/final.invoice','CartController@FinalInvoice');






