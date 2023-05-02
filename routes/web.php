<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\Applied_jobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [JobController::class, 'show_jobs'])->name('show_jobs');
Route::get('/info-loker', [JobController::class, 'jobs_search'])->name('jobs_search');
Route::get('/job-detail/{job}', [JobController::class, 'job_detail'])->name('job_detail');
Route::get('/search', [JobController::class, 'search'])->name('search');
Route::get('/profile', [UserController::class, 'profile'])->name('show_profile');
Route::get('/apply-job/{job}', [ApplicantController::class, 'apply_job'])->name('apply_job');
Route::patch('/apply-job/{job}', [ApplicantController::class, 'store_apply'])->name('store_apply');
Route::get('/tentang-kami', [JobController::class, 'about_us'])->name('about_us');

Route::middleware(['auth'])->group(function () {
    Route::delete('/dashboard/delete_applicant/{applied_job}', [ApplicantController::class, 'delete'])->name('delete_applicant');
    Route::patch('/profile/edit', [UserController::class, 'edit_profile'])->name('store_profile');
    Route::post('/profile/delete', [UserController::class, 'delete_profile'])->name('delete_profile');
    Route::get('/dashboard', [Applied_jobController::class, 'show_applied'])->name('show_applicant');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/create-jobs', [JobController::class, 'create'])->name('create_job');
    Route::post('/create-jobs', [JobController::class, 'store'])->name('store_job');
    Route::post('/edit-job/{job}', [JobController::class, 'update_job'])->name('update_job');
    Route::delete('/delete-job/{job}', [JobController::class, 'delete_job'])->name('delete_job');
});