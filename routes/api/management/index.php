<?php

use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "/school", "as"     => "school."], __DIR__ . "/assets/school.php");