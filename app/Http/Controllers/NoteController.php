<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Module;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request) {
        
        if ($request->etudiant_id) {
            $notes = Note::where('etudiant_id', $request->etudiant_id)->get();
        } else {
            $notes = Note::all();
        }
        return view('notes.index', compact('notes'));
    }

    public function create() {
        $etudiants = Etudiant::all();
        $modules = Module::all();
        return view('notes.create', compact('etudiants', 'modules'));
    }

    public function store(Request $request) {
        $data = $request->all();
        
        
        $data['moyenne'] = ($data['note_intra'] + $data['note_projet'] + $data['note_final']) / 3;

        Note::create($data);
        return redirect()->route('notes.index');
    }

    public function edit($id) {
        $note = Note::findOrFail($id);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id) {
        $note = Note::findOrFail($id);
        $data = $request->all();
        
       
        $data['moyenne'] = ($data['note_intra'] + $data['note_projet'] + $data['note_final']) / 3;

        $note->update($data);
        return redirect()->route('notes.index');
    }

    public function destroy($id) {
        Note::destroy($id);
        return redirect()->route('notes.index');
    }
}