<?php

use App\Http\Controllers\WebhookGroupController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    /**
     * Home
     */
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /**
     * Webhook Groups
     */
    Route::get('/webhook/groups', [WebhookGroupController::class, 'index'])->name('webhook.groups');
    Route::post('/webhook/groups/page', [WebhookGroupController::class, 'page'])->name('webhook.groups.page');
    Route::post('/webhook/group/create', [WebhookGroupController::class, 'create'])->name('webhook.group.create');
    Route::get('/webhook/group/read', [WebhookGroupController::class, 'read'])->name('webhook.group.read');
    Route::post('/webhook/group/edit', [WebhookGroupController::class, 'edit'])->name('webhook.group.edit');

    /**
     * Webhook
     */
    Route::get('/webhooks', [WebhookGroupController::class, 'index'])->name('webhooks');
    Route::post('/webhooks/page', [WebhookGroupController::class, 'page'])->name('webhooks.page');
    Route::post('/webhook/create', [WebhookGroupController::class, 'create'])->name('webhook.create');
    Route::get('/webhook/read', [WebhookGroupController::class, 'read'])->name('webhook.read');
    Route::post('/webhook/edit', [WebhookGroupController::class, 'edit'])->name('webhook.edit');
});
