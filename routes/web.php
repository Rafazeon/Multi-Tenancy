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

Route::get('painel/produtos/tests', 'Painel\ProdutoController@tests');

// Route::get('/login', function () {
//     return "#Logue-se";
// });

// Route::get('/', function () {
//     return redirect()->route('academia');
// });

 Route::get('/', function () {
     return view('welcome');
 });


// Route::get('/categoria/{idCat}', function ($idCat) {
//     return ("Posts da categoria {$idCat}");
// });


// Route::get('/contato', function () {
//     return 'Contato';
// });

// Route::get('/academia/alunos', function () {
//     return 'Alunos';
// })->name('academia');

// Configurando Sub-domínio dinâmico
$appUrl = config('app.url');
$domain = parse_url($appUrl)['host']; // Para pegar apenas o host da aplicação sem o http
$tenantParam = config('tenant.route_param'); // Utilizando o Config Tenant
Route::domain("{{$tenantParam}}.$domain")
        ->middleware('tenant')
        ->group(function(){
            
            // O Login só vai ser acessível dentro do sub domínio e domínio
            Auth::routes();
            
            Route::get('/test', function($tenant){
                return "Hello World $tenant ";
            });
            
            Route::prefix('/admin')
                ->middleware('auth:web')
                ->group(function() {
                Route::get('/', function(){
                    return "Admin";
                });
            }); 
            
            Route::prefix('/app')
                ->middleware('auth:web_tenants')
                ->group(function() {
                Route::resource('painel/produtos', 'Painel\ProdutoController');
                Route::get('/', function(){
                    return "App Multi Tenancy";
                });
            });  
            
            Route::get('/home', 'HomeController@index')->name('home');
        });
