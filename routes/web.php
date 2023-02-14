<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use App\Models\Record;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(
    function () {

        /**
         * Domains
         */
        // All domains
        Route::get('/', [DomainController::class, 'index'])->name('index');
        // Create domain
        Route::get('/create', [DomainController::class, 'create']);
        Route::post('/store', [DomainController::class, 'store'])->name('domains.store');
        // Edit domain
        Route::get('/{domain}/edit', [DomainController::class, 'edit']);
        Route::post('{domain}/update', [DomainController::class, 'update'])->name('domains.update');
        // Delete domain
        Route::get('{domain}/delete', [DomainController::class, 'destroy'])->name('domains.destroy');

        /**
         * Records
         */
        // All records
        Route::get('/records', [RecordController::class, 'index'])->name('records');
        // Records for given domain
        Route::get(
            'records?domain={id}', function (Record $id) {
                return view('records', ['records' => Record::showForDomain($id),]);
            }
        );
        // Create record
        Route::get('/create_record', [RecordController::class, 'create']);
        Route::post('/store_record', [RecordController::class, 'store'])->name('records.store');
        // Edit record
        Route::get('/{record}/edit_record', [RecordController::class, 'edit']);
        Route::post('{record}/update_record', [RecordController::class, 'update'])->name('records.update');
        // Delete record
        Route::get('{record}/delete_record', [RecordController::class, 'destroy'])->name('records.destroy');

        /**
         * Profile
         */
        // Edit
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Update
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Delete
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    }
);

Route::get(
    'language/{locale}', function ($locale) {

    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
}
);

require __DIR__ . '/auth.php';


