@extends('adminlte::page')
@section('title', 'Crear Producto o Servicio')

@section('css')

@stop

@section('content_header')
    <h1>Crear Producto o Servicio</h1>
@stop

@section('content')
    <div class="container mt-4">
        <div class="col-6">
            <form action="{{ route('productos-servicios.update', $productoServicio->id) }}" method="POST">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="id_rubro" class="form-label">Rubro</label>
                    <select class="form-control" id="id_rubro" name="id_rubro" required>
                        <option value="">Seleccione...</option>
                        @foreach($rubros as $rubro)
                            <option @if($rubro->id == old('id_rubro', $productoServicio->id_rubro)) selected
                                    @endif value="{{$rubro->id}}">{{$rubro->rubro}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo" required>
                        <option value="">Seleccione...</option>
                        @foreach($tipos as $tipoId => $tipo)
                            <option @if($tipoId == old('tipo', $productoServicio->tipo)) selected
                                    @endif value="{{$tipoId}}">{{$tipo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Unidad Medida</label>
                    <select class="form-control" id="id_unidad_medida" name="id_unidad_medida" required>
                        <option value="">Seleccione...</option>
                        @foreach($unidadesMedidas as $unidadMedida)
                            <option
                                @if($unidadMedida->id == old('id_unidad_medida', $productoServicio->id_unidad_medida)) selected
                                @endif value="{{$unidadMedida->id}}">{{$unidadMedida->unidad_medida}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Codigo</label>
                    <input type="text" class="form-control" @error('codigo') is-invalid @enderror id="codigo"
                           name="codigo" value="{{ old('codigo', $productoServicio->codigo) }}" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Producto/Servicio</label>
                    <input type="text" class="form-control" id="producto_servicio" name="producto_servicio"
                           value="{{ old('producto_servicio', $productoServicio->producto_servicio) }}" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Condicion Iva</label>
                    <select class="form-control" id="id_condicion_iva" name="id_condicion_iva" required>
                        <option value="">Seleccione...</option>
                        @foreach($condicionesIva as $condicionIva)
                            <option
                                @if($condicionIva->id == old('id_condicion_iva', $productoServicio->id_condicion_iva)) selected
                                @endif value="{{$condicionIva->id}}">{{$condicionIva->condicion_iva}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Precio bruto unitario</label>
                    <input type="number" class="form-control" id="precio_bruto_unitario"
                           value="{{ old('precio_bruto_unitario', $productoServicio->precio_bruto_unitario) }}"
                           name="precio_bruto_unitario" required>
                </div>

                <button type="submit" class="btn btn-primary">Editar Producto o Servicio</button>
            </form>
        </div>
    </div>
@endsection
