<?php

declare(strict_types=1);

use App\Http\Controllers\ApiV1\SanctionListsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::get('/lists', [SanctionListsController::class, 'index']);
});
