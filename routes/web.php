<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/formBooking', function () {
    return view('formBooking');
})->name('formBooking');

Route::get('/schedule_booking', function () {
    return view('schedule_booking');
})->name('schedule_booking');

Route::get('/about', function () {
    return Redirect::route('/#about');
})->name('about');

Route::get('/booking', function () {
    return Redirect::route('/#booking');
})->name('booking');

Route::get('/contact', function () {
    return Redirect::route('/#contact');
})->name('contact');

// Bagian Admin
Route::get('/admin/formLogin', function () {
    return view('admin.formLogin');
})->name('formLogin');

Route::get('/admin/dashboard/master', function () {
    return view('admin.dashboard.master');
})->name('dashboardMaster');

Route::get('/admin/dashboard/layouts/sidebar', function () {
    return view('admin.dashboard.layouts.sidebar');
})->name('dashboardSidebar');

Route::get('/admin/dashboard/dataLapangan', function () {
    return view('admin.dashboard.dataLapangan');
})->name('dashboardDataLapangan');

Route::get('/admin/dashboard/edit/editDataLapangan', function () {
    return view('admin.dashboard.edit.edit_data_lapangan');
})->name('dashboardEditDataLapangan');

Route::get('/admin/dashboard/jadwalBooking', function () {
    return view('admin.dashboard.jadwalBooking');
})->name('dashboardJadwalBooking');

Route::get('/admin/dashboard/dataPenyewa', function () {
    return view('admin.dashboard.dataPenyewa');
})->name('dashboardDataPenyewa');

Route::get('/admin/dashboard/dataTransaksi', function () {
    return view('admin.dashboard.dataTransaksi');
})->name('dashboardDataTransaksi');

Route::get('/admin/dashboard/historyBooking', function () {
    return view('admin.dashboard.historyBooking');
})->name('dashboardHistoryBooking');

Route::get('/admin/dashboard/search/searchBar', function () {
    return view('admin.dashboard.search.searchBar');
})->name('dashboardSearchBar');

Route::get('/admin/dashboard/create/createLapangan', function () {
    return view('admin.dashboard.create.createLapangan');
})->name('dashboardCreateLapangan');

Route::get('/admin/dashboard/detail/detailBooking', function () {
    return view('admin.dashboard.detail.detailBooking');
})->name('dashboardDetailBooking');

Route::get('/admin/dashboard/detail/detailPenyewa', function () {
    return view('admin.dashboard.detail.detailPenyewa');
})->name('dashboardDetailPenyewa');

// management
Route::get('/admin/dashboard/management/add_new_admin', function () {
    return view('admin.dashboard.management.add_new_admin');
})->name('dashboardAddNewAdmin');

Route::get('/admin/dashboard/management/admin_active_control', function () {
    return view('admin.dashboard.management.admin_active_control');
})->name('dashboardAdminActiveControl');

Route::get('/admin/dashboard/management/manage_admin_control', function () {
    return view('admin.dashboard.management.manage_admin_control');
})->name('dashboardManageAdminControl');