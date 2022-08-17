<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Company;

use Illuminate\Http\Request; 

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        // $contacts=Contact::orderBy('id', 'desc')->where( function($query){
        //     if($companyId =request('company_id')){
        //         $query->where('company_id', $companyId);
        //     }
        //     if ($search =request('search')){
        //         $query->where('first_name', 'LIKE',"%{$search}%");
        //     }
        // });
        //->paginate(10);
        $user = auth()->user();
        $companies = $user->companies()->orderBy('name')->pluck('name','id')->prepend('All Companies', '');
        //\DB::enableQueryLog();
        $contacts = $user->contacts()->latestFirst()->paginate(5);
        //dd(\DB::getQueryLog());
        return view('contacts.index', compact('contacts','companies'));
    }
    public function create()
    {   $contact = new Contact();
        $companies = company::orderBy('name')->pluck('name','id')->prepend('All Companies', '');
       return view('contacts.create', compact('companies', 'contact'));
    }
    public function show($id){
        $contact = Contact::find($id);
        return view('contacts.show',compact('contact'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'phone'=> 'required',
            'email'=> 'required|email',
            'address'=> 'required',
            'company_id'=> 'required|exists:companies,id',
        ]);
        //dd($request->all());
        $request->user()->contacts()->create($request->all()); //+ ['user_id' => auth()->id()]);
        return redirect ()->route('contacts.index')->with('message','Contact has been added successfully');
     
    }
    public function edit($id)
    {   
        $contact = Contact::findOrFail($id);
        $companies = auth()->user()->companies()->orderBy('name')->pluck('name','id')->prepend('All Companies', '');

       return view('contacts.edit', compact('companies','contact'));
    }
    public function update($id, Request $request)
    {
       
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'phone'=> 'required',
            'email'=> 'required|email',
            'address'=> 'required',
            'company_id'=> 'required|exists:companies,id',
        ]);
        //dd($request->all());
        //Contact::create($request->all());
        $contact = Contact::findOrFail($id);
        $contact -> update($request->all());
        return redirect()->route('contacts.index')->with('message','Contact has been updated successfully');
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact deleted successfully');
    }
}

