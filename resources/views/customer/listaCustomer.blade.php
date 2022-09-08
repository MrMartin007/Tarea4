@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Lista') <!--nombre pagina, nombre de seccion-->
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h1 class="text-center mb-5">
                    <i class="fa fa-users"> Customer</i>
                </h1>

                <a class="btn btn-primary  mb-1" href="{{url('/formCustomer')}}">
                    <i class="fas fa-user-plus"> AGREGAR</i>
                </a>
                <form class="form-inline my-2 my-lg-0 float-right" role="search" action="{{route('listaCustomer')}}" method="get">

                    <input class="form-control me-2" type="text" placeholder="Buscar" aria-label="Search" name="texto" class="form-control" value="{{$texto}}" >

                    <input type="submit" class="btn btn-outline-success"  value="Buscar" >
                </form>

            <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Addres</th>
                        <th>Phone Number</th>
                        <th>Category</th>
                        <th>Acciones</th>
                        <th colspan="4">
                            &nbsp;
                        </th>

                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @if(count($customer)<=0)
                        <tr>
                            <td colspan="8">No hay Resultados</td>
                        </tr>
                    @else


                        @foreach($customer as $customers)
                            <tr>

                                <td>{{$customers->id}}</td>
                                <td>{{$customers->name}}</td>
                                <td>{{$customers->addres}}</td>
                                <td>{{$customers->phone_number}}</td>
                                <td>{{$customers->description}}</td>

                                <td width="10px">
                                    <a href="{{route('editformCustomer', $customers->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"> Editar</i>
                                    </a>

                                </td>
                                <td width="10px">
                                    <form action="{{route('deleteCustomer', $customers->id)}}"  method="POST" class="Alert-eliminar">
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
            {{ $customer->onEachSide(3)->links() }}

        </div>
    </div>
    </div>
@endsection

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('customerModificado')=='Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Customer Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if(session('customeriaGuardado')=='Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Customer Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if(session('customerEliminado')=='Eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se elimino el Customer exitosamente',
                'success'
            )
        </script>
    @endif
    <script>
        $('.Alert-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro que desea eliminar el Customer?',
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
                title: 'No se puede eliminar el Customer ',
                text:'Este Customer ya esta ligado a  una Categoria, por ende es imposible eliminarlo',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif
@endsection
