@extends('adminlte::page')
@section('title', 'Lista de Productos y Servicios')

@section('css')

@stop

@section('content_header')
    <h1>Lista de Productos y Servicios</h1>
@stop

@section('content')
    <div class="container px-0">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success btn-sm" href="{{url('/productos-servicios/create')}}">Crear
                        Producto/Servicio</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Rubro</th>
                <th>Tipo</th>
                <th>Unidad de Medida</th>
                <th>Código</th>
                <th>Producto/Servicio</th>
                <th>Condición IVA</th>
                <th>Precio Bruto Unitario</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productServices as $productService)
                <tr>
                    <td>{{ $productService->id }}</td>
                    <td>
                        @if($productService->rubro)
                            {{ $productService->rubro->rubro }}
                        @else
                            Sin información
                        @endif
                    </td>
                    <td>{{ $productService->tipo }}</td>
                    <td>
                        @if($productService->unidadMedida)
                            {{ $productService->unidadMedida->unidad_medida }}
                        @else
                            Sin información
                        @endif
                    </td>
                    <td>{{ $productService->codigo }}</td>
                    <td>{{ $productService->producto_servicio }}</td>
                    <td>
                        @if($productService->condicionIva)
                            {{ $productService->condicionIva->condicion_iva }}
                        @else
                            Sin información
                        @endif
                    </td>
                    <td>{{ $productService->precio_bruto_unitario }}</td>
                    <td>
                        <a href="{{ route('productos-servicios.edit', $productService->id) }}"
                           class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('productos-servicios.destroy', $productService->id) }}" method="POST"
                              style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $productServices->links() }} <!-- Muestra los enlaces de paginación -->
    </div>
@endsection
