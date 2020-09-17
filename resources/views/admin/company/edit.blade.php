@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                <h2>Register Company</h2>
            </div>

            <div class="card-body">

                <form action="{{route('company.update',['company' => $company->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Company name</label>
                        <input type="text" class="form-control @error('name')is-invalid @endif" id="" value="{{$company->name}}" name="name" placeholder="Name" ">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="text" class="form-control @error('email')is-invalid @endif" id="" value="{{$company->email}}" name="email" placeholder="email@example.com">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Your website</label>
                        <input type="text" class="form-control @error('website')is-invalid @endif" id="" value="{{$company->website}}" name="website" placeholder="www.example.com">
                        @error('website')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Upload logo</label>
                        <div class="row ">
                            <div class="col-md-1">
                                <img style="height: 50px" class="img-fluid"src="{{asset('storage/'.$company->logo)}}" alt="">
                            </div>
                            <div class="col-md-11">
                                <input type="file" class="form-control @error('logo')is-invalid @endif" id="" value="{{$company->logo}}" name="logo">

                            </div>

                        </div>

                        @error('logo')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-success float-right">Add new company</button>
                </form>

            </div>
        </div>
    </div>

@endsection
