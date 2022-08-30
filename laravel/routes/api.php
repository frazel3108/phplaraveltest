<?php

use App\Http\Controllers\NotebooksController;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// GET /api/v1/notebook/
Route::get('v1/notebook/', [NotebooksController::class, 'index']);

// POST /api/v1/notebook/
Route::post('v1/notebook/', [NotebooksController::class, 'store']);

// GET /api/v1/notebook/<id>/
Route::get('v1/notebook/{idNotebook}', [NotebooksController::class, 'show']);

// PUT /api/v1/notebook/<id>/
Route::post('v1/notebook/{idNotebook}', [NotebooksController::class, 'update']);

// DELETE /api/v1/notebook/<id>/
Route::delete('v1/notebook/{idNotebook}', [NotebooksController::class, 'delete']);
