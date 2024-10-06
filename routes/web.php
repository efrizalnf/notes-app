<?php

use App\Http\Controllers\Notes;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::resource('notes', Notes::class);
Route::controller(Notes::class)->group(function() {
    Route::get('notes', 'index')->name('note-lists');
    Route::get('notes/addnotes', 'addnotes')->name('add-note');
    Route::post('notes/savenote', 'save_note')->name('save-note');
    Route::get('notes/edit/{id}', 'editnotes')->name('edit-note');
    Route::put('notes/saveedit/{id}', 'save_edit_notes')->name('save-edit-note');
    Route::delete('notes/delete/{id}', 'delete_note')->name('delete-note');
});

