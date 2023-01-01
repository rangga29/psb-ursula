<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GeneralController;
use App\Http\Controllers\Dashboard\SdAdminAdministrationController;
use App\Http\Controllers\Dashboard\SdAdminDapodikController;
use App\Http\Controllers\Dashboard\SdAdminRegistrationController;
use App\Http\Controllers\Dashboard\SdAdminUniformBookController;
use App\Http\Controllers\Dashboard\SdStudentController;
use App\Http\Controllers\Dashboard\SmpAdminAdministrationController;
use App\Http\Controllers\Dashboard\SmpAdminDapodikController;
use App\Http\Controllers\Dashboard\SmpAdminRegistrationController;
use App\Http\Controllers\Dashboard\SmpAdminUniformBookController;
use App\Http\Controllers\Dashboard\SmpStudentController;
use App\Http\Controllers\Dashboard\TbtkAdminAdministrationController;
use App\Http\Controllers\Dashboard\TbtkAdminDapodikController;
use App\Http\Controllers\Dashboard\TbtkAdminRegistrationController;
use App\Http\Controllers\Dashboard\TbtkAdminUniformBookController;
use App\Http\Controllers\Dashboard\TbtkStudentController;
use App\Http\Controllers\Dashboard\YearController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SdRegistrationController;
use App\Http\Controllers\SmpRegistrationController;
use App\Http\Controllers\TbtkRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/kirim-pesan', [HomeController::class, 'sendMail'])->name('home.sendMail');

Route::get('/tbtk/pendaftaran', [TbtkRegistrationController::class, 'index'])->name('tbtk.registration.index');
Route::get('/tbtk/pendaftaran/form', [TbtkRegistrationController::class, 'form'])->name('tbtk.registration.form');
Route::post('/tbtk/pendaftaran/form', [TbtkRegistrationController::class, 'store'])->name('tbtk.registration.store');
Route::get('/tbtk/pendaftaran/finish', [TbtkRegistrationController::class, 'finish'])->name('tbtk.registration.finish');

Route::get('/sd/pendaftaran/internal', [SdRegistrationController::class, 'internal'])->name('sd.registration.internal');
Route::get('/sd/pendaftaran/internal/form', [SdRegistrationController::class, 'internalForm'])->name('sd.registration.internalForm');
Route::post('/sd/pendaftaran/internal/form', [SdRegistrationController::class, 'internalStore'])->name('sd.registration.internalStore');
Route::get('/sd/pendaftaran/external', [SdRegistrationController::class, 'external'])->name('sd.registration.external');
Route::get('/sd/pendaftaran/external/form', [SdRegistrationController::class, 'externalForm'])->name('sd.registration.externalForm');
Route::post('/sd/pendaftaran/external/form', [SdRegistrationController::class, 'externalStore'])->name('sd.registration.externalStore');
Route::get('/sd/pendaftaran/finish', [SdRegistrationController::class, 'finish'])->name('sd.registration.finish');

Route::get('/smp/pendaftaran/internal', [SmpRegistrationController::class, 'internal'])->name('smp.registration.internal');
Route::get('/smp/pendaftaran/internal/form', [SmpRegistrationController::class, 'internalForm'])->name('smp.registration.internalForm');
Route::post('/smp/pendaftaran/internal/form', [SmpRegistrationController::class, 'internalStore'])->name('smp.registration.internalStore');
Route::get('/smp/pendaftaran/external', [SmpRegistrationController::class, 'external'])->name('smp.registration.external');
Route::get('/smp/pendaftaran/external/form', [SmpRegistrationController::class, 'externalForm'])->name('smp.registration.externalForm');
Route::post('/smp/pendaftaran/external/form', [SmpRegistrationController::class, 'externalStore'])->name('smp.registration.externalStore');
Route::get('/smp/pendaftaran/finish', [SmpRegistrationController::class, 'finish'])->name('smp.registration.finish');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/general-setting/main', [GeneralController::class, 'index'])->name('general.index');
    Route::put('/general-setting/main/page-setting', [GeneralController::class, 'pageSettingStore'])->name('general.main.page-setting');
    Route::put('/general-setting/main/psb-setting', [GeneralController::class, 'psbSettingStore'])->name('general.main.psb-setting');
    Route::get('/general-setting/year/change-main-year/{year}', [YearController::class, 'changeMainYear'])->name('general.year.change-main-year');
    Route::resource('/general-setting/year', YearController::class, [
        'names' => [
            'index' => 'general.year.index',
            'create' => 'general.year.create',
            'store' => 'general.year.store',
            'edit' => 'general.year.edit',
            'update' => 'general.year.update',
            'destroy' => 'general.year.destroy'
        ]
    ])->except('show');

    Route::prefix('tbtk')->name('tbtk.')->group(function () {
        Route::prefix('student')->name('student.')->group(function () {
            Route::get('/data-pendaftaran', [TbtkStudentController::class, 'index'])->name('registration.index');
            Route::get('/data-dapodik', [TbtkStudentController::class, 'dapodik'])->name('dapodik.index');
            Route::get('/data-dapodik/pribadi', [TbtkStudentController::class, 'dapodikPribadi'])->name('dapodik.pribadi');
            Route::post('/data-dapodik/pribadi', [TbtkStudentController::class, 'dapodikPribadiStore'])->name('dapodik.pribadi.store');
            Route::get('/data-dapodik/kependudukan', [TbtkStudentController::class, 'dapodikKependudukan'])->name('dapodik.kependudukan');
            Route::post('/data-dapodik/kependudukan', [TbtkStudentController::class, 'dapodikKependudukanStore'])->name('dapodik.kependudukan.store');
            Route::get('/data-dapodik/ayah', [TbtkStudentController::class, 'dapodikAyah'])->name('dapodik.ayah');
            Route::post('/data-dapodik/ayah', [TbtkStudentController::class, 'dapodikAyahStore'])->name('dapodik.ayah.store');
            Route::get('/data-dapodik/ibu', [TbtkStudentController::class, 'dapodikIbu'])->name('dapodik.ibu');
            Route::post('/data-dapodik/ibu', [TbtkStudentController::class, 'dapodikIbuStore'])->name('dapodik.ibu.store');
            Route::get('/data-dapodik/wali', [TbtkStudentController::class, 'dapodikWali'])->name('dapodik.wali');
            Route::post('/data-dapodik/wali', [TbtkStudentController::class, 'dapodikWaliStore'])->name('dapodik.wali.store');
            Route::get('/data-administrasi', [TbtkStudentController::class, 'administration'])->name('administration.index');
        });

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/data-pendaftaran', [TbtkAdminRegistrationController::class, 'index'])->name('registration.index');
            Route::get('/data-pendaftaran/detail/{tbtk_registration}', [TbtkAdminRegistrationController::class, 'show'])->name('registration.show');
            Route::get('/data-pendaftaran/edit/{tbtk_registration}', [TbtkAdminRegistrationController::class, 'edit'])->name('registration.edit');
            Route::put('/data-pendaftaran/edit/{tbtk_registration}', [TbtkAdminRegistrationController::class, 'update'])->name('registration.update');
            Route::delete('/data-pendaftaran/detail/{tbtk_registration}', [TbtkAdminRegistrationController::class, 'destroy'])->name('registration.destroy');
            Route::get('/data-pendaftaran/deleted-data', [TbtkAdminRegistrationController::class, 'deletedData'])->name('registration.deleted-data');
            Route::get('/data-pendaftaran/deleted-data/restore/{code}', [TbtkAdminRegistrationController::class, 'restore'])->name('registration.restore');
            Route::get('/data-pendaftaran/download-pdf/{tbtk_registration}', [TbtkAdminRegistrationController::class, 'singlePdfReport'])->name('registration.download-pdf');
            Route::get('/data-pendaftaran/reports', [TbtkAdminRegistrationController::class, 'reports'])->name('registration.reports');
            Route::post('/data-pendaftaran/reports/allExcelReport', [TbtkAdminRegistrationController::class, 'allExcelReport'])->name('registration.reports.all-excel');
            Route::post('/data-pendaftaran/reports/allPdfReport', [TbtkAdminRegistrationController::class, 'allPdfReport'])->name('registration.reports.all-pdf');
            Route::post('/data-pendaftaran/reports/separateExcelReport', [TbtkAdminRegistrationController::class, 'separateExcelReport'])->name('registration.reports.separate-excel');
            Route::post('/data-pendaftaran/reports/separatePdfReport', [TbtkAdminRegistrationController::class, 'separatePdfReport'])->name('registration.reports.separate-pdf');
            Route::get('/data-pendaftaran/registration-verification/{tbtk_registration}/{code}', [TbtkAdminRegistrationController::class, 'registrationVerification'])->name('registration.registration-verification');
            Route::get('/data-pendaftaran/selection-verification/{tbtk_registration}/{code}', [TbtkAdminRegistrationController::class, 'selectionVerification'])->name('registration.selection-verification');
            Route::get('/data-pendaftaran/approval-verification/{tbtk_registration}/{code}', [TbtkAdminRegistrationController::class, 'approvalVerification'])->name('registration.approval-verification');

            Route::get('/data-dapodik', [TbtkAdminDapodikController::class, 'index'])->name('dapodik.index');
            Route::get('/data-dapodik/detail/{tbtk_registration}', [TbtkAdminDapodikController::class, 'show'])->name('dapodik.show');
            Route::get('/data-dapodik/edit/data-pribadi/{tbtk_registration}', [TbtkAdminDapodikController::class, 'editDataPribadi'])->name('dapodik.editDataPribadi');
            Route::put('/data-dapodik/edit/data-pribadi/{tbtk_registration}', [TbtkAdminDapodikController::class, 'updateDataPribadi'])->name('dapodik.updateDataPribadi');
            Route::get('/data-dapodik/edit/data-kependudukan/{tbtk_registration}', [TbtkAdminDapodikController::class, 'editDataKependudukan'])->name('dapodik.editDataKependudukan');
            Route::put('/data-dapodik/edit/data-kependudukan/{tbtk_registration}', [TbtkAdminDapodikController::class, 'updateDataKependudukan'])->name('dapodik.updateDataKependudukan');
            Route::get('/data-dapodik/edit/data-ayah/{tbtk_registration}', [TbtkAdminDapodikController::class, 'editDataAyah'])->name('dapodik.editDataAyah');
            Route::put('/data-dapodik/edit/data-ayah/{tbtk_registration}', [TbtkAdminDapodikController::class, 'updateDataAyah'])->name('dapodik.updateDataAyah');
            Route::get('/data-dapodik/edit/data-ibu/{tbtk_registration}', [TbtkAdminDapodikController::class, 'editDataIbu'])->name('dapodik.editDataIbu');
            Route::put('/data-dapodik/edit/data-ibu/{tbtk_registration}', [TbtkAdminDapodikController::class, 'updateDataIbu'])->name('dapodik.updateDataIbu');
            Route::get('/data-dapodik/edit/data-wali/{tbtk_registration}', [TbtkAdminDapodikController::class, 'editDataWali'])->name('dapodik.editDataWali');
            Route::put('/data-dapodik/edit/data-wali/{tbtk_registration}', [TbtkAdminDapodikController::class, 'updateDataWali'])->name('dapodik.updateDataWali');
            Route::get('/data-dapodik/download-pdf/{tbtk_registration}', [TbtkAdminDapodikController::class, 'singlePdfReport'])->name('dapodik.download-pdf');
            Route::get('/data-dapodik/dapodik-verification/{tbtk_registration}/{code}', [TbtkAdminDapodikController::class, 'dapodikVerification'])->name('dapodik.dapodik-verification');

            Route::get('/data-administrasi', [TbtkAdminAdministrationController::class, 'index'])->name('administration.index');
            Route::get('/data-administrasi/aggrement-verification/{tbtk_registration}/{code}', [TbtkAdminAdministrationController::class, 'aggrementVerification'])->name('administration.aggrement-verification');
            Route::get('/data-administrasi/payment-verification/{tbtk_registration}/{code}', [TbtkAdminAdministrationController::class, 'paymentVerification'])->name('administration.payment-verification');

            Route::get('/data-pembelajaran', [TbtkAdminUniformBookController::class, 'index'])->name('uniform-book.index');
            Route::get('/data-pembelajaran/uniform-verification/{tbtk_registration}/{code}', [TbtkAdminUniformBookController::class, 'uniformVerification'])->name('uniform-book.uniform-verification');
            Route::get('/data-pembelajaran/book-verification/{tbtk_registration}/{code}', [TbtkAdminUniformBookController::class, 'bookVerification'])->name('uniform-book.book-verification');
        });
    });

    Route::prefix('sd')->name('sd.')->group(function () {
        Route::prefix('student')->name('student.')->group(function () {
            Route::get('/data-pendaftaran', [SdStudentController::class, 'index'])->name('registration.index');
            Route::get('/data-dapodik', [SdStudentController::class, 'dapodik'])->name('dapodik.index');
            Route::get('/data-dapodik/pribadi', [SdStudentController::class, 'dapodikPribadi'])->name('dapodik.pribadi');
            Route::post('/data-dapodik/pribadi', [SdStudentController::class, 'dapodikPribadiStore'])->name('dapodik.pribadi.store');
            Route::get('/data-dapodik/kependudukan', [SdStudentController::class, 'dapodikKependudukan'])->name('dapodik.kependudukan');
            Route::post('/data-dapodik/kependudukan', [SdStudentController::class, 'dapodikKependudukanStore'])->name('dapodik.kependudukan.store');
            Route::get('/data-dapodik/ayah', [SdStudentController::class, 'dapodikAyah'])->name('dapodik.ayah');
            Route::post('/data-dapodik/ayah', [SdStudentController::class, 'dapodikAyahStore'])->name('dapodik.ayah.store');
            Route::get('/data-dapodik/ibu', [SdStudentController::class, 'dapodikIbu'])->name('dapodik.ibu');
            Route::post('/data-dapodik/ibu', [SdStudentController::class, 'dapodikIbuStore'])->name('dapodik.ibu.store');
            Route::get('/data-dapodik/wali', [SdStudentController::class, 'dapodikWali'])->name('dapodik.wali');
            Route::post('/data-dapodik/wali', [SdStudentController::class, 'dapodikWaliStore'])->name('dapodik.wali.store');
            Route::get('/data-administrasi', [SdStudentController::class, 'administration'])->name('administration.index');
        });

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/data-pendaftaran/internal', [SdAdminRegistrationController::class, 'internal'])->name('registration.internal');
            Route::get('/data-pendaftaran/external', [SdAdminRegistrationController::class, 'external'])->name('registration.external');
            Route::get('/data-pendaftaran/detail/{sd_registration}', [SdAdminRegistrationController::class, 'show'])->name('registration.show');
            Route::get('/data-pendaftaran/edit/{sd_registration}', [SdAdminRegistrationController::class, 'edit'])->name('registration.edit');
            Route::put('/data-pendaftaran/edit/{sd_registration}', [SdAdminRegistrationController::class, 'update'])->name('registration.update');
            Route::delete('/data-pendaftaran/detail/{sd_registration}', [SdAdminRegistrationController::class, 'destroy'])->name('registration.destroy');
            Route::get('/data-pendaftaran/deleted-data', [SdAdminRegistrationController::class, 'deletedData'])->name('registration.deleted-data');
            Route::get('/data-pendaftaran/deleted-data/restore/{code}', [SdAdminRegistrationController::class, 'restore'])->name('registration.restore');
            Route::get('/data-pendaftaran/download-pdf/{sd_registration}', [SdAdminRegistrationController::class, 'singlePdfReport'])->name('registration.download-pdf');
            Route::get('/data-pendaftaran/reports', [SdAdminRegistrationController::class, 'reports'])->name('registration.reports');
            Route::post('/data-pendaftaran/reports/allExcelReport', [SdAdminRegistrationController::class, 'allExcelReport'])->name('registration.reports.all-excel');
            Route::post('/data-pendaftaran/reports/allPdfReport', [SdAdminRegistrationController::class, 'allPdfReport'])->name('registration.reports.all-pdf');
            Route::post('/data-pendaftaran/reports/separateExcelReport', [SdAdminRegistrationController::class, 'separateExcelReport'])->name('registration.reports.separate-excel');
            Route::post('/data-pendaftaran/reports/separatePdfReport', [SdAdminRegistrationController::class, 'separatePdfReport'])->name('registration.reports.separate-pdf');
            Route::get('/data-pendaftaran/registration-verification/{sd_registration}/{code}', [SdAdminRegistrationController::class, 'registrationVerification'])->name('registration.registration-verification');
            Route::get('/data-pendaftaran/selection-verification/{sd_registration}/{code}', [SdAdminRegistrationController::class, 'selectionVerification'])->name('registration.selection-verification');
            Route::get('/data-pendaftaran/approval-verification/{sd_registration}/{code}', [SdAdminRegistrationController::class, 'approvalVerification'])->name('registration.approval-verification');

            Route::get('/data-dapodik', [SdAdminDapodikController::class, 'index'])->name('dapodik.index');
            Route::get('/data-dapodik/detail/{sd_registration}', [SdAdminDapodikController::class, 'show'])->name('dapodik.show');
            Route::get('/data-dapodik/edit/data-pribadi/{sd_registration}', [SdAdminDapodikController::class, 'editDataPribadi'])->name('dapodik.editDataPribadi');
            Route::put('/data-dapodik/edit/data-pribadi/{sd_registration}', [SdAdminDapodikController::class, 'updateDataPribadi'])->name('dapodik.updateDataPribadi');
            Route::get('/data-dapodik/edit/data-kependudukan/{sd_registration}', [SdAdminDapodikController::class, 'editDataKependudukan'])->name('dapodik.editDataKependudukan');
            Route::put('/data-dapodik/edit/data-kependudukan/{sd_registration}', [SdAdminDapodikController::class, 'updateDataKependudukan'])->name('dapodik.updateDataKependudukan');
            Route::get('/data-dapodik/edit/data-ayah/{sd_registration}', [SdAdminDapodikController::class, 'editDataAyah'])->name('dapodik.editDataAyah');
            Route::put('/data-dapodik/edit/data-ayah/{sd_registration}', [SdAdminDapodikController::class, 'updateDataAyah'])->name('dapodik.updateDataAyah');
            Route::get('/data-dapodik/edit/data-ibu/{sd_registration}', [SdAdminDapodikController::class, 'editDataIbu'])->name('dapodik.editDataIbu');
            Route::put('/data-dapodik/edit/data-ibu/{sd_registration}', [SdAdminDapodikController::class, 'updateDataIbu'])->name('dapodik.updateDataIbu');
            Route::get('/data-dapodik/edit/data-wali/{sd_registration}', [SdAdminDapodikController::class, 'editDataWali'])->name('dapodik.editDataWali');
            Route::put('/data-dapodik/edit/data-wali/{sd_registration}', [SdAdminDapodikController::class, 'updateDataWali'])->name('dapodik.updateDataWali');
            Route::get('/data-dapodik/download-pdf/{sd_registration}', [SdAdminDapodikController::class, 'singlePdfReport'])->name('dapodik.download-pdf');
            Route::get('/data-dapodik/dapodik-verification/{sd_registration}/{code}', [SdAdminDapodikController::class, 'dapodikVerification'])->name('dapodik.dapodik-verification');

            Route::get('/data-administrasi', [SdAdminAdministrationController::class, 'index'])->name('administration.index');
            Route::get('/data-administrasi/aggrement-verification/{sd_registration}/{code}', [SdAdminAdministrationController::class, 'aggrementVerification'])->name('administration.aggrement-verification');
            Route::get('/data-administrasi/payment-verification/{sd_registration}/{code}', [SdAdminAdministrationController::class, 'paymentVerification'])->name('administration.payment-verification');

            Route::get('/data-pembelajaran', [SdAdminUniformBookController::class, 'index'])->name('uniform-book.index');
            Route::get('/data-pembelajaran/uniform-verification/{sd_registration}/{code}', [SdAdminUniformBookController::class, 'uniformVerification'])->name('uniform-book.uniform-verification');
            Route::get('/data-pembelajaran/book-verification/{sd_registration}/{code}', [SdAdminUniformBookController::class, 'bookVerification'])->name('uniform-book.book-verification');
        });
    });

    Route::prefix('smp')->name('smp.')->group(function () {
        Route::prefix('student')->name('student.')->group(function () {
            Route::get('/data-pendaftaran', [SmpStudentController::class, 'index'])->name('registration.index');
            Route::get('/data-dapodik', [SmpStudentController::class, 'dapodik'])->name('dapodik.index');
            Route::get('/data-dapodik/pribadi', [SmpStudentController::class, 'dapodikPribadi'])->name('dapodik.pribadi');
            Route::post('/data-dapodik/pribadi', [SmpStudentController::class, 'dapodikPribadiStore'])->name('dapodik.pribadi.store');
            Route::get('/data-dapodik/kependudukan', [SmpStudentController::class, 'dapodikKependudukan'])->name('dapodik.kependudukan');
            Route::post('/data-dapodik/kependudukan', [SmpStudentController::class, 'dapodikKependudukanStore'])->name('dapodik.kependudukan.store');
            Route::get('/data-dapodik/ayah', [SmpStudentController::class, 'dapodikAyah'])->name('dapodik.ayah');
            Route::post('/data-dapodik/ayah', [SmpStudentController::class, 'dapodikAyahStore'])->name('dapodik.ayah.store');
            Route::get('/data-dapodik/ibu', [SmpStudentController::class, 'dapodikIbu'])->name('dapodik.ibu');
            Route::post('/data-dapodik/ibu', [SmpStudentController::class, 'dapodikIbuStore'])->name('dapodik.ibu.store');
            Route::get('/data-dapodik/wali', [SmpStudentController::class, 'dapodikWali'])->name('dapodik.wali');
            Route::post('/data-dapodik/wali', [SmpStudentController::class, 'dapodikWaliStore'])->name('dapodik.wali.store');
            Route::get('/data-administrasi', [SmpStudentController::class, 'administration'])->name('administration.index');
        });

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/data-pendaftaran/internal', [SmpAdminRegistrationController::class, 'internal'])->name('registration.internal');
            Route::get('/data-pendaftaran/external', [SmpAdminRegistrationController::class, 'external'])->name('registration.external');
            Route::get('/data-pendaftaran/detail/{smp_registration}', [SmpAdminRegistrationController::class, 'show'])->name('registration.show');
            Route::get('/data-pendaftaran/edit/{smp_registration}', [SmpAdminRegistrationController::class, 'edit'])->name('registration.edit');
            Route::put('/data-pendaftaran/edit/{smp_registration}', [SmpAdminRegistrationController::class, 'update'])->name('registration.update');
            Route::delete('/data-pendaftaran/detail/{smp_registration}', [SmpAdminRegistrationController::class, 'destroy'])->name('registration.destroy');
            Route::get('/data-pendaftaran/deleted-data', [SmpAdminRegistrationController::class, 'deletedData'])->name('registration.deleted-data');
            Route::get('/data-pendaftaran/deleted-data/restore/{code}', [SmpAdminRegistrationController::class, 'restore'])->name('registration.restore');
            Route::get('/data-pendaftaran/download-pdf/{smp_registration}', [SmpAdminRegistrationController::class, 'singlePdfReport'])->name('registration.download-pdf');
            Route::get('/data-pendaftaran/reports', [SmpAdminRegistrationController::class, 'reports'])->name('registration.reports');
            Route::post('/data-pendaftaran/reports/allExcelReport', [SmpAdminRegistrationController::class, 'allExcelReport'])->name('registration.reports.all-excel');
            Route::post('/data-pendaftaran/reports/allPdfReport', [SmpAdminRegistrationController::class, 'allPdfReport'])->name('registration.reports.all-pdf');
            Route::post('/data-pendaftaran/reports/separateExcelReport', [SmpAdminRegistrationController::class, 'separateExcelReport'])->name('registration.reports.separate-excel');
            Route::post('/data-pendaftaran/reports/separatePdfReport', [SmpAdminRegistrationController::class, 'separatePdfReport'])->name('registration.reports.separate-pdf');
            Route::get('/data-pendaftaran/registration-verification/{smp_registration}/{code}', [SmpAdminRegistrationController::class, 'registrationVerification'])->name('registration.registration-verification');
            Route::get('/data-pendaftaran/selection-verification/{smp_registration}/{code}', [SmpAdminRegistrationController::class, 'selectionVerification'])->name('registration.selection-verification');
            Route::get('/data-pendaftaran/approval-verification/{smp_registration}/{code}', [SmpAdminRegistrationController::class, 'approvalVerification'])->name('registration.approval-verification');

            Route::get('/data-dapodik', [SmpAdminDapodikController::class, 'index'])->name('dapodik.index');
            Route::get('/data-dapodik/detail/{smp_registration}', [SmpAdminDapodikController::class, 'show'])->name('dapodik.show');
            Route::get('/data-dapodik/edit/data-pribadi/{smp_registration}', [SmpAdminDapodikController::class, 'editDataPribadi'])->name('dapodik.editDataPribadi');
            Route::put('/data-dapodik/edit/data-pribadi/{smp_registration}', [SmpAdminDapodikController::class, 'updateDataPribadi'])->name('dapodik.updateDataPribadi');
            Route::get('/data-dapodik/edit/data-kependudukan/{smp_registration}', [SmpAdminDapodikController::class, 'editDataKependudukan'])->name('dapodik.editDataKependudukan');
            Route::put('/data-dapodik/edit/data-kependudukan/{smp_registration}', [SmpAdminDapodikController::class, 'updateDataKependudukan'])->name('dapodik.updateDataKependudukan');
            Route::get('/data-dapodik/edit/data-ayah/{smp_registration}', [SmpAdminDapodikController::class, 'editDataAyah'])->name('dapodik.editDataAyah');
            Route::put('/data-dapodik/edit/data-ayah/{smp_registration}', [SmpAdminDapodikController::class, 'updateDataAyah'])->name('dapodik.updateDataAyah');
            Route::get('/data-dapodik/edit/data-ibu/{smp_registration}', [SmpAdminDapodikController::class, 'editDataIbu'])->name('dapodik.editDataIbu');
            Route::put('/data-dapodik/edit/data-ibu/{smp_registration}', [SmpAdminDapodikController::class, 'updateDataIbu'])->name('dapodik.updateDataIbu');
            Route::get('/data-dapodik/edit/data-wali/{smp_registration}', [SmpAdminDapodikController::class, 'editDataWali'])->name('dapodik.editDataWali');
            Route::put('/data-dapodik/edit/data-wali/{smp_registration}', [SmpAdminDapodikController::class, 'updateDataWali'])->name('dapodik.updateDataWali');
            Route::get('/data-dapodik/download-pdf/{smp_registration}', [SmpAdminDapodikController::class, 'singlePdfReport'])->name('dapodik.download-pdf');
            Route::get('/data-dapodik/dapodik-verification/{smp_registration}/{code}', [SmpAdminDapodikController::class, 'dapodikVerification'])->name('dapodik.dapodik-verification');

            Route::get('/data-administrasi', [SmpAdminAdministrationController::class, 'index'])->name('administration.index');
            Route::get('/data-administrasi/aggrement-verification/{smp_registration}/{code}', [SmpAdminAdministrationController::class, 'aggrementVerification'])->name('administration.aggrement-verification');
            Route::get('/data-administrasi/payment-verification/{smp_registration}/{code}', [SmpAdminAdministrationController::class, 'paymentVerification'])->name('administration.payment-verification');

            Route::get('/data-pembelajaran', [SmpAdminUniformBookController::class, 'index'])->name('uniform-book.index');
            Route::get('/data-pembelajaran/uniform-verification/{smp_registration}/{code}', [SmpAdminUniformBookController::class, 'uniformVerification'])->name('uniform-book.uniform-verification');
            Route::get('/data-pembelajaran/book-verification/{smp_registration}/{code}', [SmpAdminUniformBookController::class, 'bookVerification'])->name('uniform-book.book-verification');
        });
    });
});

Route::get('/dashboard/login', [LoginController::class, 'login'])->name('login');
Route::post('/dashboard/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/dashboard/logout', [LoginController::class, 'logout'])->name('logout');
