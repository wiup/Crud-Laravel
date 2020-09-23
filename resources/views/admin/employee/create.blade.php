@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                <h2>Register Company</h2>
            </div>

            <div class="card-body">

                <form action="{{route('employee.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="companyId" value="{{$id}}">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control @error('name')is-invalid @endif" id="" value="{{old('name')}}" name="name" placeholder="Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input type="text" class="form-control @error('last_name')is-invalid @endif" id="" value="{{old('last_name')}}" name="last_name" placeholder="Last name">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control @error('email')is-invalid @endif" id="" value="{{old('email')}}" name="email" placeholder="example@mail.com">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control @error('phone')is-invalid @endif" id="" value="{{old('phone')}}" name="phone" placeholder="(00) 00000-0000">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success float-right">Add new employee</button>
                </form>

            </div>
        </div>
    </div>

@endsection
