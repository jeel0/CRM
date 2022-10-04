<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ExcelCSVController;
use App\Http\Controllers\CalendarController;
use App\Models\Event;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', \App\Http\Livewire\Dashboard\Index::class)->name('dashboard');

    //get the index for Tasks controller
    Route::get('tasks', \App\Http\Livewire\Tasks\index::class);

    Route::delete('/tasks/{task}', [TasksController::class, 'destroy']);

    Route::delete('/task/{task}', [TasksController::class, 'destroy']);
     
    //get the index for Users controller
    Route::get('users', \App\Http\livewire\users\index::class);

    // Route::get('view', \App\Http\livewire\Tasks\View::class)->name('view');

    Route::get('tasks/view/{task}', \App\Http\livewire\Tasks\View::class);

    //get the index for contacts controller
    Route::get('contacts', \App\Http\Livewire\Contacts\Index::class)->name('contacts');
    Route::get('contacts/{contact}', \App\Http\Livewire\Contacts\View::class);
    Route::get('contacts/edit/{contact}', \App\Http\Livewire\Contacts\Edit::class);

    Route::get('reports', \App\Http\Livewire\Reports\Index::class)->name('reports');


    Route::view("/import", 'import');
    Route::view("/profile", 'setting');
    Route::get('excel-csv-file', [ExcelCSVController::class, 'index']);
    Route::post('import-excel-csv-file', [ExcelCSVController::class, 'importExcelCSV']);
    Route::get('export-excel-csv-file/{slug}', [ExcelCSVController::class, 'exportExcelCSV']);
    Route::controller(CalendarController::class)->group(function () {
        Route::get('calendar', 'index');
        Route::post('calendar/create', 'create');
        Route::post('calendar/update', 'update');
        Route::post('calendar/delete', 'delete');
        Route::get('addeventurl', 'addEvent');
    });
});

require_once __DIR__ . '/jetstream.php';
