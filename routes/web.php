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

    Route::get('/crop', function () {
        return Inertia::render('Crop');
    })->name('crop');

    Route::get('/tabs', function () {
        return Inertia::render('Tabs');
    })->name('tabs');

    Route::get('/datatables', function () {
        return Inertia::render('DataTables');
    })->name('datatables');

    Route::get('/tree-tables', function () {
        return Inertia::render('TreeTables');
    })->name('tree-tables');

    Route::get('/data-views', function () {
        return Inertia::render('DataViews');
    })->name('data-views');

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

    Route::get('/diagrams', function () {
        return Inertia::render('Diagrams');
    })->name('diagrams');

    Route::get('/diagram-panels', function () {
        return Inertia::render('DiagramPanels');
    })->name('diagram-panels');

    Route::get('/timelines', function () {
        return Inertia::render('Timelines');
    })->name('timelines');

    Route::get('/carousel', function () {
        return Inertia::render('Carousel');
    })->name('carousel');

    Route::get('/menu-buttons', function () {
        return Inertia::render('MenuButtons');
    })->name('menu-buttons');

    Route::get('/steppers', function () {
        return Inertia::render('Steppers');
    })->name('steppers');

    Route::get('/checkbox-groups', function () {
        return Inertia::render('CheckboxGroups');
    })->name('checkbox-groups');
});
