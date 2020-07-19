<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group([
	"namespace" => 'Site',
], function() {
	Route::get('/', 'HomeController@index');

	Route::get('sobre', 'SobreController@index');

	Route::get('procedimentos', 'ProcedimentoController@index'); 

	Route::get('procedimentos/{permalink}', 'ProcedimentoController@loadDetail'); 

	Route::get('blog', 'BlogController@index');

	Route::get('blog/{permalink}', 'BlogController@loadDetail');

	Route::post('post-contato', 'ContatoController@postContato');

	Route::post('newsletter', 'NewsletterController@postCadastroNewsletter');
	
	Route::get('contato', 'ContatoController@index');

	// Route::get('filtrar/categoria/{permalink}', 'BlogController@loadCategory');
	
	// Route::get('quem-somos', 'SobreController@loadQuemSomos');

	// Route::get('linha-do-tempo', 'SobreController@loadLinhaTempo');

	// Route::get('ambientes', 'AmbienteController@index');

	// Route::get('ambientes/{permalink}', 'AmbienteController@loadDetail');

	// Route::get('projetos', 'ProjetoController@index');

	// Route::get('projetos/{permalink}', 'ProjetoController@loadDetail');

});


// Route::get('/', function () {
//     return redirect()->route('auth.postlogin');
// });

/**
 * Admin Panel
 */

Route::group([
	"namespace" => 'Admin',
	'prefix' => 'admin',
	'middleware' => 'auth'

], function() {
	
	Route::resource('categoria', 'CategoriasController');
	Route::get('categoria/status/{id}', [
		'as' => 'admin.categoria.status',
		'uses' => 'CategoriasController@categoryChangeStatus'
	]);

	Route::resource('posts', 'PostController');
	Route::get('posts/status/{id}', [
		'as' => 'admin.posts.status',
		'uses' => 'PostController@postChangeStatus'
	]);

	Route::resource('procedimento', 'ProcedimentosController');
	Route::get('procedimento/status/{id}', [
		'as' => 'admin.procedimento.status',
		'uses' => 'ProcedimentosController@changeStatus'
	]);

	Route::resource('banner', 'BannersController');
	Route::resource('ambiente', 'EnvironmentController');
	Route::post('ambiente/ajax/set-session-imagem', 'EnvironmentController@saveImagem');
	// Route::post('ambiente/cadastro-imagem-ambiente/uploadify', 'AmbientesController@copiaImagem');
	
	Route::get('busca-categorias', [
		'as' => 'get-categorias',
		'uses' => 'ReservasController@getCategorias'
	]);

	Route::post('ckeditor/image_upload', [
		'as' => 'upload',
		'uses' => 'PostController@upload'
	]);
	

	//Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
	
	

});

//Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');


/**
 * Auth
 */
Route::get('login', [
	'as' => 'auth.login',
	'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('login', [
	'as' => 'auth.postlogin',
	'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('logout', [
	'as' => 'auth.logout',
	'uses' => 'Auth\AuthController@logout'
]);

// Route::get('register', 'Auth\AuthController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\AuthController@register');

