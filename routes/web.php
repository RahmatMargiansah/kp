<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AuthController;


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
 return view('home');
})->middleware('guest');

Route::get('/forgot-password', function() {
	return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function(Request $request) {
		$request->validate(['email' => 'required|email']);

		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
			? back()->with(['status' => __($status)])
			: back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
	return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset.password', function (Request $request) {
		$request->validate([
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:8|confirmed',
		]);

		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password)
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
			? redirect()->route('login')->with('status', __($status))
			: back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');



Route::get('/teknisi', [TeknisiController::class, 'index'])->middleware(['auth', 'must-user']);
Route::get('/teknisi-add', [TeknisiController::class, 'create'])->middleware(['auth', 'must-user']);
Route::post('/teknisi', [TeknisiController::class, 'store'])->middleware(['auth', 'must-user']);
Route::get('/teknisi-edits/{id}', [TeknisiController::class, 'edit'])->middleware(['auth', 'must-user']);
Route::put('/teknisi/{id}', [TeknisiController::class, 'update'])->middleware(['auth', 'must-user']);
Route::get('/teknisi-delete/{id}', [TeknisiController::class, 'delete'])->middleware(['auth', 'must-user']);
Route::delete('/teknisi-destroy/{id}', [TeknisiController::class, 'destroy'])->middleware(['auth', 'must-user']);


Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'must-admin']);
Route::get('/admin-edits/{id}', [AdminController::class, 'edit'])->middleware(['auth', 'must-admin']);
Route::put('/admin/{id}', [AdminController::class, 'update'])->middleware(['auth', 'must-admin']);
Route::get('/admin-delete/{id}', [AdminController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/admin-destroy/{id}', [AdminController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/user', [AuthController::class, 'index'])->middleware('must-admin')->middleware(['auth', 'must-admin']);
Route::get('/detaillaporan', [AdminController::class, 'detail'])->middleware(['auth', 'must-admin']);
Route::get('/viewdetaillaporan/{id}', [AdminController::class, 'viewdetail'])->middleware(['auth', 'must-admin']);
Route::get('/export-pdf/{id}', [AdminController::class, 'exportPdf'])->middleware(['auth', 'must-admin']);
Route::get('/export-pdf', [AdminController::class, 'exportPdfAll'])->middleware(['auth', 'must-admin']);
Route::get('/register', [AuthController::class, 'register'])->middleware(['auth', 'must-admin']);
Route::post('/register', [AuthController::class, 'registerProcess'])->middleware(['auth', 'must-admin']);
Route::get('/register-delete/{id}', [AuthController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/register-destroy/{id}', [AuthController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/filter', [AdminController::class, 'filter']);

Route::get('/manager', [ManagerController::class, 'detail']);
Route::get('/managerviewdetaillaporan/{id}', [ManagerController::class, 'viewdetail']);
Route::get('/filter', [ManagerController::class, 'filter']);
Route::get('/export-pdf', [ManagerController::class, 'exportPdfAll']);
Route::get('/export-pdf/{id}', [ManagerController::class, 'exportPdf']);
