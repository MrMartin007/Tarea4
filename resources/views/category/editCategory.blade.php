@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Category</h1>
@stop
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <div style="height: 20px;"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg p-3 mb-5 bg-white ">
                    <div class="card-header">EDITAR CATEGORIA</div>
                    <div class="card-body">
                    <form action="{{ route('editCategory', $category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="form-row">
                            <div class="col-md-5 mb-4 ">
                                <label for="nombre" >Descripcion </label>
                                <input type="text" name="description" class="form-control" value="{{$category->description}}">
                            </div>
                        </div>

                            <button type="submit" class="btn btn-primary offset-3 "  >
                                <i class="fas fa-plus">  Guardar</i>
                            </button>
                            <a class="btn btn-primary  offset-2" href="{{url('/listaCategory')}}" role="button">
                                <i  class="fas fa-arrow-left"> Regresar</i>
                            </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100%;
            margin: 0;
            font-family: Lato, sans-serif;
            background-color:     #E1E2E1;
        }
        header{
            background: #1488CC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .card-header{
            background: #00bc8c;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right,#1c7430, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #3a4047, #4e555b); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color:white;
        }
    </style>

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
