@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                <h2>Registrar funcionários</h2>
            </div>

            <div class="card-body">

                <form action="{{route('employee.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="companyId" value="{{$id}}">
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control @error('name')is-invalid @endif" id="" value="{{old('name')}}" name="name" placeholder="Nome do funcionário">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Sobrenome</label>
                        <input type="text" class="form-control @error('last_name')is-invalid @endif" id="" value="{{old('last_name')}}" name="last_name" placeholder="Sobrenome">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="text" class="form-control @error('email')is-invalid @endif" id="" value="{{old('email')}}" name="email" placeholder="exemplo@email.com">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" class="form-control @error('phone')is-invalid @endif" id="phone" value="{{old('phone')}}" name="phone" placeholder="(00) 00000-0000">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success float-right">Adicionar funcionário</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>
        var selector = document.getElementById("phone");
        Inputmask({"mask": "(99) 99999-9999"}).mask(selector);
    </script>
@endsection
