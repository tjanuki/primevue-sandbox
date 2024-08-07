<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard')->with('notification', [
            'type' => 'success',
            'message' => 'Welcome to the dashboard!'
        ]);
    })->name('dashboard');

    Route::get('/toast', function () {
        return Inertia::render('Toast');
    })->name('toast');

    Route::get('/modal', function () {
        return Inertia::render('Modal');
    })->name('modal');

    Route::get('/form', function () {
        return Inertia::render('Form');
    })->name('form');

    Route::get('/upload', function () {
        return Inertia::render('Upload');
    })->name('upload');

    Route::get('/tabs', function () {
        return Inertia::render('Tabs');
    })->name('tabs');

    Route::get('/datatables', function () {
        return Inertia::render('DataTables');
    })->name('datatables');

    Route::get('/reorders', function () {
        return Inertia::render('Reorders');
    })->name('reorders');

    Route::get('/scroll-panels', function () {
        return Inertia::render('ScrollPanels');
    })->name('scroll-panels');

    Route::get('/menus', function () {
        return Inertia::render('Menus');
    })->name('menus');

    Route::get('/org-charts', function () {
        return Inertia::render('OrgCharts');
    })->name('org-charts');

    Route::get('/carousel', function () {
        return Inertia::render('Carousel');
    })->name('carousel');
});
