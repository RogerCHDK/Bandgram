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
Route::middleware('auth:api')->get('/user', 'UsuariosController@AuthRouteAPI');

Route::get('/', function () { 
    return view('bienvenida');  
})->name('inicio'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('usuario','UsuariosController'); 
Route::resource('artista','ArtistasController');
Route::resource('canciones','CancionesController');
Route::resource('videos','VideosController'); 
Route::resource('productos','ProductosController');
Route::resource('eventos','EventosController');
Route::resource('boletos','BoletosController'); 
Route::resource('bandas','BandasController'); 
Route::resource('integrantes','IntegrantesController'); 
Route::resource('tarjetas','TarjetasCreditosController'); 

//Index de usuarios
Route::get('/index_cancion', 'CancionesController@index_usuario')->name('canciones.index_usuario');
Route::get('/index_video', 'VideosController@index_usuario')->name('videos.index_usuario');
Route::get('/index_producto', 'ProductosController@index_usuario')->name('productos.index_usuario');
Route::get('/index_evento', 'EventosController@index_usuario')->name('eventos.index_usuario');
Route::get('/index_boleto', 'BoletosController@index_usuario')->name('boletos.index_usuario');
Route::get('/index_banda', 'BandasController@index_usuario')->name('bandas.index_usuario');
Route::get('/index_artista', 'ArtistasController@index_usuario')->name('artista.index_usuario');
 
 //Archivos
Route::get('cancion-imagen/{filename}', 'CancionesController@getImage')->name('cancion.imagen');
Route::get('cancion-audio/{filename}', 'CancionesController@getMusic')->name('cancion.audio');
Route::get('video-media/{filename}', 'VideosController@getVideo')->name('video.media');
Route::get('banda-imagen/{filename}', 'BandasController@getImage')->name('banda.imagen');
Route::get('producto-imagen/{filename}', 'ProductosController@getImage')->name('productos.imagen');
Route::get('evento-imagen/{filename}', 'EventosController@getImage')->name('eventos.imagen');
Route::get('artista-imagen/{filename}', 'ArtistasController@getImage')->name('artista.imagen');

//Metodos ajax
Route::get('combo_municipios/{estado_id}', 'AjaxController@municipios');
Route::get('filtrar_genero/{genero_id}', 'AjaxController@filtrar_genero');
 

Route::group(['middleware'=>'auth'], function(){
Route::get('sin_acceso', function(){
	$usuario=\Auth::user();
	return view("mensaje.error_acceso_usuario")
	->with('message','Privilegios insuficientes para acceder a esta seccion. Es necesario iniciar 
		sesion como Artista para tener acceso a esta seccion');
})->name('usuario.error');

Route::get('sin_acceso2', function(){
return view("mensaje.error_acceso_artista")->with('usuario',$usuario)
	->with('message','Privilegios insuficientes para acceder a esta seccion. Es necesario iniciar 
		sesion como Usuario para tener acceso a esta seccion');
})->name('artista.error');

});

Route::group(['middleware'=>'artista'], function(){
	//Route::resource('canciones','CancionesController');
	//Route::resource('videos','VideosController'); 
	//Route::resource('productos','ProductosController');
	//Route::resource('eventos','EventosController');
	//Route::resource('boletos','BoletosController'); 
	//Route::resource('bandas','BandasController'); 
	});

//Graficas
Route::get('graficas-usuario/', 'GraficasController@index')->name('graficas.index');
Route::get('graficas-boletos/', 'GraficasController@grafica_boletos')->name('graficas.boletos');
Route::get('graficas-productos/', 'GraficasController@grafica_productos')->name('graficas.productos');
Route::get('graficas-eventos/', 'GraficasController@grafica_eventos')->name('graficas.eventos'); 

//Reportes 
Route::get('reportes/', 'PdfController@genera_pdf')->name('reportes');
Route::get('reporte-evento/{tipo}', 'PdfController@crear_reporte_eventos')->name('reporte.eventos'); 
Route::get('reporte-producto/{tipo}', 'PdfController@crear_reporte_productos')->name('reporte.productos'); 
Route::get('reporte-boleto/{tipo}', 'PdfController@crear_reporte_boletos')->name('reporte.boletos');


//Correo
Route::get('form_enviar_correo', 'CorreoController@create')->name('correo.create');
Route::post('enviar_correo', 'CorreoController@enviar')->name('correo.enviar');

Route::get('mis-bandas', 'BandasController@mis_bandas')->name('bandas.mine'); 

Route::get('formulario-imagen-producto/{id}', 'ProductosController@imagen')->name('producto.imagen');  
Route::post('imagen-producto', 'ProductosController@crear_imagen')->name('producto.crearImagen');

Route::get('formulario-imagen-evento/{id}', 'EventosController@imagen')->name('evento.imagen');  
Route::post('imagen-evento', 'EventosController@crear_imagen')->name('evento.crearImagen'); 

//Compras de productos
Route::get('compra-producto/{id}', 'TarjetasCreditosController@compra')->name('compra.producto');  
Route::get('mis-productos', 'TarjetasCreditosController@mis_productos')->name('productos.mine'); 

//Compra de boletos 
Route::get('compra-boleto/{id}', 'TarjetasCreditosController@compra_boleto')->name('compra.boleto'); 
Route::post('pago-boleto', 'TarjetasCreditosController@pago_boleto')->name('boleto.pago'); 
Route::get('mis-boletos', 'TarjetasCreditosController@mis_boletos')->name('boletos.mine');  

//Asistir a eventos
Route::post('asistir-evento', 'EventosController@asistir')->name('evento.asistir');  
Route::get('mis-eventos', 'EventosController@mis_eventos')->name('eventos.mine');   

//Shows de usuarios
Route::get('show-video/{id}', 'VideosController@show_usuario')->name('video.usuario'); 
Route::get('show-producto/{id}', 'ProductosController@show_usuario')->name('producto.usuario'); 
Route::get('show-evento/{id}', 'EventosController@show_usuario')->name('evento.usuario');  
Route::get('show-boleto/{id}', 'BoletosController@show_usuario')->name('boleto.usuario');
Route::get('show-banda/{id}', 'BandasController@show_usuario')->name('banda.usuario');   