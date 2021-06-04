@extends('layouts.app')

@section('content')

        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                <h2>Atualizar dados da empresa</h2>
            </div>

            <div class="card-body">

                <form action="{{route('company.update',['company' => $company->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control @error('name')is-invalid @endif" id="" value="{{$company->name}}" name="name" placeholder="Digite o nome da sua empresa">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="text" class="form-control @error('email')is-invalid @endif" id="" value="{{$company->email}}" name="email" placeholder="exemplo@email.com">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">URL do site</label>
                        <input type="text" class="form-control @error('website')is-invalid @endif" id="" value="{{$company->website}}" name="website" placeholder="www.meusite.com">
                        @error('website')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Carregar logo</label>
                        <div class="row ">
                            <div class="col-md-1">
                                <img style="height: 50px" class="img-fluid"src="{{asset('storage/'.$company->logo)}}" alt="">
                            </div>
                            <div class="col-md-11">
                                <input type="file" class="form-control @error('logo')is-invalid @endif" id="" value="{{$company->logo}}" name="logo">
                                @error('logo')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                        </div>


                    </div>
                    <button class="btn btn-success float-right">atualizar</button>
                </form>

            </div>
        </div>


@endsection
