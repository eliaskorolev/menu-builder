<?php

Route::group(['middleware' => config('menu.middleware')], function () {
    //Route::get('wmenuindex', array('uses'=>'\Eliaskorolev\Menu\Controllers\MenuController@wmenuindex'));
    $path = rtrim(config('menu.route_path'));
    Route::post($path . '/addcustommenu', array('as' => 'haddcustommenu', 'uses' => '\Eliaskorolev\Menu\Controllers\MenuController@addcustommenu'));
    Route::post($path . '/deleteitemmenu', array('as' => 'hdeleteitemmenu', 'uses' => '\Eliaskorolev\Menu\Controllers\MenuController@deleteitemmenu'));
    Route::post($path . '/deletemenug', array('as' => 'hdeletemenug', 'uses' => '\Eliaskorolev\Menu\Controllers\MenuController@deletemenug'));
    Route::post($path . '/createnewmenu', array('as' => 'hcreatenewmenu', 'uses' => '\Eliaskorolev\Menu\Controllers\MenuController@createnewmenu'));
    Route::post($path . '/generatemenucontrol', array('as' => 'hgeneratemenucontrol', 'uses' => '\Eliaskorolev\Menu\Controllers\MenuController@generatemenucontrol'));
    Route::post($path . '/updateitem', array('as' => 'hupdateitem', 'uses' => '\Eliaskorolev\Menu\Controllers\MenuController@updateitem'));
});
