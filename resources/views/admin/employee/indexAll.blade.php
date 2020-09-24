@extends('layouts.app')

@section('content')


        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                 Funcionários
            </div>

            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Importante!</h4>
                    <p>Adição de novos funcionários só é permitido selecionando uma empresa em "empresas" no menu de navegação</p>
                </div>
                <div class="card mt-4">
                    <div class="card-header" style="background-color:#fcfcfc;">
                        Todos os funcionários
                    </div>

                    <div class="card-body">
                        <form action="{{route('employee.search')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-group form-inline position-relative">
                                    <input type="text" id="search" class="form-control mr-2" name="search" style="width:18rem;" placeholder="Procure pelo nome da empresa">
                                    <button class="btn btn-success ">Pesquisar</button>
                                    <div id="searchList" class="card position-absolute" style="top:100%"></div>
                            </div>
                        </form>
                        <div class="table-responsive-md">
                            <table class="table rounded table-bordered">
                                <thead>
                                <tr>

                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($employees as $employee)
                                    <tr>

                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->last_name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>
                                            <form action="{{route('employee.destroy',['employee' => $employee->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" id="id_delete" name="id_delete" value="">
                                                <button value="{{$employee->id}}"  class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                                                <a href="{{route('employee.edit',['employee' => $employee->id])}}"  class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">Nada foi encontrado, adicione um novo funcionário</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                            {{$employees->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script>
            $('.addAttr').click(function() {
                var id = $(this).data('id');
                $('#id').val(id);
            } );
            $(document).ready(function(){
                $("#search").blur(function() {
                    $("#searchList").fadeOut();
                });
                $("#search").keyup(function(){
                    var ulComplete = document.createElement("ul");
                    ulComplete.classList.add("list-group");

                    var searchInput = $(this).val();
                    $("#searchList").fadeOut();
                    if(searchInput != ""){

                        $.ajax({
                            url: "{{route('employee.autoComplete')}}",
                            type: 'post',
                            dataType: 'json',
                            data:{
                                "search": searchInput,
                                "_token": "{{@csrf_token()}}"
                            },
                            success: function(response){

                                $.each(response,function(index,value){
                                    var text = document.createTextNode(value.name +" "+value.last_name);
                                    var liComplete = document.createElement("li");
                                    liComplete.addEventListener('click',function(li){
                                       $("#search").val(liComplete.innerHTML);

                                    });
                                    liComplete.classList.add("list-group-item")
                                    liComplete.appendChild(text);
                                    ulComplete.appendChild(liComplete);
                                });
                                $("#searchList").fadeIn();
                                $("#searchList").html(ulComplete);

                            }
                        });
                    }
                });


            });


        </script>
@endsection
