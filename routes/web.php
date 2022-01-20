<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('test');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Cliente Routes
Route::get('/cliente/list', [\App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.list');
Route::get('/cliente/create', [\App\Http\Controllers\ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente/store', [\App\Http\Controllers\ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/show/{uid}', [\App\Http\Controllers\ClienteController::class, 'show'])->name('cliente.show');

//Endereco Rotas
Route::get('/endereco/create/{uid?}', [\App\Http\Controllers\EnderecoController::class, 'create'])->name('endereco.create');
Route::post('/endereco/store/{uid?}', [\App\Http\Controllers\EnderecoController::class, 'store'])->name('endereco.store');

//Telefones Rotas
Route::get('/telefone/create/{uid?}', [\App\Http\Controllers\TelefoneController::class, 'create'])->name('telefone.create');
Route::post('/telefone/store/{uid?}', [\App\Http\Controllers\TelefoneController::class, 'store'])->name('telefone.store');

//Emails Rotas
Route::get('/email/create/{uid?}', [\App\Http\Controllers\EmailController::class, 'create'])->name('email.create');
Route::post('/email/store/{uid?}', [\App\Http\Controllers\EmailController::class, 'store'])->name('email.store');

//Dados Bancarios Rotas
Route::get('/dados-bancarios/create/{uid?}', [\App\Http\Controllers\DadosBancariosController::class, 'create'])->name('dados-bancarios.create');
Route::post('/dados-bancarios/store/{uid?}', [\App\Http\Controllers\DadosBancariosController::class, 'store'])->name('dados-bancarios.store');

//Propostas Rotas
Route::get('/proposta/list', [\App\Http\Controllers\PropostaController::class, 'index'])->name('proposta.list');
Route::post('/proposta/show/{uid}/{proposta_id}', [\App\Http\Controllers\PropostaController::class, 'show'])->name('proposta.show');
Route::get('/proposta/create/{uid?}', [\App\Http\Controllers\PropostaController::class, 'create'])->name('proposta.create');
Route::post('/proposta/store/{uid?}', [\App\Http\Controllers\PropostaController::class, 'store'])->name('proposta.store');
Route::get('/proposta/calculo/', [\App\Http\Controllers\PropostaController::class, 'calculo'])->name('proposta.calculo');
Route::post('/proposta/calculadora/', [\App\Http\Controllers\PropostaController::class, 'calculadora'])->name('proposta.calculadora');
//Gera PDF Emprestimo Cartão de Crédito
Route::post('/proposta/pdf/imprimir-proposta-cc/', [\App\Http\Controllers\PDFController::class, 'imprimirpropostacc'])->name('proposta.propostacc');

//Documento Proposta Rotas
Route::get('/documento-proposta/create/{uid}/{proposta_id}', [\App\Http\Controllers\DocumentoPropostaController::class, 'create'])->name('documento.create');
Route::post('/documento-proposta/store/', [\App\Http\Controllers\DocumentoPropostaController::class, 'store'])->name('documento.store');


Route::get('/documento-proposta/list/{uid?}/{proposta_id?}', [\App\Http\Controllers\DocumentoPropostaController::class, 'index'])->name('documento.list');


// Dashboard
Route::view('dashboard/home', 'dashboards.home');
