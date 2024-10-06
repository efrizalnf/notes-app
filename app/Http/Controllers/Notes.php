<?php

namespace App\Http\Controllers;

use App\Models\Notes as ModelsNotes;
use Illuminate\Http\Request;

class Notes extends Controller
{
    public function index() {
        $notes = ModelsNotes::all();
        return view('notes', compact('notes'));
    }
    
    public function addnotes() {
        
        return view('add-notes');
    }

    public function save_note(Request $request) {
        $validation = $request->validate([
            'title' => 'required|max:25',
            'content' => 'required'
        ]);
        ModelsNotes::create($validation);
        return redirect()->route('note-lists')->with('success', 'Berhasil disimpan!');

    }

    public function editnotes($id)
    {
        $data =  ModelsNotes::find($id);
        return view('add-notes', compact('data'));
    }

    public function save_edit_notes(Request $request, $id)
    {
        $validation = $request->validate([
            'title' => 'required|max:25',
            'content' => 'required'
        ]);
        $note = ModelsNotes::find($id);
        if ($note) {
            $note->update($validation);
            return redirect()->route('note-lists')->with('success', 'Berhasil diedit!');
        } else {
            return redirect()->route('note-lists')->with('error', 'Catatan tidak ditemukan!');
        }
    }
    public function delete_note($id) {
        $note = ModelsNotes::find($id);
        if ($note) {
            $note->delete();
            return redirect()->route('note-lists')->with('success', 'Catatan berhasil dihapus!');
        } else {
            return redirect()->route('note-lists')->with('error', 'Catatan tidak ditemukan!');
        }
    }
}
