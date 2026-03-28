<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard.index');
})->name('dashboard');

Route::get('/profile', function () {
    return view('admin.profile');
});

Route::get('/analytics', function () {
    return view('admin.analytics.index');
})->name('analytics.index');


Route::get('/index', function () {
    return view('admin.auth.index');
});

Route::get('/forgot', function () {
    return view('admin.auth.forgot');
})->name('forgot');

Route::get('/forgot-sent', function () {
    return view('admin.auth.forgot-sent');
});

Route::get('/reset-success', function () {
    return view('admin.auth.reset-success');
});

Route::get('/reset', function () {
    return view('admin.auth.reset');
});

Route::get('/passenger-management', function () {
    return view('admin.passenger.index');
})->name('passenger.management');

Route::get('/passenger-management/detail', function () {
    return view('admin.passenger.detail');
})->name('passenger.detail');

Route::get('/booking-management', function () {
    return view('admin.booking.index');
})->name('booking.management');

Route::get('/reviews-ratings', function () {
    return view('admin.reviews.index');
})->name('reviews.ratings');

Route::get('/drivers-payouts', function () {
    return view('admin.payouts.index');
})->name('payouts.drivers');

Route::get('/commission-management', function () {
    return view('admin.commission.index');
})->name('commission.index');

Route::get('/fare-management', function () {
    return view('admin.fare.index');
})->name('fare.management');

// Support Tickets
Route::group(['prefix' => 'support-tickets', 'as' => 'support.'], function () {
    Route::get('/', function () {
        return view('admin.support.complaints.index');
    })->name('complaints.index');

    Route::get('/{id}', function ($id) {
        return view('admin.support.complaints.detail', ['id' => $id]);
    })->name('complaints.detail');
});

Route::get('/alerts', function () {
    return view('admin.alerts.index');
})->name('alerts.index');

Route::get('/alerts/send', function () {
    return view('admin.alerts.send');
})->name('alerts.send');

Route::get('/cms-management', function () {
    return view('admin.cms.index');
})->name('cms.index');

Route::get('/admin-roles', function () {
    return view('admin.roles.index');
})->name('admin.roles.index');

Route::get('/admin-roles/create', function () {
    return view('admin.roles.create');
})->name('admin.roles.create');

Route::group(['prefix' => 'driver-management'], function () {
    Route::get('/directory', function () {
        return view('admin.drivers.directory');
    })->name('drivers.directory');
    Route::get('/requests', function () {
        return view('admin.drivers.requests');
    })->name('drivers.requests');
    Route::get('/view/{id}', function ($id) {
        return view('admin.drivers.view', ['id' => $id]);
    })->name('drivers.view');

    Route::get('/active/view/{id}', function ($id) {
        return view('admin.drivers.active_view', ['id' => $id]);
    })->name('drivers.active.view');
});

Route::get('/promo-management', function () {
    return view('admin.promo.index');
})->name('promo.index');

Route::get('/promo-management/detail', function () {
    return view('admin.promo.detail');
})->name('promo.detail');




