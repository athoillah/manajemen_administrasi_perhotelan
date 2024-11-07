<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetResponsible;
use App\Models\Department;

class AssetResponsibleController extends Controller
{
    public function index()
    {
        $responsibles = AssetResponsible::with('department')->get();
        return view('responsibles.index', compact('responsibles'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('responsibles.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'position' => 'required|string',
            'contact_info' => 'required|string',
        ]);

        AssetResponsible::create($request->all());

        return redirect()->route('responsibles.index')->with('success', 'Responsible person added successfully.');
    }

    public function edit($id)
    {
        $responsible = AssetResponsible::findOrFail($id);
        $departments = Department::all();
        return view('responsibles.edit', compact('responsible', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'position' => 'required|string',
            'contact_info' => 'required|string',
        ]);

        $responsible = AssetResponsible::findOrFail($id);
        $responsible->update($request->all());

        return redirect()->route('responsibles.index')->with('success', 'Responsible person updated successfully.');
    }

    public function destroy($id)
    {
        AssetResponsible::destroy($id);

        return redirect()->route('responsibles.index')->with('success', 'Responsible person deleted successfully.');
    }
}
