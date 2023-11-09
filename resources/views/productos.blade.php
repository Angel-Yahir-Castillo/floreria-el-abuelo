@extends('plantilla')

@section('title', 'Productos - Floreria El Abuelo')

@section('content')

    <div class="row ">
        <form action="" method="get" class="col l6 m6 s12">
        </form>

        <div class="col m0 l1 s0 "></div>
        
        <form action="{{ route('busqueda.simple') }}" method="get" class="col l5 m6 s12">
            <div class="row ">
                <div class="input-field col s11">
                    <input id="nombre" name="nombre" type="text" class="validate" required>
                    <label for="nombre">Buscar Producto:</label>
                </div>
                <div class="col s1">
                    <button style="background-color: #fff; border:#fff; cursor:pointer;" type="submit" value=""><i class="material-icons medium">search</i></button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="row">
    <center><h4>Nuestros productos</h4></center>
        <div class="col s12">
            @if(count($productos) == 0)
                <h5>No se encontraron productos</h5>
            @else
                @foreach ($productos as $producto)
                    <div class="row z-depth-2 section contProductos">
                        <div class="col s12 m4 l3">
                            <img class="responsive-img" src="{{ asset($producto->imagen) }}">
                        </div>
                        <div class="col s12 m8 l9">
                            <a href="{{ route('producto.mostrar', $producto->nombre) }}"><h4 class="black-text">{{$producto->nombre}}</h4></a>
                            <p>{{$producto->descripcion}}</p>
                            <h5>$ {{$producto->precio}}</h5>
                            <h6>Color: {{$producto->color}}</h6>
                            <h6>Stok: {{$producto->stok}} disponibles</h6>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection