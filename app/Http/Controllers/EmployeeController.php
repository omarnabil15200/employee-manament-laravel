<?php

// app/Http/Controllers/EmployeeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::where('manager_id', auth()->id())->get();
        return view('employees.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|string|max:15',
            'picture' => 'nullable|string|max:255',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'picture' => $request->picture,
            'manager_id' => auth()->id(),
        ]);

        return redirect('/employees')->with('success', 'Employee added successfully.');
    }

    public function destroy(Employee $employee)
    {
       // $this->authorize('delete', $employee);
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee deleted successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'picture' => 'nullable|string|max:255',
        ]);

        $employee->update($request->all());
        return redirect('/employees')->with('success', 'Employee updated successfully.');
    }
}
