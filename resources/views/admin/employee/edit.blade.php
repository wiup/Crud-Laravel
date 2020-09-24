@extends('layouts.app')

@section('content')

        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                <h2>Atualizar empresas</h2>
            </div>

            <div class="card-body">

                <form action="{{route('employee.update',['employee' => $employee->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control @error('name')is-invalid @endif"  value="{{$employee->name}}" name="name" placeholder="Nome">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Sobrenome</label>
                        <input type="text" class="form-control @error('last_name')is-invalid @endif"  value="{{$employee->last_name}}" name="last_name" placeholder="Sobrenome">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="text" class="form-control @error('email')is-invalid @endif"  value="{{$employee->email}}" name="email" placeholder="example@mail">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" class="form-control @error('phone')is-invalid @endif" id="" value="{{$employee->phone}}" name="phone" placeholder="(00) 00000-0000)">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <button class="btn btn-success float-right">Atualizar dados</button>
                </form>

            </div>
        </div>


@endsection
