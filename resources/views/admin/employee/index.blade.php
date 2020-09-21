@extends('layouts.app')

@section('content')
        <div class="row mb-4">
            <h2>{{$company->name}}</h2>
        </div>

        <div class="card">
            <div class="card-header" style="background-color:#fcfcfc;">
                Employees
            </div>

            <div class="card-body">

                <a href="{{route('company.create')}}" class="btn btn-success">Create new employee</a>

                <div class="card mt-4">
                    <div class="card-header" style="background-color:#fcfcfc;">
                        Employees list
                    </div>

                    <div class="card-body">
                        <form action="{{route('search')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4 form-inline position-relative">
                                    <input type="text" id="search" class="form-control mr-2" name="search" style="width:18rem;" placeholder="Procure pelo nome da empresa">
                                    <button class="btn btn-success ">Pesquisar</button>
                                    <div id="searchList" class="card position-absolute" style="top:100%"></div>
                            </div>
                        </form>
                        <div class="table-responsive-md">
                            <table class="table rounded table-bordered">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Last name</th>
                                    <th>phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($employees as $employee)
                                    <tr>

                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->lastName}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>
                                            <form action="{{route('employee.destroy',['employee' => $employee->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                <a href="{{route('employee.edit',['employee' => $employee->id])}}"  class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
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
                            url: "{{route('autoComplete')}}",
                            type: 'post',
                            dataType: 'json',
                            data:{
                                "search": searchInput,
                                "_token": "{{@csrf_token()}}"
                            },
                            success: function(response){

                                $.each(response,function(index,value){
                                    var text = document.createTextNode(value.name);
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
