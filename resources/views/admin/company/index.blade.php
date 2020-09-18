@extends('layouts.app')

@section('content')

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
                        <form method="post">
                            <div class="form-group form-inline mb-4">
                                <div class="form-group autocomplete">
                                    <input type="text" id="search" class="form-control mr-2" style="width:18rem;" placeholder="Procure pelo nome da empresa">
                                </div>

                                <button class="btn btn-success">Pesquisar</button>
                            </div>
                        </form>
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
                                        <td>
                                            @if($company->logo)
                                                <img class="img-fluid" style="height: 50px" src="{{asset('storage/'.$company->logo)}}" alt="">
                                            @else
                                                <img class="img-fluid" style="height: 50px" src="{{asset('assets/img/no-image.png')}}" alt="">
                                            @endif
                                        </td>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->website}}</td>
                                        <td>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalRemove"><i class="fas fa-trash"></i></button>
                                            <a href="{{route('company.edit',['company' => $company->id])}}"  class="btn btn-warning"><i class="fas fa-pen"></i></a>
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

        <!-- Modal -->
        <div class="modal fade" id="modalRemove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Deseja mesmo continuar com essa ação?<br>
                        Todos os dados serão apagados incluindo os funcionários!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="{{route('company.destroy',['company' => $company->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                    var searchInput = $(this).val();

                    if(searchInput.length >= 3){
                        $.ajax({
                            url: "company/s/",
                            type: 'post',
                            dataType: 'json',
                            data:{
                                "search": searchInput,
                                "_token": "{{@csrf_token()}}"
                            },
                            success: function(response){
                                $.each(response,function(index,value){
                                    let result = JSON.parse(value);
                                    console.log(result);

                                })

                            }
                        });
                    }
                });
            });


        </script>
@endsection
