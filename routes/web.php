<?php

declare(strict_types = 1);

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\LanguageController;
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
    static function () {

        /**
         * Domains
         */
        // All domains
        Route::get('/', [DomainController::class, 'index'])->name('index');
        // Create domain
        Route::get('/domain_create', [DomainController::class, 'create']);
        Route::post('/domain_store', [DomainController::class, 'store'])->name('domains.store');
        // Edit domain
        Route::get('{domain}/domain_edit', [DomainController::class, 'edit']);
        Route::post('{domain}/domain_update', [DomainController::class, 'update'])->name('domains.update');
        // Delete domain
        Route::get('{domain}/domain_delete', [DomainController::class, 'destroy'])->name('domains.destroy');

        /**
         * Records
         */
        // All records
        Route::get('/records', [RecordController::class, 'index'])->name('records');
        // Records for given domain
        Route::get(
            'records?domain={id}', static function (Record $id) {

            return view('records', ['records' => Record::showForDomain($id),]);
        }
        );
        // Create record
        Route::get('/record_create', [RecordController::class, 'create']);
        Route::post('/record_store', [RecordController::class, 'store'])->name('records.store');
        // Edit record
        Route::get('{record}/record_edit', [RecordController::class, 'edit']);
        Route::post('{record}/record_update', [RecordController::class, 'update'])->name('records.update');
        // Delete record
        Route::get('{record}/record_delete', [RecordController::class, 'destroy'])->name('records.destroy');

        /**
         * Profile
         */
        // Edit
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Update
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Delete
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        /**
         * Administration
         */
        Route::get('/pm-admin', [AdminController::class, 'index'])->name('adminboard');
        Route::get('/pm-admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/pm-admin/options', [AdminController::class, 'options'])->name('admin.options');
    }
);

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

require __DIR__ . '/auth.php';


