<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Http\Requests\StoreCompaniesRequest;
use App\Http\Requests\UpdateCompaniesRequest;
use App\Http\Resources\CompaniesList;
use App\Http\Resources\CompaniesResource;
use Illuminate\Support\Arr;
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Companies::paginate(10);
        if(request()->ajax()){
            return new CompaniesList($companies);

        }

        return view('companies.index',['companies'=>$companies]);
        // crop image
        // write min 100x100 validation
        // test if request()->ajax() works
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompaniesRequest $request)
    {
        $company = Companies::create($request->validated());
        if(request()->ajax()){
            return new CompaniesResource($company);

        }
        return redirect()->route('companies.show',['company'=>$company->id]);
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $company = Companies::findOrFail($id);
        if(request()->ajax()){
            return new CompaniesResource($company);

        }
        return view('companies.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $company = Companies::findOrFail($id);
        return view('companies.edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompaniesRequest $request, int $id)
    {
        $company = Companies::findOrFail($id);
        $company->update(Arr::except($request->validated(),'company_id'));
        if(request()->ajax()){

            return new CompaniesResource($company);
        }
        return redirect()->route('companies.show',['company'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $company = Companies::findOrFail($id);
        $company->delete();
        if(request()->ajax()){
            return response()->json(['Deleted'],200);

        }
        return redirect()->route('companies.index');
    }
}
