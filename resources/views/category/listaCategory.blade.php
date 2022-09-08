@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Lista') <!--nombre pagina, nombre de seccion-->
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h1 class="text-center mb-5">
                <i class="fa fa-list"> Categorias</i>
            </h1>

            <a class="btn btn-primary  mb-1" href="{{url('/formCategory')}}">
                <i class="fas fa-user-plus"> AGREGAR</i>
            </a>
            <form class="form-inline my-2 my-lg-0 float-right" role="search" action="{{route('listaCategory')}}" method="get">

                <input class="form-control me-2" type="text" placeholder="Buscar" aria-label="Search" name="texto" class="form-control" value="{{$texto}}" >

                <input type="submit" class="btn btn-outline-success"  value="Buscar" >
            </form>

            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th >ID</th>
                    <th >Descripcion</th>
                    <th >Acciones</th>
                    <th colspan="2">
                        &nbsp;
                    </th>

                </tr>
                </thead>
                @if(count($category)<=0)
                    <tr>
                        <td colspan="8">No hay Resultados</td>
                    </tr>
                @else


                    @foreach($category as $categorys)
                        <tr>

                            <td>{{$categorys->id}}</td>
                            <td>{{$categorys->description}}</td>

                            <td width="10px">
                                    <a href="{{route('editformCategory', $categorys->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"> Editar</i>
                                    </a>
                            </td>
                            <td width="10px">
                                    <form action="{{route('deleteCategory', $categorys->id)}}" method="POST" class="Alert-eliminar">
                                        @csrf @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"> Eliminar</i>
                                        </button>
                                    </form>
                            </td>



                        </tr>
                    @endforeach
                @endif
                </tbody>

            </table>
        </div>

        <!--paginas-->
        {{ $category->onEachSide(3)->links() }}

    </div>
</div>
</div>
@endsection

@section('js')
    @if(session('categoryModificado')=='Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Categoria Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if(session('categoriaGuardado')=='Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Categoria Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if(session('categoryEliminado')=='Eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se elimino la categoria exitosamente',
                'success'
            )
        </script>
    @endif
    <script>
        $('.Alert-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro que desea eliminar la categoria?',
                text: "Si presiona si se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

    @if(session('alerta')=='si')

        <script>
            Swal.fire({
                title: 'No se puede eliminar la categoria ',
                text:'Esta categoria ya esta ligado a  un customer, por ende es imposible eliminarlo',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif
@endsection
