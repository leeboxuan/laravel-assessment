<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('home', compact('companies'));
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {

        $validate = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['max:255'],
            'logo' => ['dimensions:min_width=100,min_height=100|max:2048'],
            'website' => ['max:255']


        ]);

        $file = request()->file('logo');

        $file_name = rand() . $file->getClientOriginalName();

        $file_path = 'storage/app/public/images';

        $file->move($file_path, $file_name);

        if (file_exists("storage/app/public/images/$file_name")) {
            $fileName = "$file_name";
        } else {
            $fileName = "noimage.png";
        }


        $validate['logo'] = $fileName;

        Company::create($validate);
        return redirect('/home');
    }


    public function update(Company $company)
    {

        $company->update(request()->all());
        return redirect('/home');
    }


    public function destroy(Company $company)
    {

        $company->delete();
        return redirect('/home');
    }

    public function edit(Company $company)
    {
        return view('edit', compact('company'));
    }

    public function showemployees(Company $company)
    {
        $employees = $company->employees()->paginate(10);

        return view('employees', compact('company', 'employees'));
    }
}
