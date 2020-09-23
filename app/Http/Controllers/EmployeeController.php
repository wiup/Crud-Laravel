<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        return view('admin.employee.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $id = $request->get('companyId');
        $company = \App\Company::find($id);
        $company->employees()->create([
           'name' => $request->get('name'),
           'last_name' => $request->get('last_name'),
           'email' => $request->get('email'),
           'phone' => $request->get('phone')
        ]);
        flash('Dados criados com sucesso')->success();
        return redirect()->route('company.employees',['company' => $id]);


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
    public function edit($employee)
    {
        $employee = \App\Employee::findOrFail($employee);
         return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee)
    {
        $employee =  \App\Employee::find($employee);
        $data = $request->all();
        $employee->update($data);
        flash('Dados atualizados com sucesso')->success();
        return redirect()->route('company.employees',['company' => $employee->company_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee)
    {
        $employee = \App\Employee::find($employee);
        $employee->delete();
        flash('Cadastro da empresa excluído com sucesso')->error();
        return redirect()->back();
    }

    public function autoComplete(Request $request)
    {

        $company = \App\Company::find($request->get('companyId'));

        $employee = $company->employees()->where(function($q) use($request){
               $q->where('name','like','%'. $request->get('search') .'%')
                   ->orWhere('last_name','like','%'. $request->get('search') .'%');

        })->get();


        return response()->json($employee);
    }
    public function search(Request $request)
    {

        $company = \App\Company::find($request->companyId);
        $employees = $company->employees()->where('id',$request->searchId)->paginate($request->searchId);

        return view('admin.employee.index', compact('employees','company'));
    }
}
