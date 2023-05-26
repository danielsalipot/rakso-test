<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company')->get();
        return view('Employee.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('Employee.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $request->validated();
        DB::beginTransaction();

        try {
            Employee::create($request->only('first_name', 'last_name', 'company_id', 'phone', 'email'));
            DB::commit();
            return redirect('/employee')->with('success', 'success in creating employee');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('/employee')->with('danger', 'danger in creating employee');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('Employee.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('Employee.edit', ['employee' => $employee, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $request->validated();
        DB::beginTransaction();
        try {
            $employee->update($request->only(['first_name', 'last_name', 'company_id', 'phone', 'email']));
            DB::commit();
            return redirect('/employee')->with('update', 'employee has been updated');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('/employee')->with('error', 'error in updatin');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        DB::beginTransaction();
        try {
            $employee->delete();
            DB::commit();
            return redirect('/employee')->with('delete', 'successfully deleted');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'error in deleting');
        }
    }
}
