<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = \App\Company::paginate(10);

        return view('admin.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->all();
        $logo = $request->file('logo');
        $data['logo'] =  $logo->store('logos','public');
        $company = \App\Company::create($data);

        return redirect()->route('company.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company)
    {
        $company = \App\Company::findOrFail($company);

        return view('admin.company.edit', compact('company'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $company)
    {
        $data = $request->all();
        $logo = $request->file('logo');
        $company = \App\Company::find($company);
        $data['logo'] =  $logo->store('logos','public');
        $company->update($data);
        flash('Dados atualizados com sucesso')->success();
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company)
    {
        $company = \App\Company::find($company);
        $company->delete();

        return redirect()->route('company.index');
    }
}
