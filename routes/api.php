<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Eventos
    Route::resource('eventos', 'EventoApiController');
    Route::put('eventoIngresoEgreso/{evento}', 'EventoApiController@postEventoIngresoEgreso');

    // Ingreso
    Route::resource('ingresos', 'IngresoApiController');

    // Egreso
    Route::resource('egresos', 'EgresoApiController');

    // EgresoCategoria
    Route::resource('egresoCategoria', 'EgresoCategoriaApiController');

    // MedioDePago
    Route::resource('medioDePago', 'MedioDePagoApiController');

    // Google calendar Events
    Route::get('googleEvents', 'EventoApiController@getGoogleEvents')->name('getGoogleEvents');
});
