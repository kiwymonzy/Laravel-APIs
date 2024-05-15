<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();
        return view('staffs.index', compact('staffs'));
    }

    public function create()
    {
        return view('staffs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:staffs',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        Staff::create($request->all());

        return redirect()->route('staffs.index')->with('success', 'Staff created successfully');
    }

    public function show(Staff $staff)
    {
        return view('staffs.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('staffs.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:staffs,email,' . $staff->id,
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $staff->update($request->all());

        return redirect()->route('staffs.index')->with('success', 'Staff updated successfully');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staffs.index')->with('success', 'Staff deleted successfully');
    }
}
