<?php

use App\Events\DatasetUpdated;

Broadcast::channel('dataset', function ($user) {
    return true;
});

Route::get('/update-dataset', function () {
    $dataset = DB::table('users')->get();

    event(new DatasetUpdated($dataset));

    return 'Dataset updated!';
});

