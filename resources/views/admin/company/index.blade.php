@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                Companies
            </div>

            <div class="card-body">
                <a href="{{route('company.create')}}" class="btn btn-success">Create new company</a>

                <div class="card mt-4">
                    <div class="card-header" style="background-color:#fcfcfc;">
                        Companies list
                    </div>

                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table class="table rounded table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($companies as $company)
                                    <tr>
                                        <td></td>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->website}}</td>
                                        <td>
                                            <form action="{{route('company.destroy',['company' => $company->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                <a href="{{route('company.edit',['company' => $company->id])}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>

                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                            {{$companies->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
