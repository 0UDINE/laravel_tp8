<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index() {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    public function create() {
        return view('modules.create');
    }

    public function store(Request $request) {
        Module::create($request->all());
        return redirect()->route('modules.index')->with('success', 'Module créé');
    }

    public function edit($id) {
        $module = Module::findOrFail($id);
        return view('modules.edit', compact('module'));
    }

    public function update(Request $request, $id) {
        $module = Module::findOrFail($id);
        $module->update($request->all());
        return redirect()->route('modules.index');
    }

    public function destroy($id) {
        Module::destroy($id);
        return redirect()->route('modules.index');
    }
}