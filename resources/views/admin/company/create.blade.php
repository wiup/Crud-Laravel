@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                <h2>Adicionar empresa</h2>
            </div>

            <div class="card-body">

                <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control @error('name')is-invalid @endif" id="" value="{{old('name')}}" name="name" placeholder="Digite o nome da sua empresa">
                        @error('name')
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
                        <label for="">URL do site</label>
                        <input type="text" class="form-control @error('website')is-invalid @endif" id="" value="{{old('web')}}" name="website" placeholder="www.meusite.com">
                        @error('website')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Carregar logo</label>
                        <input type="file" class="form-control @error('logo')is-invalid @endif" id="" name="logo">
                        @error('logo')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-success float-right">Adicionar empresa</button>
                </form>

            </div>
        </div>
    </div>

@endsection
