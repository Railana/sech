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

Route::get('/', 'HomeController@index');

Route::auth();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');
    Route::get('/areas/{id}', 'AreaController@getAreas');

    //rotas de users
    Route::group(['prefix' => 'users', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'users.index', 'uses' => 'UserController@index', 'middleware' => ['permission:gestao_usuario-list|gestao_usuario-create|gestao_usuario-edit|gestao_usuario-delete']]);
        Route::get('/create', ['as' => 'users.create', 'uses' => 'UserController@create', 'middleware' => ['permission:gestao_usuario-create']]);
        Route::post('/create', ['as' => 'users.store', 'uses' => 'UserController@store', 'middleware' => ['permission:gestao_usuario-create']]);
        Route::get('/{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
        Route::get('/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit', 'middleware' => ['permission:gestao_usuario-edit']]);
        Route::patch('/{id}', ['as' => 'users.update', 'uses' => 'UserController@update', 'middleware' => ['permission:gestao_usuario-edit']]);
        Route::delete('/{id}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy', 'middleware' => ['permission:gestao_usuario-delete']]);
    });

    //rotas de roles
    Route::group(['prefix' => 'roles', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'roles.index', 'uses' => 'RoleController@index', 'middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
        Route::get('/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
        Route::post('/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
        Route::get('/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
        Route::get('/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
        Route::patch('/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
        Route::delete('/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);
    });

    //rotas de Item
    Route::group(['prefix' => 'itemCRUD2', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'itemCRUD2.index', 'uses' => 'ItemCRUD2Controller@index', 'middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
        Route::get('/create', ['as' => 'itemCRUD2.create', 'uses' => 'ItemCRUD2Controller@create', 'middleware' => ['permission:item-create']]);
        Route::post('/create', ['as' => 'itemCRUD2.store', 'uses' => 'ItemCRUD2Controller@store', 'middleware' => ['permission:item-create']]);
        Route::get('/{id}', ['as' => 'itemCRUD2.show', 'uses' => 'ItemCRUD2Controller@show']);
        Route::get('/{id}/edit', ['as' => 'itemCRUD2.edit', 'uses' => 'ItemCRUD2Controller@edit', 'middleware' => ['permission:item-edit']]);
        Route::patch('/{id}', ['as' => 'itemCRUD2.update', 'uses' => 'ItemCRUD2Controller@update', 'middleware' => ['permission:item-edit']]);
        Route::delete('/{id}', ['as' => 'itemCRUD2.destroy', 'uses' => 'ItemCRUD2Controller@destroy', 'middleware' => ['permission:item-delete']]);
    });

    //rotas de periodo letivo
    Route::group(['prefix' => 'periodoLetivo', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'periodoLetivo.index', 'uses' => 'PeriodoLetivoController@index', 'middleware' => ['permission:gestao_periodo_letivo-list|gestao_periodo_letivo-create|gestao_periodo_letivo-edit|gestao_periodo_letivo-delete']]);
        Route::get('/create', ['as' => 'periodoLetivo.create', 'uses' => 'PeriodoLetivoController@create', 'middleware' => ['permission:gestao_periodo_letivo-create']]);
        Route::post('/create', ['as' => 'periodoLetivo.store', 'uses' => 'PeriodoLetivoController@store', 'middleware' => ['permission:gestao_periodo_letivo-create']]);
        Route::get('/{id}', ['as' => 'periodoLetivo.show', 'uses' => 'PeriodoLetivoController@show']);
        Route::get('/{id}/edit', ['as' => 'periodoLetivo.edit', 'uses' => 'PeriodoLetivoController@edit', 'middleware' => ['permission:gestao_periodo_letivo-edit']]);
        Route::patch('/{id}', ['as' => 'periodoLetivo.update', 'uses' => 'PeriodoLetivoController@update', 'middleware' => ['permission:gestao_periodo_letivo-edit']]);
        Route::delete('/{id}', ['as' => 'periodoLetivo.destroy', 'uses' => 'PeriodoLetivoController@destroy', 'middleware' => ['permission:gestao_periodo_letivo-delete']]);
    });

    //rotas para relatório
    Route::get('/relatorioUsuario', ['as' => 'relatorio.usuario', 'uses' => 'RelatorioController@relatorioUsuario', 'middleware' => ['permission:relatorioUsuario']]);

    //rotas de especialidade
    Route::group(['prefix' => 'especialidade', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'especialidade.index', 'uses' => 'EspecialidadeController@index', 'middleware' => ['permission:especialidade-list|especialidade-create|especialidade-edit|especialidade-delete']]);
        Route::get('/create', ['as' => 'especialidade.create', 'uses' => 'EspecialidadeController@create', 'middleware' => ['permission:especialidade-create']]);
        Route::post('/create', ['as' => 'especialidade.store', 'uses' => 'EspecialidadeController@store', 'middleware' => ['permission:especialidade-create']]);
        Route::get('/{id}', ['as' => 'especialidade.show', 'uses' => 'EspecialidadeController@show']);
        Route::get('/{id}/edit', ['as' => 'especialidade.edit', 'uses' => 'EspecialidadeController@edit', 'middleware' => ['permission:especialidade-edit']]);
        Route::patch('/{id}', ['as' => 'especialidade.update', 'uses' => 'EspecialidadeController@update', 'middleware' => ['permission:especialidade-edit']]);
        Route::delete('/{id}', ['as' => 'especialidade.destroy', 'uses' => 'EspecialidadeController@destroy', 'middleware' => ['permission:especialidade-delete']]);
    });
    
    //rotas de médico
    Route::group(['prefix' => 'medico', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('', ['as' => 'medico.index', 'uses' => 'MedicoController@index', 'middleware' => ['permission:gestao_medico-list|gestao_medico-create|gestao_medico-edit|gestao_medico-delete']]);
        Route::get('/create', ['as' => 'medico.create', 'uses' => 'MedicoController@create', 'middleware' => ['permission:gestao_medico-create']]);
        Route::post('/create', ['as' => 'medico.store', 'uses' => 'MedicoController@store', 'middleware' => ['permission:gestao_medico-create']]);
        Route::get('/{id}', ['as' => 'medico.show', 'uses' => 'MedicoController@show']);
        Route::get('/{id}/edit', ['as' => 'medico.edit', 'uses' => 'MedicoController@edit', 'middleware' => ['permission:gestao_medico-edit']]);
        Route::patch('/{id}', ['as' => 'medico.update', 'uses' => 'MedicoController@update', 'middleware' => ['permission:gestao_medico-edit']]);
        Route::delete('/{id}', ['as' => 'medico.destroy', 'uses' => 'MedicoController@destroy', 'middleware' => ['permission:gestao_medico-delete']]);
    });

    
    

});

