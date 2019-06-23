<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Company;


class EmployeesController extends Controller
{


    public function create(Company $company)
    {
        return view('createEmployee', compact('company'));
    }


    public function store(Company $company)
    {
        $validate = request()->validate([
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email' => ['max:255'],
            'phone' => ['max:255']


        ]);

        $company->addEmployee($validate);
        $employees = $company->employees()->paginate(10);


        return view('employees', compact('company','employees'));
    }


    public function edit(Employees $employee)
    {
        return view('editemployee', compact('employee'));
    }

    public function update(Employees $employee)
    {
        $employee->update(request()->all());

        return redirect('/home/'.$employee->company_id.'/employees');
    }


    public function destroy(Employees $employee)
    {

        $employee->delete();
        return back();
    }
}
