<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(
  base_path('routes\auth\routes.php'),
);

Route::prefix('/')->group(
    base_path('routes\admin\routes.php'),
);
