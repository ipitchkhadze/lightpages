<?php

Route::group(['prefix' => 'admin'], function() {
    Route::get('/pages', function () {
        return 'Pages';
    });
});
