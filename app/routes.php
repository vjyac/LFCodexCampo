<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', function () {

	return View::make('hello');

}]);


Route::get('profile', function() {

	return "Bienvenido " . Auth::user()->email;

})->before('auth');

Route::get('login','SessionsController@create');
Route::get('logout','SessionsController@destroy');
Route::resource('sessions', 'SessionsController' , ['only' => ['index', 'create', 'destroy', 'store']]);
Route::resource('users', 'UsersController');



Route::get( '/chofers/search', array(
    'as' => 'chofers.search',
    'uses' => 'ChofersController@search'
) );
Route::resource('chofers', 'ChofersController');

Route::get( '/actividads/search', array(
    'as' => 'actividads.search',
    'uses' => 'ActividadsController@search'
) );



// Provincias
Route::get( '/provincias/search', array(
    'as' => 'provincias.search',
    'uses' => 'ProvinciasController@search'
) );
Route::resource('provincias', 'ProvinciasController');

// Ciudads
Route::get( '/ciudads/search', array(
    'as' => 'ciudads.search',
    'uses' => 'CiudadsController@search'
) );
Route::resource('ciudads', 'CiudadsController');


// Ciudads
Route::get( '/establecimientos/search', array(
    'as' => 'establecimientos.search',
    'uses' => 'EstablecimientosController@search'
) );
Route::post( '/establecimientos/finders', array(
    'as' => 'establecimientos.finders',
    'uses' => 'EstablecimientosController@finders'
) );
Route::resource('establecimientos', 'EstablecimientosController');


// Motivomovimiento
Route::get( '/movimientomotivos/search', array(
    'as' => 'movimientomotivos.search',
    'uses' => 'MovimientomotivosController@search'
) );
Route::resource('movimientomotivos', 'MovimientomotivosController');



// productosunidadmedidas
Route::get( '/productosunidadmedidas/search', array(
    'as' => 'productosunidadmedidas.search',
    'uses' => 'ProductosunidadmedidasController@search'
) );
Route::resource('productosunidadmedidas', 'ProductosunidadmedidasController');

// lotes
Route::get( '/lotes/search', array(
    'as' => 'lotes.search',
    'uses' => 'LotesController@search'
) );
Route::resource('lotes', 'LotesController');




// Productos
Route::get( '/productos/search', array(
    'as' => 'productos.search',
    'uses' => 'ProductosController@search'
) );
Route::resource('productos', 'ProductosController');


// grupos
Route::get( '/grupos/search', array(
    'as' => 'grupos.search',
    'uses' => 'GruposController@search'
) );
Route::resource('grupos', 'GruposController');



// clientesproveedor
Route::get( '/clientesproveedors/search', array(
    'as' => 'clientesproveedors.search',
    'uses' => 'ClientesproveedorsController@search'
) );
Route::resource('clientesproveedors', 'ClientesproveedorsController');


// DocumentostiposController
Route::get( '/documentostipos/search', array(
    'as' => 'documentostipos.search',
    'uses' => 'DocumentostiposController@search'
) );
Route::resource('documentostipos', 'DocumentostiposController');








// repote producto por contratista
Route::get('/movimientos/reportes/productoporcontratista', 'MovimientosController@showproductoporcontratista');
Route::post( '/movimientos/reporteproductoporcontratista', array(
    'as' => 'movimientos.reporteproductoporcontratista',
    'uses' => 'MovimientosController@reporteproductoporcontratista'
) );

// repote flete por proveedor
Route::get('/movimientos/reportes/fleteporproveedor', 'MovimientosController@showfleteporproveedor');
Route::post( '/movimientos/reportefleteporproveedor', array(
    'as' => 'movimientos.reportefleteporproveedor',
    'uses' => 'MovimientosController@reportefleteporproveedor'
) );

// producto por cliente
Route::get('/movimientos/reportes/productoporcliente', 'MovimientosController@showproductoporcliente');
Route::post( '/movimientos/reporteproductoporcliente', array(
    'as' => 'movimientos.reporteproductoporcliente',
    'uses' => 'MovimientosController@reporteproductoporcliente'
) );


// producto por origen
Route::get('/movimientos/reportes/productopororigen', 'MovimientosController@showproductopororigen');
Route::post( '/movimientos/reporteproductopororigen', array(
    'as' => 'movimientos.reporteproductopororigen',
    'uses' => 'MovimientosController@reporteproductopororigen'
) );


Route::resource('movimientos', 'MovimientosController');


// vehiculos
Route::get( '/vehiculos/search', array(
    'as' => 'vehiculos.search',
    'uses' => 'VehiculosController@search'
) );
Route::resource('vehiculos', 'VehiculosController');


Route::resource('movimientosganaderias', 'MovimientosganaderiasController');

Route::resource('movimientosganaderiascuerpos', 'MovimientosganaderiascuerposController');

Route::get('movimientosganaderiascuerpos/{id}/borrar', 'MovimientosganaderiascuerposController@borrar');
