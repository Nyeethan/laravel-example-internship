<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $departments = Department::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('code', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'        => 'required|unique:departments|max:10',
            'name'        => 'required|unique:departments|max:100',
            'description' => 'nullable',
            'status'      => 'required|in:active,inactive',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')
                         ->with('success', 'Department created successfully!');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'code'        => 'required|max:10|unique:departments,code,' . $department->id,
            'name'        => 'required|max:100|unique:departments,name,' . $department->id,
            'description' => 'nullable',
            'status'      => 'required|in:active,inactive',
        ]);

        $department->update($request->all());
        return redirect()->route('departments.index')
                         ->with('success', 'Department updated successfully!');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')
                         ->with('success', 'Department deleted successfully!');
    }
}