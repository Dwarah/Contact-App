<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;

use Illuminate\Http\Request; 

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
            $companies = auth()->user()->companies()->latest()->paginate(10);
            //$companies = Company::all();
            return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $company=new Company;
        return view('companies.create', compact('company'));
    }
    public function show(Company $company)
    {
    //$company = Company::find($company);
    return view('companies.show', compact('company'));
    }
    public function store(CompanyRequest $request)
    {
        $request->user()->companies()->create($request->all());
        
        Company::create($request->all());
        return redirect ()->route('companies.index')->with('message',"Company has been added successfully");
        
    }

    public function edit(Company $company)
    {
        //$company = Company::findOrFail($company);

       return view('companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        
        $company->update($request->all());
        // ([
        //     'name'=> 'required',
        //     'address'=> 'required',
        //     'website'=> 'required',
        //     'email'=> 'required|email',
        // ]);
        //dd($request->all());
        //Contact::create($request->all());
        //$company = Company::findOrFail($company);
        $company->update($request->all());
        return redirect ()->route('companies.index')->with('message',"Company has been updated successfully");
    }

     public function destroy(Company $company)
    {
        //$company = Company::findOrFail($company);
        $company->delete();
        return redirect()->route('companies.index')->with('message', "Company removed successfully");
    }
}
