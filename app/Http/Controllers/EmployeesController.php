<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;
use App\Http\Resources\EmployeesList;
use App\Http\Resources\EmployeesResource;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::paginate(10);
        if(request()->ajax()){
            return new EmployeesList($employees);

        }

        return view('employees.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeesRequest $request)
    {
        $employee = Employees::create($request->validated());
        if(request()->ajax()){
            return new EmployeesResource($employee);

        }
        return redirect()->route('employees.show',['id'=> $employees->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $employee = Employees::findOrFail($id);
        if(request()->ajax()){
            return new EmployeesResource($employee);

        }
        return view('employees.show',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $employee = Employees::findOrFail($id);
        return view('employees.edit',['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeesRequest $request, int $id)
    {
        $employee = Employees::findOrFail($id);
        $employee->update($request->validated());
        if(request()->ajax()){
            return $employee;
        }
        return redirect()->route('employees.show',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $employee = Employees::findOrFail($id);
        $employee->delete();
        if(request()->ajax()){
            return response()->json(['Deleted'],200);

        }
        return redirect()->route('employees.index');
    }
}
