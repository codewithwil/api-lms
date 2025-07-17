<?php

use App\Http\Controllers as ctr;
use Illuminate\Support\Facades\Route;

Route::get("/", [ctr\API\Management\School\SchoolC::class, 'index'])->name("index");
Route::get("/invoice", [ctr\API\Management\School\SchoolC::class, 'invoice'])->name("invoice");
Route::get("/show/{schoolId}", [ctr\API\Management\School\SchoolC::class, 'show'])->name("show");
Route::post("/store", [ctr\API\Management\School\SchoolC::class, 'store'])->name("store");
Route::post("/update/{schoolId}", [ctr\API\Management\School\SchoolC::class, 'update'])->name("update");
Route::post("/delete/{schoolId}", [ctr\API\Management\School\SchoolC::class, 'delete'])->name("delete");