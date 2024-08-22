<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/',  [ReceiptController::class, 'index']);

    // 領収書
    Route::get('/receipt', [ReceiptController::class, 'index'])->name('receipt.index');
    Route::resource('receipts', ReceiptController::class);

    Route::get('/print-pdf/{id}', [ReceiptController::class, 'printPDF'])->name('receipts.printpdf');
});
require __DIR__.'/auth.php';
