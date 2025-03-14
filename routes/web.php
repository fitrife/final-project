<?php

use App\Models\Training;
use App\Models\TrainingCategories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\BnspController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InhouseController;
use App\Http\Controllers\KemnakerController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SoftskillController;
use App\Http\Controllers\DashboardAdController;
use App\Http\Controllers\DashboardAdsController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\DashboardBnspController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\DashboardPublicController;
use App\Http\Controllers\DashboardInhouseController;
use App\Http\Controllers\DashboardMessageController;
use App\Http\Controllers\TrainingCategoryController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardKemnakerController;
use App\Http\Controllers\DashboardScheduleController;
use App\Http\Controllers\DashboardTrainingController;
use App\Http\Controllers\DashboardSoftskillController;
use App\Http\Controllers\TrainingCategoriesController;
use App\Http\Controllers\DashboardRegistrantsController;
use App\Http\Controllers\DashboardBnspCertificationsController;
use App\Http\Controllers\DashboardKemnakerCertificationsController;
use App\Http\Controllers\DashboardSoftskillCertificationsController;

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

Route::get('/link', function () {
    // Artisan::call('storage:link');
    $targetFolder = base_path().'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder);
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/pelatihan', [TrainingCategoriesController::class, 'index']);

// Route::get('/pelatihan', function() {
//     $category = TrainingCategories::all();
//     $title = 'Pelatihan dan Pembinaan';

//     return view('trainingcategories', [
//         "title" => $title ,
//         "category" => $category,
//         'active' => 'trainingcategories',
//         'trainingcategories' => TrainingCategories::all(),
//         'trainings' => Training::all()

//     ]);
// });

// ALMOST FIX FROM THIS
// Route::get('/pelatihan', function() {

//     if(request('pelatihan')) {
//         $pelatihan = TrainingCategories::firstWhere('slug', request('pelatihan'));
//         $title = ' in ' . $pelatihan->name;
//     }

//     $category = TrainingCategories::all();
//     return view('alltrainingcategories', [
//         "title" => "Program Sertifikasi",
//         "category" => $category,
//         'active' => 'all-program',
//         'categories' => TrainingCategories::all(),
//         // 'trainings' => Training::all(),
//         'trainings' => Training::latest()->filter(request(['pelatihan']))

//     ]);
// });


// Route::get('/pelatihan/{training_categories:slug}', function(TrainingCategories $category) {
//     $title = $category->name;
//     return view('trainingcategories', [
//         "title" => $title,
//         'active' => 'trainingcategories',
//         // 'trainings' => $trainingCategories->trainings,
//         'trainings' => Training::where('training_categories_id', $category->id)->get(),
//         'category' => TrainingCategories::all()
//     ]);
// });

// Route::get('/program-pelatihan', [TrainingController::class, 'index']);
// TO THISSS

Route::get('/pelatihan', [TrainingController::class, 'index']);

// halaman single post
Route::get('/pelatihan/{training:slug}', [TrainingController::class, 'show']);

Route::get('/pelatihan/{training:slug}/checkSlug', [TrainingController::class, 'checkSlug']);
Route::post('/pelatihan/{training:slug}', [TrainingController::class, 'store']);

Route::get('/sertifikasi-kemnaker-ri', [KemnakerController::class, 'index']);

Route::get('/sertifikasi-bnsp', [BnspController::class, 'index']);

Route::get('/softskill', [SoftskillController::class, 'index']);

// Route::get('/training', function() {
//     $category = TrainingCategories::all();
//     return view('traininglicense', [
//         "title" => "Program Sertifikasi",
//         "category" => $category,
//         'active' => 'all-program',
//         'categories' => TrainingCategories::all(),
//     ]);
// });

// Route::get('/training/{category:slug}', function(TrainingCategories $category) {
//     $title = $category->name;
//     return view('training', [
//         "title" => "Sertifikasi " . $title,
//         'active' => 'all-program',
//         'trainings' => $category->trainings,
//     ]);
// });

// Route::get('/pelatihan', [ProgramController::class, 'index'])->middleware('pagespeed');

// Route::get('/pelatihan/{training:slug}', [TrainingController::class, 'show'])->middleware('pagespeed');
// Route::get('/pelatihan/{training:slug}/checkSlug', [TrainingController::class, 'checkSlug']);
Route::get('/pelatihan/{training:slug}/checkKemnakerSlug', [TrainingController::class, 'checkKemnakerSlug']);
Route::get('/pelatihan/{training:slug}/checkBnspSlug', [TrainingController::class, 'checkBnspSlug']);
Route::get('/pelatihan/{training:slug}/checkSoftskillSlug', [TrainingController::class, 'checkSoftskillSlug']);
Route::post('/pelatihan{training:slug}', [TrainingController::class, 'store']);

Route::get('/jadwal', [ScheduleController::class, 'index']);

Route::get('/blog', [PostController::class, 'index']);

Route::get('blog/{post:slug}', [PostController::class, 'show']);

Route::get('/public-training/checkSlug', [PublicController::class, 'checkSlug']);
Route::resource('/public-training', PublicController::class);

Route::get('/inhouse-training/checkSlug', [InhouseController::class, 'checkSlug']);
Route::resource('/inhouse-training', InhouseController::class);

Route::get('/kontak-kami/checkSlug', [ContactController::class, 'checkSlug']);
Route::resource('/kontak-kami', ContactController::class);

Route::get('/tentang', function() {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

Route::resource('/dashboard/messages', DashboardMessageController::class)->middleware(['auth', 'verified']);

Route::resource('/dashboard/softskill', DashboardSoftskillController::class)->middleware(['auth', 'verified']);

Route::resource('/dashboard/public', DashboardPublicController::class)->middleware(['auth', 'verified']);

Route::resource('/dashboard/inhouse', DashboardInhouseController::class)->middleware(['auth', 'verified']);

Route::resource('/dashboard/registrant', DashboardRegistrantsController::class)->middleware(['auth', 'verified']);

// Route::resource('/dashboard/kemnaker', DashboardKemnakerCertificationsController::class)->middleware('auth');

Route::resource('/dashboard/kemnaker', DashboardKemnakerCertificationsController::class)->middleware(['auth', 'verified']);

Route::resource('/dashboard/bnsp', DashboardBnspCertificationsController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard/trainings/checkSlug', [DashboardTrainingController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/trainings', DashboardTrainingController::class)->middleware('admin');

Route::get('/dashboard/advertisement/checkSlug', [DashboardAdController::class, 'checkSlug'])->middleware('admin');
// Route::resource('/dashboard/advertisement', DashboardAdController::class)->middleware('admin');
Route::get('/dashboard/advertisement', [DashboardAdController::class, 'index'])->middleware('admin');
Route::get('/dashboard/advertisement/create', [DashboardAdController::class, 'create'])->middleware('admin');
Route::post('/dashboard/advertisement', [DashboardAdController::class, 'store'])->middleware('admin');
Route::get('/dashboard/advertisement/{ad:slug}', [DashboardAdController::class, 'show'])->middleware('admin');
Route::get('/dashboard/advertisement/{ad:slug}/edit', [DashboardAdController::class, 'edit'])->middleware('admin');
Route::put('/dashboard/advertisement/{ad:slug}', [DashboardAdController::class, 'update'])->middleware('admin');
Route::delete('/dashboard/advertisement/{ad:slug}', [DashboardAdController::class, 'destroy'])->middleware('admin');

// Route::resource('/dashboard/adskemnaker', DashboardKemnakerController::class)->middleware(['auth', 'verified']);
Route::get('/dashboard/adskemnaker', [DashboardKemnakerController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/dashboard/adskemnaker/{kemnaker:slugKemnaker}', [DashboardKemnakerController::class, 'show'])->middleware(['auth', 'verified']);
Route::get('/dashboard/adskemnaker/{kemnaker:slugKemnaker}/edit', [DashboardKemnakerController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/dashboard/adskemnaker/{kemnaker:slugKemnaker}', [DashboardKemnakerController::class, 'update'])->middleware(['auth', 'verified']);
// Route::resource('/dashboard/adskemnaker', DashboardKemnakerController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard/adsbnsp', [DashboardBnspController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/dashboard/adsbnsp/{bnsp:slugBnsp}', [DashboardBnspController::class, 'show'])->middleware(['auth', 'verified']);
Route::get('/dashboard/adsbnsp/{bnsp:slugBnsp}/edit', [DashboardBnspController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/dashboard/adsbnsp/{bnsp:slugBnsp}', [DashboardBnspController::class, 'update'])->middleware(['auth', 'verified']);

// Route::resource('/dashboard/adssoftskill', DashboardSoftskillCertificationsController::class)->middleware(['auth', 'verified']);
Route::get('/dashboard/adssoftskill', [DashboardSoftskillCertificationsController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/dashboard/adssoftskill/{softskills:slugSoftskill}', [DashboardSoftskillCertificationsController::class, 'show'])->middleware(['auth', 'verified']);
Route::get('/dashboard/adssoftskill/{softskills:slugSoftskill}/edit', [DashboardSoftskillCertificationsController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/dashboard/adssoftskill/{softskills:slugSoftskill}', [DashboardSoftskillCertificationsController::class, 'update'])->middleware(['auth', 'verified']);

Route::resource('/dashboard/schedules', DashboardScheduleController::class)->middleware('admin');

Route::get('/dashboard/categories/checkSlug', [DashboardCategoryController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('admin');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('admin');
Route::get('/dashboard/posts/upload', [DashboardPostController::class, 'upload'])->middleware('admin')->name('posts.upload');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('admin');

Route::post('upload', [PostController::class, 'uploadImage'])->name('ckeditor.upload');

Route::namespace("Admin")->prefix('admin')->name('admin')->middleware('auth')->group(function() {
    Route::post('/img_upload', [DashboardController::class, 'img_upload'])->name('img_upload');
});

Route::resource('/dashboard/staff', DashboardStaffController::class)->middleware('admin');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/need-verification', [VerificationController::class, 'notice'])->name('verification.notice');

Route::get('/email/verification-notification', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/{ads:slug}', [AdsController::class, 'index']);
Route::post('/{ads:slug}', [AdsController::class, 'store']);
Route::get('/{ads:slug}/checkKemnakerSlug', [AdsController::class, 'checkKemnakerSlug']);
Route::get('/{ads:slug}/checkBnspSlug', [AdsController::class, 'checkBnspSlug']);
Route::get('/{ads:slug}/checkSoftskillSlug', [AdsController::class, 'checkSoftskillSlug']);