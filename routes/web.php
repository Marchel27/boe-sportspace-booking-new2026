    <?php

    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\BookingController;
    use App\Http\Controllers\AdminsController;
    use App\Http\Controllers\LapanganController;
    use App\Http\Controllers\AdminDashboardController;
    use App\Http\Controllers\RiwayatController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\KontrolJadwalController;


    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/admin/login', [AdminsController::class, 'login'])->name('admin.login');

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/about', function () {
        return Redirect::route('/#about');
    })->name('about');

    Route::get('/#booking', function () {
        return redirect('/')->with('scrollToBooking', true);
    })->name('scrollBooking');

    Route::get('/contact', function () {
        return Redirect::route('/#contact');
    })->name('contact');

    // Bagian Admin
    Route::get('/admin/formLogin', function () {
        return view('admin.formLogin');
    })->name('formLogin');

    Route::get('/admin/dashboard/master', [DashboardController::class, 'index'])
        ->name('dashboardMaster');

    Route::get('/admin/dashboard/layouts/sidebar', function () {
        return view('admin.dashboard.layouts.sidebar');
    })->name('dashboardSidebar');


    Route::get('/admin/dashboard/edit/editDataLapangan', function () {
        return view('admin.dashboard.edit.edit_data_lapangan');
    })->name('dashboardEditDataLapangan');

    Route::get('/admin/dashboard/dataTransaksi', [RiwayatController::class, 'index'])
        ->name('dashboardDataTransaksi');

    Route::get('/admin/dashboard/historyBooking', [BookingController::class, 'history'])
        ->name('dashboardHistoryBooking');

    Route::get('/admin/dashboard/search/searchBar', function () {
        return view('admin.dashboard.search.searchBar');
    })->name('dashboardSearchBar');

    Route::get('/admin/dashboard/create/createLapangan', function () {
        return view('admin.dashboard.create.createLapangan');
    })->name('dashboardCreateLapangan');


    Route::get('/admin/dashboard/detail/detailPenyewa', function () {
        return view('admin.dashboard.detail.detailPenyewa');
    })->name('dashboardDetailPenyewa');

    // management
    Route::get('/admin/dashboard/management/add_new_admin', function () {
        return view('admin.dashboard.management.add_new_admin');
    })->name('dashboardAddNewAdmin');

    Route::get(
        '/admin/dashboard/management/admin_active_control',
        [AdminsController::class, 'adminActiveControl']
    );

    Route::get('/admin/dashboard/management/manage_admin_control', function () {
        return view('admin.dashboard.management.manage_admin_control');
    })->name('dashboardManageAdminControl');

    Route::post('/admin/store', [AdminsController::class, 'store'])->name('admin.store');

    Route::get(
        '/admin/dashboard/management/view_admin/{id_log}',
        [AdminsController::class, 'view']
    )->name('admin.view');

    Route::get(
        '/admin/dashboard/management',
        [AdminsController::class, 'index']
    )->name('admin.management');

    Route::post(
        '/admin/lapangan/store',
        [LapanganController::class, 'store']
    )->name('lapangan.store');

    Route::get('/admin/dashboard/dataLapangan', [LapanganController::class, 'index'])
        ->name('lapangan.index');

    Route::delete('/admin/dashboard/lapangan/{id}', [LapanganController::class, 'destroy'])->name('lapangan.destroy');

    Route::get('/formBooking', [BookingController::class, 'index'])
        ->name('formBooking');

    Route::get('/login', function () {
        return view('admin.formLogin'); // sesuaikan dengan view login admin kamu
    })->name('login');

    Route::get('/status-tanggal', [BookingController::class, 'statusTanggal']);

    Route::get('/admin/dashboard/dataPenyewa', [AdminDashboardController::class, 'dataPenyewa'])->name('admin.dataPenyewa');
    Route::get('/admin/dashboard/detail/{id_pey}', [AdminDashboardController::class, 'detailPenyewa'])->name('admin.detailPenyewa');

    Route::delete('/admin/penyewa/{id}', [AdminDashboardController::class, 'hapusPenyewa'])
        ->name('admin.hapusPenyewa');

    Route::get(
        '/admin/dashboard/jadwalBooking',
        [BookingController::class, 'dataBooking']
    )->name('dashboardJadwalBooking');

    Route::post('/admin/booking/{id}/approve', [BookingController::class, 'approve']);
    Route::delete('/admin/booking/{id}/reject', [BookingController::class, 'reject']);

    Route::get('/booking/sesi-terpakai', [BookingController::class, 'sesiTerpakai']);

    Route::get(
        '/admin/dashboard/detail/detailBooking/{id_bok}',
        [BookingController::class, 'detail']
    )->name('booking.detail');

    Route::delete('/admin/booking/bulk-delete', [BookingController::class, 'bulkDelete']);

    Route::delete('/admin/booking/{id}', [BookingController::class, 'destroy'])
        ->name('booking.destroy');

    Route::get(
        '/admin/dashboard/edit/{id_lap}',
        [LapanganController::class, 'edit']
    )->name('lapangan.edit');

    Route::put('/admin/dashboard/edit/{id_lap}', [LapanganController::class, 'update'])
        ->name('lapangan.update');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('riwayat', RiwayatController::class);
    });

    Route::delete('/admin/riwayat/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');
    Route::delete('/admin/riwayat/bulk-delete', [RiwayatController::class, 'bulkDelete'])->name('riwayat.bulkDelete');

    Route::get('/', [HomeController::class, 'index']);

    Route::get('/booking/tanggal-status', [BookingController::class, 'tanggalStatus']);

    Route::get('/schedule_booking', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule.index');

    // Hapus kata 'Admin' karena file ada di folder Controllers utama
    Route::get('/admin/dashboard/kontrolJadwal', [KontrolJadwalController::class, 'index'])->name('admin.dashboard.kontrolJadwal');

    Route::post('/admin/block-jadwal',[KontrolJadwalController::class,'block'])->name('admin.block');

    Route::get('/admin/kontrol-jadwal/cek-sesi', [KontrolJadwalController::class, 'cekSesiTerpakai'])->name('admin.cekSesi');
