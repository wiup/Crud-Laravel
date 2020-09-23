@extends('layouts.app')

@section('content')

        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                <h2>Update company</h2>
            </div>

            <div class="card-body">

                <form action="{{route('employee.update',['employee' => $employee->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @endif"  value="{{$employee->name}}" name="name" placeholder="First name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input type="text" class="form-control @error('last_name')is-invalid @endif"  value="{{$employee->last_name}}" name="last_name" placeholder="Last name">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control @error('email')is-invalid @endif"  value="{{$employee->email}}" name="email" placeholder="example@mail">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" class="form-control @error('phone')is-invalid @endif" id="" value="{{$employee->phone}}" name="phone" placeholder="Number">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <button class="btn btn-success float-right">Update</button>
                </form>

            </div>
        </div>


@endsection
