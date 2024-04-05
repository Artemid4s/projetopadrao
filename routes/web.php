<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas da web para sua aplicação. estes
| rotas são carregadas pelo RouteServiceProvider dentro de um grupo que
| contém o grupo de middleware "web". Agora crie algo incrível!
|
*/

Route::prefix('/')->name('site.')->group(function () {
    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::get('/contato', [SiteController::class, 'contato'])->name('contato');
    Route::get('/empresa', [SiteController::class, 'empresa'])->name('empresa');
    Route::get('/obrigado', [SiteController::class, 'obrigado'])->name('obrigado');
    Route::get('/privacidade', [SiteController::class, 'privacidade'])->name('privacidade');
    Route::get('/servicos', [SiteController::class, 'servicos'])->name('servicos');

    Route::post('/envia-contato', [SiteController::class, 'gravaContato'])->name('envia-contato');
});




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
